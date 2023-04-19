<?php

namespace App\Http\Controllers;

use App\Http\Helper\ImageStore;
use App\Models\Referral;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ReferralsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $referrals = Referral::all();
        $data = ['referrals' => $referrals, "users" => $users];
        return view('backend.referrals.index')->with($data);
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
        return view('backend.referrals.create')->with($data);
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

        $slug = Referral::where('title', $request['title'])->get();
        (int)$count = count($slug);

        if ($count > 0) $request['slug'] = $request['slug'] . '-' . $count;


        $input = $request->all();


        $imageObj = new ImageStore($request, 'referrals');
        $image = $imageObj->imageStore();


        $input['image'] = $image;

        $input['user_id'] = auth()->user()->id;

        Referral::create($input);


        Session::flash('flash_message', 'Referral successfully created!');

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
        $referral = Referral::FindOrFail($id);
        $users = User::all();
        $data = ['referral' => $referral, 'users' => $users];
        return view('backend.referrals.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $referral = Referral::FindOrFail($id);
        $users = User::get();
        $data = ['referral' => $referral, 'users' => $users];
        return view('backend.referrals.edit')->with($data);
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
        $referral = Referral::FindOrFail($id);


        if($request->has('image')) {
            $imageObj = new ImageStore($request, 'referrals');
            $image = $imageObj->imageStore();
            $input['image'] = $image;
        }



        $referral->fill($input)->save();


        Session::flash('flash_message', 'Referral successfully edited!');

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
        $referral = Referral::FindOrFail($id);

        // Delete blogs images


        $referral->delete();
        return redirect('/admin/referrals');
    }
}
