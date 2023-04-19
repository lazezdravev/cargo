<?php

namespace App\Http\Controllers;

use App\Mail\JobApplicant;
use App\Models\Applicants;
use App\Models\Blog;
use App\Models\Country;
use App\Models\Job;
use App\Models\JobApplicants;
use App\Models\Product;
use App\Models\QA;
use App\Models\Slider;
use App\Models\StaticPages;
use App\Models\Subscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Settings;
use App\Models\Service;
use App\Models\Gallery;
use App\Models\Referral;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;
use App\Models\Script;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Validator;
use Adrianorosa\GeoLocation\GeoLocation;

class FrontEndController extends Controller
{
    public function  index()
    {
        $tree = Categories::getTreeHP();
        $categories = Categories::all();
        $settings = Settings::first();
        $services = Service::all();
        $sliders = Slider::all();
        $referral = Referral::all();
        $scripts = Script::all();
        $blogsFooter = Blog::orderBy('id', 'desc')->get()->take(3);
        $testimonials = Testimonial::all();
        $jobs  = Job::all();



        $staticpages = StaticPages::all();;
        $data = ["jobs" => $jobs, "testimonials" => $testimonials,"blogsFooter" => $blogsFooter, "scripts" => $scripts, "referral" => $referral, "sliders" => $sliders,"tree" => $tree, "categories" => $categories, "settings" => $settings, "services" => $services, "staticpages" => $staticpages];
        return view('frontend.index')->with($data);

    }

    public function  blogs()
    {
        $tree = Categories::getTreeHP();
        $categories = Categories::all();
        $settings = Settings::first();
        $services = Service::all();
        $sliders = Slider::all();
        $referral = Referral::all();
        $blogs = Blog::paginate(9);
        $staticpages = StaticPages::all();
        $scripts = Script::all();
        $blogsFooter = Blog::orderBy('id', 'desc')->get()->take(3);


        $data = ["blogsFooter" => $blogsFooter, "scripts" => $scripts, "blogs" => $blogs, "referral" => $referral, "sliders" => $sliders,"tree" => $tree, "categories" => $categories, "settings" => $settings, "services" => $services, "staticpages" => $staticpages];
        return view('frontend.blogs')->with($data);
    }

    public function blog($slug)
    {
        $blog = Blog::where('slug', '=', $slug)->first();

        $tree = Categories::getTreeHP();
        $categories = Categories::all();
        $settings = Settings::first();
        $services = Service::all();
        $sliders = Slider::all();
        $referral = Referral::all();
        $blogs = Blog::paginate(9);
        $staticpages = StaticPages::all();
        $scripts = Script::all();
        $blogsFooter = Blog::orderBy('id', 'desc')->get()->take(3);
        $testimonials = Testimonial::all();


        $data = ["blog" => $blog, "blogsFooter" => $blogsFooter, "scripts" => $scripts, "blogs" => $blogs, "referral" => $referral, "sliders" => $sliders,"tree" => $tree, "categories" => $categories, "settings" => $settings, "services" => $services, "staticpages" => $staticpages, "testimonials" => $testimonials];
        return view('frontend.blog')->with($data);
    }

    public function categories()
    {
        $tree = Categories::getTreeHP();
        $categories = Categories::where('parent_id', '=', null)->get();
        $settings = Settings::first();
        $services = Service::all();
        $sliders = Slider::all();
        $staticpages = StaticPages::all();
        $scripts = Script::all();
        $blogsFooter = Blog::orderBy('id', 'desc')->get()->take(3);

        $data = ["blogsFooter" => $blogsFooter, "scripts" => $scripts, "sliders" => $sliders,"tree" => $tree, "categories" => $categories, "settings" => $settings, "services" => $services, "staticpages" => $staticpages];
        return view('frontend.categories')->with($data);
    }

    public function category($slug)
    {
        $category = Categories::where("slug", "=", $slug)->first();
        $tree = Categories::getTreeHP();
        $categories = Categories::all();
        $products = Product::where('category', '=', $category->id)->get();
        $settings = Settings::first();
        $services = Service::all();
        $sliders = Gallery::where('cat_id', '=', $category->id)->get();
        $staticpages = StaticPages::all();
        $scripts = Script::all();
        $blogsFooter = Blog::orderBy('id', 'desc')->get()->take(3);

        $questionsAnswers = QA::where('cat_id', '=', $category->id)->get();

        $data = ["questionsAnswers" => $questionsAnswers, "blogsFooter" => $blogsFooter, "scripts" => $scripts, "products" => $products, "category" => $category, "sliders" => $sliders,"tree" => $tree, "categories" => $categories, "settings" => $settings, "services" => $services, "staticpages" => $staticpages];
        return view('frontend.categories')->with($data);
    }

