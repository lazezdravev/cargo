<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Helper\ImageStore;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $services = Service::all();
        $data = ['services' => $services, "users" => $users];
        return view('backend.services.index')->with($data);
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
        return view('backend.services.create')->with($data);
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

        $slug = Service::where('title', $request['title'])->get();
        (int)$count = count($slug);

        if ($count > 0) $request['slug'] = $request['slug'] . '-' . $count;


        $input = $request->all();


        $imageObj = new ImageStore($request, 'services');
        $image = $imageObj->imageStore();


        $input['image'] = $image;

        $input['user_id'] = auth()->user()->id;

        Service::create($input);


        Session::flash('flash_message', 'Service successfully created!');

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
        $service = Service::FindOrFail($id);
        $users = User::all();
        $data = ['service' => $service, 'users' => $users];
        return view('backend.services.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::FindOrFail($id);
        $users = User::get();
        $data = ['service' => $service, 'users' => $users];
        return view('backend.services.edit')->with($data);
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
        $service = Service::FindOrFail($id);


        if($request->has('image')) {
            $imageObj = new ImageStore($request, 'services');
            $image = $imageObj->imageStore();
            $input['image'] = $image;
        }



        $service->fill($input)->save();


        Session::flash('flash_message', 'Service successfully edited!');

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
        $service = Service::FindOrFail($id);

        // Delete blogs images


        $service->delete();
        return redirect('/admin/services');
    }
}
