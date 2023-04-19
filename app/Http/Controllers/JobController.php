<?php

namespace App\Http\Controllers;

use App\Http\Helper\ImageStore;
use App\Models\Job;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\JobApplicants;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::all();
        $data = ['jobs' => $jobs];
        return view('backend.jobs.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $errors = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'option' => 'required',
            'type' => 'required',
            'description' => 'required',
            'place'  => 'required'
        ]);

        if ($errors->fails()) {
            return redirect()->back()
                ->withErrors($errors)
                ->withInput();
        }


        $input = $request->all();

        $imageObj = new ImageStore($request, 'jobs');
        $image = $imageObj->imageStore();


        $input['image'] = $image;



        Job::create($input);

        Session::flash('flash_message', 'Job successfully created!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        $data = ["job" => $job];
        return view('backend.jobs.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        $data = ["job" => $job];
        return view('backend.jobs.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {

        $input = $request->all();
        if($request->has('image')) {
            $imageObj = new ImageStore($request, 'jobs');
            $image = $imageObj->imageStore();
            $input['image'] = $image;
        }

        $job->fill($input)->save();
        return redirect()->route('jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index');
    }

    public function jobApplicants()
    {
        $jobApplicants = JobApplicants::all();
        $data = ['jobApplicants' =>  $jobApplicants];
        return view('backend.jobs.applicants')->with($data);
    }
}