    public function service($slug)
    {
        $service = Service::where("slug", "=", $slug)->first();
        $tree = Categories::getTreeHP();
        $settings = Settings::first();
        $services = Service::all();
        $categories = Categories::all();
        $staticpages = StaticPages::all();
        $scripts  = Script::all();
        $blogsFooter = Blog::orderBy('id', 'desc')->get()->take(3);

        $data = ["blogsFooter" => $blogsFooter, "scripts" => $scripts, "categories" => $categories, "service" => $service, "tree" => $tree, "settings" => $settings, "services" => $services, "staticpages" => $staticpages];
        return view('frontend.service')->with($data);
    }

    public function staticPages($slug)
    {
        $static_page = StaticPages::where("slug", "=", $slug)->first();
        $tree = Categories::getTreeHP();
        $settings = Settings::first();
        $services = Service::all();
        $staticpages = StaticPages::all();
        $categories = Categories::all();
        $scripts = Script::all();
        $blogsFooter = Blog::orderBy('id', 'desc')->get()->take(3);

        $data = ["blogsFooter" => $blogsFooter, "scripts" => $scripts, "categories" => $categories, "static_page" => $static_page, "tree" => $tree, "settings" => $settings, "services" => $services, "staticpages" => $staticpages];
        return view('frontend.static_pages')->with($data);
    }

    public function jobs()
    {
        $jobs = Job::all();
        $tree = Categories::getTreeHP();
        $settings = Settings::first();
        $services = Service::all();
        $staticpages = StaticPages::all();
        $categories = Categories::all();
        $scripts = Script::all();
        $blogsFooter = Blog::orderBy('id', 'desc')->get()->take(3);

        $data = ["jobs" => $jobs, "blogsFooter" => $blogsFooter, "scripts" => $scripts, "categories" => $categories, "tree" => $tree, "settings" => $settings, "services" => $services, "staticpages" => $staticpages];

        return view('frontend.jobs')->with($data);
    }

    public function referral($slug)
    {
        $referral = Referral::where("slug", "=", $slug)->first();
        $tree = Categories::getTreeHP();
        $settings = Settings::first();
        $services = Service::all();
        $staticpages = StaticPages::all();
        $scripts = Script::all();
        $blogsFooter = Blog::orderBy('id', 'desc')->get()->take(3);

        $data = ["blogsFooter" => $blogsFooter, "scripts" => $scripts, "referral" => $referral, "tree" => $tree, "settings" => $settings, "services" => $services, "staticpages" => $staticpages];
        return view('frontend.referral')->with($data);
    }

    public function product($slug)
    {
        $product = Product::where("slug", "=", $slug)->first();
        $tree = Categories::getTreeHP();
        $settings = Settings::first();
        $services = Service::all();
        $staticpages = StaticPages::all();
        $scripts = Script::all();
        $blogsFooter = Blog::orderBy('id', 'desc')->get()->take(3);

        $data = ["blogsFooter" => $blogsFooter, "scripts" => $scripts, "product" => $product, "tree" => $tree, "settings" => $settings, "services" => $services, "staticpages" => $staticpages];
        return view('frontend.product')->with($data);
    }

    public function application(Request $request)
    {
        $tree = Categories::getTreeHP();
        $settings = Settings::first();
        $services = Service::all();
        $staticpages = StaticPages::all();
        $scripts = Script::all();
        $blogsFooter = Blog::orderBy('id', 'desc')->get()->take(3);
        $categories = Categories::all();
        $geolocation = GeoLocation::lookup($request->ip());
        $countries = Country::orderBy('name', 'asc')->get();


        $data = ["countries" => $countries, "geolocation" => $geolocation, "categories" => $categories, "blogsFooter" => $blogsFooter, "scripts" => $scripts, "tree" => $tree, "settings" => $settings, "services" => $services, "staticpages" => $staticpages];
        return view('frontend.application')->with($data);
    }

    public function contact()
    {
        $tree = Categories::getTreeHP();
        $settings = Settings::first();
        $services = Service::all();
        $staticpages = StaticPages::all();
        $scripts = Script::all();
        $blogsFooter = Blog::orderBy('id', 'desc')->get()->take(3);
        $categories = Categories::all();

        $data = ["categories" => $categories, "blogsFooter" => $blogsFooter, "scripts" => $scripts, "tree" => $tree, "settings" => $settings, "services" => $services, "staticpages" => $staticpages];
        return view('frontend.contact')->with($data);
    }

