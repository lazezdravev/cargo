<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Http\Helper\ImageStore;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $testimonials = Testimonial::all();
        $data = ['testimonials' => $testimonials, "users" => $users];
        return view('backend.testimonials.index')->with($data);
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
        return view('backend.testimonials.create')->with($data);
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



        $input = $request->all();


        $imageObj = new ImageStore($request, 'testimonials');
        $image = $imageObj->imageStore();


        $input['image'] = $image;

        $input['user_id'] = auth()->user()->id;

        Testimonial::create($input);


        Session::flash('flash_message', 'Testimonial successfully created!');

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
        $testimonial = Testimonial::FindOrFail($id);
        $users = User::all();
        $data = ['testimonial' => $testimonial, 'users' => $users];
        return view('backend.testimonials.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::FindOrFail($id);
        $users = User::get();
        $data = ['testimonial' => $testimonial, 'users' => $users];
        return view('backend.testimonials.edit')->with($data);
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
        $testimonial = Testimonial::FindOrFail($id);


        if($request->has('image')) {
            $imageObj = new ImageStore($request, 'testimonials');
            $image = $imageObj->imageStore();
            $input['image'] = $image;
        }



        $testimonial->fill($input)->save();


        Session::flash('flash_message', 'Testimonial successfully edited!');

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
        $testimonial = Testimonial::FindOrFail($id);

        // Delete blogs images


        $testimonial->delete();
        return redirect('/admin/testimonials');
    }
}
