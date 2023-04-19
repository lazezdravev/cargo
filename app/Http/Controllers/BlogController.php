<?php

namespace App\Http\Controllers;

use App\Http\Helper\ImageStore;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $blogs = Blog::all();
        $data = ['blogs' => $blogs, "users" => $users];
        return view('backend.blogs.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        $data = ['users' => $users];
        return view('backend.blogs.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required',
            'tags'        => 'required'
        ]);

        if ($errors->fails()) {
            return redirect()->back()
                ->withErrors($errors)
                ->withInput();
        }

        $input = $request->all();


        $imageObj = new ImageStore($request, 'blogs');
        $image = $imageObj->imageStore();


        $input['image'] = $image;

        $input['user_id'] = auth()->user()->id;

        Blog::create($input);


        Session::flash('flash_message', 'Blog successfully created!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::FindOrFail($id);
        $users = User::all();
        $data = ['blogs' => $blog, 'users' => $users];
        return view('backend.blogs.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::FindOrFail($id);
        $users = User::get();
        $data = ['blog' => $blog, 'users' => $users];
        return view('backend.blogs.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $errors = Validator::make($request->all(), [
            'title'       => 'required|max:255',
            'description' => 'required'
        ]);

        if ($errors->fails()) {
            return redirect()->back()
                ->withErrors($errors)
                ->withInput();
        }

        $input = $request->all();
        $blog = Blog::FindOrFail($id);


        if($request->has('image')) {
            $imageObj = new ImageStore($request, 'blogs');
            $image = $imageObj->imageStore();
            $input['image'] = $image;
        }

        $blog->fill($input)->save();

        Session::flash('flash_message', 'Blog successfully edited!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::FindOrFail($id);

        // Delete blogs images


        $blog->delete();
        return redirect('/admin/blogs');
    }
}