    public function contactForm(Request $request)
    {
        $settings = Settings::first();
        $name = $request->get('name');
        $email = $request->get('email');
        $message = $request->get('message');
        $phone = $request->get('phone');
        $subject = $request->get('subject');
        Mail::to($settings->email)->send(new ContactForm($message, $name, $email, $phone, $subject));
        return response()->json(["status" => "success"], 200);
    }

    public function subscribe(Request $request): JsonResponse
    {
        $rules = [
            'email' => 'required|email'
        ];

        $validator = Validator::make($request->all(), $rules);
        if (!$validator->passes()) {
            return Response::json($validator->errors()->all(), 400);
        }

        Subscriber::create(['email' => $request->get('email')]);
        return Response::json([$request->all(), 200]);
    }

    public function applicationForm(Request $request): JsonResponse
    {
        $rules = [
            'firstName' => 'required',
            'lastName' => 'required',
            'phone'     => 'required',
            'email'     => 'required|email'
        ];

        $validator = Validator::make($request->all(), $rules);
        if (!$validator->passes()) {
            return Response::json($validator->errors()->all(), 400);
        }

        Applicants::create($request->all());
        return Response::json([$request->all(), 200]);
    }

    public function jobApplicationForm(Request $request, Job $job)
    {
        $tree = Categories::getTreeHP();
        $settings = Settings::first();
        $services = Service::all();
        $staticpages = StaticPages::all();
        $scripts = Script::all();
        $blogsFooter = Blog::orderBy('id', 'desc')->get()->take(3);
        $categories = Categories::all();
        $geolocation = GeoLocation::lookup($request->ip());
        $countries = Country::orderBy('name', 'asc')->get();

        $data = ["job" => $job, "countries" => $countries, "geolocation" => $geolocation, "categories" => $categories, "blogsFooter" => $blogsFooter, "scripts" => $scripts, "tree" => $tree, "settings" => $settings, "services" => $services, "staticpages" => $staticpages];
        return view('frontend.job_application')->with($data);
    }

    public function jobApplication(Request $request, Job $job): JsonResponse
    {
        $rules = [
            'firstName' => 'required',
            'lastName' => 'required',
            'phone'     => 'required',
            'email'     => 'required|email'
        ];

        $validator = Validator::make($request->all(), $rules);
        if (!$validator->passes()) {
            return Response::json($validator->errors()->all(), 400);
        }

        $input = $request->all();
        $input['job_id'] = $job->id;
        $applicant = JobApplicants::create($input);

        $settings = Settings::first();

        Mail::to($settings->email)->send(new JobApplicant($job, $applicant, "Job Applicant"));
        return Response::json([$request->all(), 200]);
    }

    public function searchBlog(Request $request): JsonResponse
    {
        $query = $request->get('query');
        $filterResult = Blog::where('title', 'LIKE', '%'. $query. '%')->pluck('title');
        return Response::json($filterResult, 200);
    }

    public function searchedBlogs(Request $request)
    {
        $query = $request->get('search');
        $tree = Categories::getTreeHP();
        $categories = Categories::all();
        $settings = Settings::first();
        $services = Service::all();
        $sliders = Slider::all();
        $referral = Referral::all();
        $blogs = Blog::where('title', 'LIKE', '%'. $query. '%')->paginate(9);
        $staticpages = StaticPages::all();
        $scripts = Script::all();
        $blogsFooter = Blog::orderBy('id', 'desc')->get()->take(3);


        $data = ["blogsFooter" => $blogsFooter, "scripts" => $scripts, "blogs" => $blogs, "referral" => $referral, "sliders" => $sliders,"tree" => $tree, "categories" => $categories, "settings" => $settings, "services" => $services, "staticpages" => $staticpages];
        return view('frontend.blogs')->with($data);
    }

    public function allSearch(Request $request): JsonResponse
    {
        $query = $request->get('query');
        $results['job'] = Job::search($query);
        return Response::json($results, 200);
    }

    public function allSearched(Request $request)
    {

        $query = $request->get('s');

        $tree = Categories::getTreeHP();
        $categories = Categories::all();
        $settings = Settings::first();
        $services = Service::all();
        $sliders = Slider::all();
        $referral = Referral::all();
        $jobs = Job::search($query);
        $staticpages = StaticPages::all();
        $scripts = Script::all();
        $blogsFooter = Blog::orderBy('id', 'desc')->get()->take(3);


        $data = ["jobs" => $jobs, "blogsFooter" => $blogsFooter, "scripts" => $scripts, "referral" => $referral, "sliders" => $sliders,"tree" => $tree, "categories" => $categories, "settings" => $settings, "services" => $services, "staticpages" => $staticpages];
        return view('frontend.jobs')->with($data);
    }
}
