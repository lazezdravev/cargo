<?php

namespace App\Http\Controllers;

use App\Http\Helper\ImageStore;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Slider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $sliders = Slider::all();
        $data = ['sliders' => $sliders, "users" => $users];
        return view('backend.slider.index')->with($data);
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
        return view('backend.slider.create')->with($data);
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

        $slug = Slider::where('title', $request['title'])->get();
        (int)$count = count($slug);

        if ($count > 0) $request['slug'] = $request['slug'] . '-' . $count;


        $input = $request->all();


        $imageObj = new ImageStore($request, 'slider');
        $image = $imageObj->imageStore();


        $input['image'] = $image;

        $input['user_id'] = auth()->user()->id;

        Slider::create($input);


        Session::flash('flash_message', 'Slider image successfully created!');

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
        $slider = Slider::FindOrFail($id);
        $users = User::all();
        $data = ['slider' => $slider, 'users' => $users];
        return view('backend.slider.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::FindOrFail($id);
        $users = User::get();
        $data = ['slider' => $slider, 'users' => $users];
        return view('backend.slider.edit')->with($data);
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


        $request['title'] = Str::slug($request['title']);

        $slugname = Str::slug($request['title']);

        $input = $request->all();
        $slider = Slider::FindOrFail($id);


        if($request->has('image')) {
            $imageObj = new ImageStore($request, 'slider');
            $image = $imageObj->imageStore();
            $input['image'] = $image;
        }



        $slider->fill($input)->save();


        Session::flash('flash_message', 'Slider successfully edited!');

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
        $slider = Slider::FindOrFail($id);

        // Delete blogs images


        $slider->delete();
        return redirect('/admin/slider');
    }
}
