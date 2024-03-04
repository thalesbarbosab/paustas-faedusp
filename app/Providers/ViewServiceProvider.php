<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use App\Services\Content\ContentService;

class ViewServiceProvider extends ServiceProvider
{
    protected ContentService $content_service;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->content_service = app(ContentService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerViewComposers();
    }

    private function registerViewComposers()
    {
        View::composer(
            [
                'components.web.layout',
                'components.web.footer',
                'components.web.intern-breadcrumbs',
                'web.index',
                'web.ruling',
            ],
            function ($view) {
            $content = $this->content_service->getBgData();
            $home_content = $this->content_service->getHomeData();
            return $view->with('content', $content)
                        ->with('home_content',$home_content)
            ;
        });

        View::composer([
            'components.web.social-media',
            'components.web.footer'
        ], function ($view) {
            $social_media_content = $this->content_service->getSocialMedias();
            return $view->with('social_media_content', $social_media_content);
        });
    }
}
