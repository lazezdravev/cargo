<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Categories;
use App\Models\StaticPages;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Spatie\Sitemap\SitemapGenerator;
use Psr\Http\Message\UriInterface;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Job;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $settings = Settings::first();
        $users = User::all();

        $data = ['users' => $users, "settings" => $settings];
        if (empty($settings)) {
            return view('backend.settings.create')->with($data);
        } else {
            $settings = Settings::first();
            $data = ['users' => $users, "settings" => $settings];
            return view('backend.settings.index')->with($data);
        }
    }

    public function store(Request $request)
    {


        $errors = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'mainurl' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'logo' => 'required',
        ]);

        if ($errors->fails()) {
            return redirect()->back()
                ->withErrors($errors)
                ->withInput();
        }


        $input = $request->all();


        if ($request->hasFile('logo')) {

            $image = $request->file('logo');
            $path = public_path() . '/assets/img/logo';
            $pathThumb = public_path() . '/assets/img/logo/thumbnails/';
            $pathMedium = public_path() . '/assets/img/logo/medium/';


            File::makeDirectory($path, $mode = 0755, true, true);
            File::makeDirectory($pathThumb, $mode = 0755, true, true);
            File::makeDirectory($pathMedium, $mode = 0755, true, true);


            $ext = $image->getClientOriginalExtension();
            $imageName = 'logo.' . $ext;

            $image->move($path, $imageName);

            $findimage = public_path() . '/assets/img/logo/' . $imageName;
            $imagethumb = Image::make($findimage)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $imagemedium = Image::make($findimage)->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $imagethumb->save($pathThumb . $imageName);
            $imagemedium->save($pathMedium . $imageName);

            $image = $request->imagethumb = $imageName;
            $imagethumb = $request->image = $imageName;
            $imagemedium = $request->image = $imageName;

            $input['logo'] = $image;
            $input['logomedium'] = $imagemedium;
            $input['logothumb'] = $imagethumb;

        }

        if ($request->hasFile('logo_white')) {
            $image = $request->file('logo_white');
            $path = public_path() . '/assets/img/logo_white';
            $ext = $image->getClientOriginalExtension();
            $imageName = 'logo_white.' . $ext;
            File::makeDirectory($path, $mode = 0755, true, true);
            $image->move($path, $imageName);
            $input['logo_white'] = $imageName;
        }

        if ($request->hasFile('meta_image')) {
            $image = $request->file('meta_image');
            $path = public_path() . '/assets/img/meta_image';
            $ext = $image->getClientOriginalExtension();
            $imageName = 'meta_image.' . $ext;
            File::makeDirectory($path, $mode = 0755, true, true);
            $image->move($path, $imageName);
            $input['meta_image'] = $imageName;
        }


        Settings::create($input);

        Session::flash('flash_message', 'Settings successfully created!');

        return redirect()->back();
    }

    public function edit()
    {
        $settings = Settings::first();
        $users = User::all();
        $data = ['users' => $users, "settings" => $settings];
        return view('backend.settings.edit')->with($data);
    }

    public function update(Request $request)
    {


        $errors = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'mainurl' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        if ($errors->fails()) {
            return redirect()->back()
                ->withErrors($errors)
                ->withInput();
        }


        $input = $request->all();
        $settings = Settings::first();

        $settings->fill($input)->save();

        if ($request->hasFile('logo')) {

            $image = $request->file('logo');
            $path = public_path() . '/assets/img/logo';
            $pathThumb = public_path() . '/assets/img/logo/thumbnails/';
            $pathMedium = public_path() . '/assets/img/logo/medium/';
            $ext = $image->getClientOriginalExtension();
            $imageName = 'logo.' . $ext;

            File::makeDirectory($path, $mode = 0755, true, true);
            File::makeDirectory($pathThumb, $mode = 0755, true, true);
            File::makeDirectory($pathMedium, $mode = 0755, true, true);

            $image->move($path, $imageName);

            $findimage = public_path() . '/assets/img/logo/' . $imageName;
            $imagethumb = Image::make($findimage)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $imagemedium = Image::make($findimage)->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $imagethumb->save($pathThumb . $imageName);
            $imagemedium->save($pathMedium . $imageName);

            $image = $request->imagethumb = $imageName;
            $imagethumb = $request->image = $imageName;
            $imagemedium = $request->image = $imageName;

            $input['logo'] = $image;
            $input['logomedium'] = $imagemedium;
            $input['logothumb'] = $imagethumb;
        }

        if ($request->hasFile('logo_white')) {
            $image = $request->file('logo_white');
            $path = public_path() . '/assets/img/logo_white';
            $ext = $image->getClientOriginalExtension();
            $imageName = 'logo_white.' . $ext;
            File::makeDirectory($path, $mode = 0755, true, true);
            $image->move($path, $imageName);
            $input['logo_white'] = $imageName;
        }

        if ($request->hasFile('meta_image')) {
            $image = $request->file('meta_image');
            $path = public_path() . '/assets/img/meta_image';
            $ext = $image->getClientOriginalExtension();
            $imageName = 'meta_image.' . $ext;
            File::makeDirectory($path, $mode = 0755, true, true);
            $image->move($path, $imageName);
            $input['meta_image'] = $imageName;
        }


        $settings->fill($input)->save();


        Session::flash('flash_message', 'Settings successfully edited!');

        return redirect()->back();
    }

    public function sitemap()
    {

        $blogs = Blog::all();
        $services = Categories::all();
        $jobs = Job::all();
        $static_pages = StaticPages::all();

        $sitemap = Sitemap::create();

        $sitemap->add(Url::create(env('APP_URL'))
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.1));
        $sitemap->add(Url::create(env('APP_URL') . '/contact')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.1));
        $sitemap->add(Url::create(env('APP_URL') . '/blog')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.1));

        foreach($blogs as $blog)
        {
            $sitemap->add(Url::create(env('APP_URL') . '/blog/'. $blog->slug)
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.1));
        }

        $sitemap->add(Url::create(env('APP_URL') . '/jobs')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.1));

        foreach($jobs as $job)
        {
            $sitemap->add(Url::create(env('APP_URL') . '/application/'. $job->id)
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.1));
        }


        foreach($services as $service)
        {
            $sitemap->add(Url::create(env('APP_URL') . '/service/'. $service->slug)
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.1));
        }

        foreach($static_pages as $static_page)
        {
            $sitemap->add(Url::create(env('APP_URL') . '/'. $static_page->slug)
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.1));
        }

        $sitemap->writeToFile(public_path() . '/sitemap.xml');

    }
}
