<?php

namespace App\Console\Commands;

use App\Models\Blog;
use App\Models\Categories;
use App\Models\Job;
use App\Models\StaticPages;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
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
