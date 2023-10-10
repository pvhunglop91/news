<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use App\Models\TypeOfNews;
use App\Models\VideoNews;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('permission', function ($permission) {
            // $user = Auth::user();
            $user = request()->user();
            return $user->hasPermission($permission)|| $user->hasRole('Admin');
            // return $user;
        });

        $category = Category::all();
        $news = News::all();

        $typeOfNews = TypeOfNews::all();
        $videoNews = VideoNews::all();
        $user = Auth::user();

        view()->share('category', $category);
        view()->share('user', $user);
        view()->share('news', $news);
        view()->share('typeOfNews', $typeOfNews);
        view()->share('videoNews', $videoNews);

        Paginator::useBootstrap();
    }
}
