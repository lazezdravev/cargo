<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Helper\ImageStore;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isNull;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        $data = ['users' => $users];
        return view('backend.users.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $data = ["roles" => $roles];
        return view('backend.users.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'same:password_confirmation'],
            'password_confirmation' => ['required', 'string', 'min:6'],
            'role_id' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect('admin/users/create')
                ->withErrors($validator)
                ->withInput();
        }

        $imageObj = new ImageStore($request, 'users');
        $image = $imageObj->imageStore();

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'image' => $image,
            'password' => Hash::make($request->get('password')),
            'role_id' => $request->get('role_id')
        ]);

        Session::flash('flash_message', 'User successfully created!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $data = ["user" => $user];
        return view('backend.users.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $user = User::FindOrFail($user->id);
        $data = ["roles" => $roles, "user" => $user];
        return view('backend.users.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $input = $request->all();

        if(isNull($request->get('password'))) {
            $input = $request->except('password');
        }

        if($request->has('image')) {
            $imageObj = new ImageStore($request, 'users');
            $image = $imageObj->imageStore();
            $input['image'] = $image;
        }


        $user->fill($input)->save();
        Session::flash('flash_message', 'User successfully edited!');
        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(auth()->user()->id != $user->id) {
            $user->delete();
            Session::flash('flash_message', 'User successfully deleted!');
            return redirect()->back();
        }

        Session::flash('flash_message', 'User cannot be deleted!');
        return redirect()->back();

    }
}
