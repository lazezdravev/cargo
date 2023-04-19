<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();





Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/jobs/applicants', [App\Http\Controllers\JobController::class, 'jobApplicants'])->name('job.applicants');
    Route::post('/settings/store', [App\Http\Controllers\HomeController::class, 'store'])->name('settings.store');
    Route::get('/settings/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('settings.edit');
    Route::put('/settings/update', [App\Http\Controllers\HomeController::class, 'update'])->name('settings.update');
    Route::resource('/users', App\Http\Controllers\UserController::class);
    Route::resource('/slider', App\Http\Controllers\SliderController::class);
    Route::resource('/services', App\Http\Controllers\ServicesController::class);
    Route::resource('/static_pages', App\Http\Controllers\StaticPagesController::class);
    Route::resource('/referrals', App\Http\Controllers\ReferralsController::class);
    Route::resource('/scripts', App\Http\Controllers\ScriptController::class);
    Route::resource('/blogs', App\Http\Controllers\BlogController::class);
    Route::resource('/categories', App\Http\Controllers\CategoriesController::class);
    Route::resource('/gallery', App\Http\Controllers\GalleryController::class);
    Route::resource('/testimonials', App\Http\Controllers\TestimonialsController::class);
    Route::resource('/jobs', App\Http\Controllers\JobController::class);
    Route::resource('/subscribers', App\Http\Controllers\SubscriberController::class);
    Route::resource('/applicants', App\Http\Controllers\ApplicantsController::class);
    Route::post('/file', [App\Http\Controllers\CategoriesController::class, 'storeFile'])->name('file.store');
    Route::post('/file-product', [App\Http\Controllers\ProductsController::class, 'storeFile'])->name('file-product.store');
    Route::resource('/products', App\Http\Controllers\ProductsController::class);
    Route::post('/gallery/frontpage/{id}', [App\Http\Controllers\GalleryController::class, 'frontpage'])->name('gallery.frontpage');
    Route::get('/categories/{id}/add-gallery',[App\Http\Controllers\CategoriesController::class, 'addGallery'])->name('categories.add-gallery');
    Route::get('/categories/{id}/add-file',[App\Http\Controllers\CategoriesController::class, 'addFile'])->name('categories.add-file');
    Route::get('/categories/{id}/qa',[App\Http\Controllers\CategoriesController::class, 'qa'])->name('categories.qa');
    Route::post('/categories/{id}/qa',[App\Http\Controllers\CategoriesController::class, 'qaStore'])->name('qa.store');
    Route::delete('/qa/{id}',[App\Http\Controllers\CategoriesController::class, 'qaDelete'])->name('qa.destroy');
    Route::get('/qa/{id}/edit',[App\Http\Controllers\CategoriesController::class, 'qaEdit'])->name('qa.edit');
    Route::post('/qa/{id}',[App\Http\Controllers\CategoriesController::class, 'qaUpdate'])->name('qa.update');
    Route::get('/product/{id}/file',[App\Http\Controllers\ProductsController::class, 'addFile'])->name('product.add-file');
    Route::get('/sliders/{id}/product',[App\Http\Controllers\SlidersController::class, 'create'])->name('product.sliders');
    Route::post('/sliders/frontpage/{id}', [App\Http\Controllers\SlidersController::class, 'frontpage'])->name('sliders.frontpage');
    Route::resource('/sliders', App\Http\Controllers\SlidersController::class);
    Route::get('/sitemap', [App\Http\Controllers\HomeController::class, 'sitemap'])->name('sitemap');
});


Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')->name('ckfinder_connector')->middleware('ckfinder');
Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')->name('ckfinder_browser')->middleware('ckfinder');

Route::middleware(['web'])->group(function () {
    Route::get('/', [App\Http\Controllers\FrontEndController::class, 'index'])->name('index');
    Route::get('/blog', [App\Http\Controllers\FrontEndController::class, 'blogs'])->name('blogs');
    Route::get('/blog/search', [App\Http\Controllers\FrontEndController::class, 'searchBlog'])->name('blog.search');
    Route::post('/blog/search', [App\Http\Controllers\FrontEndController::class, 'searchedBlogs'])->name('blogs.search');
    Route::get('/all/search', [App\Http\Controllers\FrontEndController::class, 'allSearch'])->name('all.search');
    Route::post('/all/search', [App\Http\Controllers\FrontEndController::class, 'allSearched'])->name('all.searched');
    Route::get('/blog/{slug}', [App\Http\Controllers\FrontEndController::class, 'blog'])->name('blog');
    Route::get('/services', [App\Http\Controllers\FrontEndController::class, 'categories'])->name('categories');
    Route::get('/service/{slug}', [App\Http\Controllers\FrontEndController::class, 'category'])->name('category');
    Route::get('/referral/{slug}', [App\Http\Controllers\FrontEndController::class, 'referral'])->name('referral');
    Route::get('/product/{slug}', [App\Http\Controllers\FrontEndController::class, 'product'])->name('product');
    Route::get('/contact', [App\Http\Controllers\FrontEndController::class, 'contact'])->name('contact');
    Route::post('/contact', [App\Http\Controllers\FrontEndController::class, 'contactForm'])->name('contact.form');
    Route::post('/application', [App\Http\Controllers\FrontEndController::class, 'applicationForm'])->name('application.form');
    Route::get('/application', [App\Http\Controllers\FrontEndController::class, 'application'])->name('application');
    Route::get('/application/{job}', [App\Http\Controllers\FrontEndController::class, 'jobApplicationForm'])->name('job.application.form');
    Route::post('/application/{job}', [App\Http\Controllers\FrontEndController::class, 'jobApplication'])->name('job.application');
    Route::get('/jobs', [App\Http\Controllers\FrontEndController::class, 'jobs'])->name('jobs');
    Route::post('/subscribe', [App\Http\Controllers\FrontEndController::class, 'subscribe'])->name('subscribe');
    Route::get('/{slug}', [App\Http\Controllers\FrontEndController::class, 'staticPages'])->name('static.pages');

});

