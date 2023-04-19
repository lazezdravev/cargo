<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sliders;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Helper\ImageStore;

class SlidersController extends Controller
{
    public function index()
    {

        $users = User::all();
        $products = Product::all();

        $data = ["users" => $users, "products" => $products];

        return view('backend.sliders.index')->with($data);
    }

    public function create($id)
    {


        $product = Product::FindOrFail($id);

        $users = User::all();
        $sliders = Sliders::where('product_id','=',$id)->get();

        $data = ['sliders' => $sliders, "users" => $users, "product" => $product];


        return view('backend.sliders.create')->with($data);
    }

    public function show($id)
    {
        $product = Product::FindOrFail($id);

        $users = User::all();
        $sliders = Sliders::where('product_id','=',$id)->get();

        $data = ['sliders' => $sliders, "users" => $users, "product" => $product];


        return view('backend.sliders.show')->with($data);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => ['required', 'integer'],
            'images.*'  => ['required', 'image']
        ]);

        if ($validator->fails()) {

            return redirect('admin/sliders/create')
                ->withErrors($validator)
                ->withInput();
        }

        $imageObj = new ImageStore($request, 'sliders');
        foreach($request->images as $image) {

            $image = $imageObj->imagesStore($image);

            Sliders::create([
                'image'  => $image,
                'product_id' => $request->get('product_id'),
                'user_id' => auth()->user()->id
            ]);
        }

        return redirect('admin/sliders/'. $request->get('product_id'));
    }



    public function destroy($id)
    {
        $slider = Sliders::FindOrFail($id);

        $slider->delete();
        return redirect()->back();
    }

    public function frontpage(Request $request, $id)
    {
        $slider = Sliders::FindOrFail($id);

        // return response()->json(['front_page' => $request->front_page], 200);
        if($request->front_page == 1) {
            $slider->front_page = true;
            $slider->save();
            return response()->json(["status" => "success"], 200);
        } else {
            $slider->front_page = false;
            $slider->save();
            return response()->json(["status" => "success"], 200);
        }

        return response()->json(["status" => "error"], 401);

    }
}
