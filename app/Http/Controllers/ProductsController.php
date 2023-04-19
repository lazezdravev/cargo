<?php

namespace App\Http\Controllers;

use App\Http\Helper\FileStore;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Http\Helper\ImageStore;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'asc')->paginate(10);
        $data = ['products' => $products];
        return view('backend.product.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::getList();
        $users = User::get();
        $data = ['categories' => $categories, 'users' => $users];
        return view('backend.product.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required',
        ]);

        if ($errors->fails()) {
            return redirect()->back()
                ->withErrors($errors)
                ->withInput();
        }



        $request['title'] = strip_tags($request['title']);
        $request['slug'] = Str::slug($request['title']);

        $slug = Product::where('title', $request['title'])->get();

        (int)$count = count($slug);

        if ($count > 0) $request['slug'] = $request['slug'] . '-' . $count;


        $input = $request->all();


        $imageObj = new ImageStore($request, 'products');
        $image = $imageObj->imageStore();


        $input['image'] = $image;

        Product::create($input);

        Session::flash('flash_message', 'Product successfully created!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::FindOrFail($id);
        $users = User::all();
        $data = ['product' => $product, 'users' => $users];
        return view('backend.product.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::FindOrFail($id);
        $categories = Categories::getList();
        $users = User::get();
        $data = ['product' => $product, 'categories' => $categories, 'users' => $users];
        return view('backend.product.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $errors = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        if ($errors->fails()) {
            return redirect()->back()
                ->withErrors($errors)
                ->withInput();
        }


        $request['title'] = strip_tags($request['title']);

        $slug = DB::table('products')->select('slug')->where('id', '=', $id)->get();

        $slugname = $slug[0]->slug;


        $input = $request->all();
        $product = Product::FindOrFail($id);



        $imageObj = new ImageStore($request, 'products');
        $image = $imageObj->imageStore();

        $input['image'] = $image;


        $product->fill($input)->save();


        Session::flash('flash_message', 'Product successfully edited!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::FindOrFail($id);
        $product->delete();
        return redirect('/admin/products');
    }

    public function addFile($id)
    {

        $product = Product::FindOrFail($id);
        $data = ['product' => $product];
        return view('backend.files.create-product')->with($data);

    }

    public function storeFile(Request $request)
    {

        $product = Product::FindOrFail($request->get('product_id'));

        $fileObj = new FileStore($request, 'products');

        $input = $request->all();
        $input['file'] = $fileObj->fileStore();

        $product->fill($input)->save();

        Session::flash('flash_message', 'Category file successfully added!');
        return redirect()->back();

    }
}
