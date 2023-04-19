<?php

namespace App\Http\Controllers;

use App\Http\Helper\FileStore;
use App\Models\Gallery;
use App\Models\QA;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Http\Helper\ImageStore;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::getTree();
        $image = 'image';
        $data = ['categories' => $categories, $image];
        return view('backend.categories.index')->with($data);
    }

    public function create()
    {
        $categories = Categories::getList();
        $data = ['categories' => $categories];
        return view('backend.categories.create')->with($data);
    }

    public function store(Request $request)
    {
        $name = $request->get('name');
        $parent_id = $request->get('parent_id');
        $image = $request->get('image');
        $desc = $request->get('desc');
        $slug = Str::slug($request->get('name'));


        $imageObj = new ImageStore($request, 'categories');
        $image = $imageObj->imageStore();


        if (!isset($parent_id)) {
            $data = [
                'name' => $name,
                'image' => $image,
                'desc' => $desc,
                'slug' => $slug,
                'homepage_title'  => $request->get('homepage_title'),
                'homepage_description' => $request->get('homepage_description')
            ];


            if ($request->hasFile('homepage_icon')) {
                $image = $request->file('homepage_icon');
                $path = public_path() . '/assets/img/categories/medium';
                $ext = $image->getClientOriginalExtension();
                $imageName = 'homepage_icon.' . $ext;
                File::makeDirectory($path, $mode = 0755, true, true);
                $image->move($path, $imageName);
                $data['homepage_icon'] = $imageName;
            }

            if ($request->hasFile('homepage_image')) {
                $image = $request->file('homepage_image');
                $path = public_path() . '/assets/img/categories/medium';
                $ext = $image->getClientOriginalExtension();
                $imageName = 'homepage_image.' . $ext;
                File::makeDirectory($path, $mode = 0755, true, true);
                $image->move($path, $imageName);
                $data['homepage_image'] = $imageName;
            }

            Categories::create($data);

            Session::flash('flash_message', 'Category successfully added!');
            return redirect()->back();
        }

        $category = Categories::FindOrFail($parent_id);

        Categories::create(['name' => $name, 'image' => $image, 'desc' => $desc, 'slug' => $slug], $category);
        Session::flash('flash_message', 'Category successfully added!');
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category = Categories::FindOrFail($id);
        $categories = Categories::getList();
        $data = ['category' => $category, 'categories' => $categories];
        return view('backend.categories.edit')->with($data);
    }

    public function update(Request $request, $id)
    {


        $category = Categories::FindOrFail($id);

        $input = $request->all();


        if ($request->hasFile('image')) {
            $imageObj = new ImageStore($request, 'categories');
            $image = $imageObj->imageStore();
            $input['image'] = $image;
        }

        if ($request->has('name')) {
            $input['slug'] = Str::slug($request->get('name'));
        }


        if ($request->hasFile('homepage_icon')) {
            $image = $request->file('homepage_icon');
            $path = public_path() . '/assets/img/categories/medium';
            $ext = $image->getClientOriginalExtension();
            $imageName = 'homepage_icon_'.rand(2000, 5000).'.'. $ext;
            File::makeDirectory($path, $mode = 0755, true, true);
            $image->move($path, $imageName);
            $input['homepage_icon'] = $imageName;
        }

        if ($request->hasFile('homepage_image')) {
            $image = $request->file('homepage_image');
            $path = public_path() . '/assets/img/categories/medium';
            $ext = $image->getClientOriginalExtension();
            $imageName = 'homepage_image_'.rand(2000, 5000).'.'.  $ext;
            File::makeDirectory($path, $mode = 0755, true, true);
            $image->move($path, $imageName);
            $input['homepage_image'] = $imageName;
        }

        $category->fill($input)->save();
        Session::flash('flash_message', 'Category successfully edited.');

        $categories = Categories::getTree();
        $data = ['categories' => $categories];
        return view('backend.categories.index')->with($data);
    }

    public function destroy($id)
    {

        Categories::fixTree();
        $category = Categories::FindOrFail($id);

        $category->delete();
        $categories = Categories::all();
        $data = ['categories' => $categories];
        return redirect('admin/categories')->with($data);
    }

    public function addGallery($id)
    {

        $category = Categories::FindOrFail($id);
        $data = ['category' => $category];
        return view('backend.gallery.create')->with($data);

    }

    public function addFile($id)
    {
        $category = Categories::FindOrFail($id);
        $data = ['category' => $category];
        return view('backend.files.create')->with($data);

    }

    public function qa($id)
    {
        $category = Categories::FindOrFail($id);
        $questionsAnswers = QA::where('cat_id', '=', $category->id)->get();
        $data = ['category' => $category, 'questionsAnswers' => $questionsAnswers];

        return view('backend.qa.create')->with($data);

    }

    public function qaStore(Request $request, $id)
    {

        $category = Categories::FindOrFail($id);
        $qa = QA::create([
            'question' => $request->get('question'),
            'answer' => $request->get('answer'),
            'cat_id' => $category->id
        ]);
        $questionsAnswers = QA::where('cat_id', '=', $category->id)->get();
        $data = ['category' => $category, 'qa' => $qa, 'questionsAnswers' => $questionsAnswers];
        return view('backend.qa.create')->with($data);

    }

    public function qaEdit($id)
    {
        $qa = QA::FindOrFail($id);
        $data = ["qa" => $qa];
        return view('backend.qa.edit')->with($data);

    }

    public function qaUpdate(Request $request, $id)
    {
        $qa = QA::FindOrFail($id);
        $qa->fill($request->all())->save();
        Session::flash('flash_message', 'Category successfully edited.');
        return redirect()->back();

    }

    public function qaDelete($id)
    {

        $qa = QA::FindOrFail($id);
        $qa->delete();
        return redirect()->back();

    }

    public function storeFile(Request $request)
    {

        $category = Categories::FindOrFail($request->get('cat_id'));

        $fileObj = new FileStore($request, 'categories');

        $input = $request->all();
        $input['file'] = $fileObj->fileStore();

        $category->fill($input)->save();

        Session::flash('flash_message', 'Category file successfully added!');
        return redirect()->back();

    }
}
