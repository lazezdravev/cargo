<?php

namespace App\Http\Controllers;

use App\Http\Helper\ImageStore;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\StaticPages;

class StaticPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        $static_pages = StaticPages::all();
        $data = ['static_pages' => $static_pages, "users" => $users];
        return view('backend.staticpages.index')->with($data);
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
        return view('backend.staticpages.create')->with($data);
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
        ]);

        if ($errors->fails()) {
            return redirect()->back()
                ->withErrors($errors)
                ->withInput();
        }


        $request['title'] = strip_tags($request['title']);
        $request['slug'] = Str::slug($request['title']);

        $slug = StaticPages::where('title', $request['title'])->get();
        (int)$count = count($slug);

        if ($count > 0) $request['slug'] = $request['slug'] . '-' . $count;


        $input = $request->all();


        $imageObj = new ImageStore($request, 'static_pages');
        $image = $imageObj->imageStore();


        $input['image'] = $image;

        $input['user_id'] = auth()->user()->id;

        StaticPages::create($input);


        Session::flash('flash_message', 'Static page successfully created!');

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
        $static_page = StaticPages::FindOrFail($id);
        $users = User::all();
        $data = ['static_page' => $static_page, 'users' => $users];
        return view('backend.staticpages.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $static_page = StaticPages::FindOrFail($id);
        $users = User::get();
        $data = ['static_page' => $static_page, 'users' => $users];
        return view('backend.staticpages.edit')->with($data);
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
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        if ($errors->fails()) {
            return redirect()->back()
                ->withErrors($errors)
                ->withInput();
        }



        $request['slug'] = Str::slug($request['title']);



        $input = $request->all();
        $static_page = StaticPages::FindOrFail($id);


        if($request->has('image')) {
            $imageObj = new ImageStore($request, 'static_pages');
            $image = $imageObj->imageStore();
            $input['image'] = $image;
        }



        $static_page->fill($input)->save();


        Session::flash('flash_message', 'Static page successfully edited!');

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
        $static_page = StaticPages::FindOrFail($id);
        $static_page->delete();
        return redirect('/admin/static_pages');
    }
}
