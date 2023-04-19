<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Gallery;
use Illuminate\Support\Facades\Validator;
use App\Http\Helper\ImageStore;

class   GalleryController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        $data = ['categories' => $categories];
        return view('backend.gallery.show')->with($data);
    }

    public function create()
    {
        $categories = Categories::getList();
        $data = ['categories' => $categories];
        return view('backend.gallery.create')->with($data);
    }

    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'cat_id' => ['required', 'integer'],
            'images.*'  => ['required', 'image']
        ]);

        if ($validator->fails()) {

            return redirect('admin/gallery/create')
                ->withErrors($validator)
                ->withInput();
        }

        $imageObj = new ImageStore($request, 'gallery');
        foreach($request->images as $image) {

            $image = $imageObj->imagesStore($image);

            Gallery::create([
                'image'  => $image,
                'cat_id' => $request->get('cat_id'),
            ]);
        }



        $categories = Categories::all();
        $gallery = Gallery::all();
        $data = [
            'categories' => $categories,
            'gallery'    => $gallery
        ];
        return view('backend.gallery.show')->with($data);

    }

    public function show($id)
    {
        $category = Categories::FindOrFail($id);
        $data = ['category' => $category];
        return view('backend.gallery.index')->with($data);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $gallery = Gallery::FindOrFail($id);
        $gallery->delete();
        $gallery = Gallery::all();
        $data = ["gallery" => $gallery];
        return redirect()->back();
    }

    public function frontpage(Request $request, $id)
    {
        $gallery = Gallery::FindOrFail($id);

        // return response()->json(['front_page' => $request->front_page], 200);
        if($request->front_page == 1) {
            $gallery->front_page = true;
            $gallery->save();
            return response()->json(["status" => "success"], 200);
        } else {
            $gallery->front_page = false;
            $gallery->save();
            return response()->json(["status" => "success"], 200);
        }

        return response()->json(["status" => "error"], 401);

    }
}
