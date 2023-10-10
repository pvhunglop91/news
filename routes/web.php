<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TypeOfNewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoNewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.homepage');
});

Route::get('admin/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('admin/custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
//Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
//Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('admin/signOut', [CustomAuthController::class, 'signOut'])->name('signOut');

Route::group(['prefix' => 'admin', 'middleware' => 'loginMiddleware'], function(){
    Route::get('layout/index', [CategoryController::class, 'getIndex'])->name('getIndex');
    Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard')
        ->middleware('check.permission:login');
    Route::post('dashboard', [CustomAuthController::class, 'dashboard'])->name('searchNews');

    Route::group(['prefix' => 'category', 'middleware'=> 'loginMiddleware'], function(){
        Route::get('/{category}/type_of_news', [TypeOfNewsController::class, 'getWithCategory']);

        Route::get('list', [CategoryController::class, 'getList'])->name('category.list')
            ->middleware('check.permission:category-list');
        Route::get('create', [CategoryController::class, 'create'])->name('category.create')
            ->middleware('check.permission:category-create');
        Route::post('store', [CategoryController::class, 'store'])->name('category.store')
            ->middleware('check.permission:category-create');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category.edit')
            ->middleware('check.permission:category-edit');
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('category.update')
            ->middleware('check.permission:category-edit');
        Route::get('delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete')
            ->middleware('check.permission:category-delete');
        Route::get('{name_url}', [CategoryController::class, 'getCategoryNews'])->name('categoryNews.list');

    });

    Route::group(['prefix' => 'type_of_news', 'middleware'=> 'loginMiddleware'], function(){
        Route::get('list', [TypeOfNewsController::class, 'getList'])->name('type_of_news.list')
            ->middleware('check.permission:type-of-news-list');
        Route::get('create', [TypeOfNewsController::class, 'create'])->name('type_of_news.create')
            ->middleware('check.permission:type-of-news-create');
        Route::post('store', [TypeOfNewsController::class, 'store'])->name('type_of_news.store')
            ->middleware('check.permission:type-of-news-create');
        Route::get('edit/{id}', [TypeOfNewsController::class, 'edit'])->name('type_of_news.edit')
            ->middleware('check.permission:type-of-news-edit');
        Route::post('update/{id}', [TypeOfNewsController::class, 'update'])->name('type_of_news.update')
            ->middleware('check.permission:type-of-news-edit');
        Route::get('delete/{id}', [TypeOfNewsController::class, 'destroy'])->name('type_of_news.delete')
            ->middleware('check.permission:type-of-news-delete');
    });

    Route::group(['prefix' => 'news', 'middleware'=> 'loginMiddleware'], function(){
        Route::get('list', [NewsController::class, 'getList'])->name('news.list')
            ->middleware('check.permission:news-list');
        Route::get('create', [NewsController::class, 'create'])->name('news.create')
            ->middleware('check.permission:news-create');
        Route::post('store', [NewsController::class, 'store'])->name('news.store')
            ->middleware('check.permission:news-create');
        Route::get('edit/{id}', [NewsController::class, 'edit'])->name('news.edit')
            ->middleware('check.permission:news-edit');
        Route::post('update/{id}', [NewsController::class, 'update'])->name('news.update')
            ->middleware('check.permission:news-edit');
        Route::delete('delete/{id}', [NewsController::class, 'destroy'])->name('news.delete')
            ->middleware('check.permission:news-delete');
    });

    Route::group(['prefix' => 'ajax'], function () {
        Route::get('typeOfNews/{id_category}', [AjaxController::class, 'getTypeOfNews']);
    });

    Route::group(['prefix' => 'role', 'middleware'=> 'loginMiddleware'], function(){
        Route::get('list', [RoleController::class, 'getList'])->name('role.list')
            ->middleware('check.permission:role-list');
        Route::get('create', [RoleController::class, 'create'])->name('role.create')
            ->middleware('check.permission:role-create');
        Route::post('store', [RoleController::class, 'store'])->name('role.store')
            ->middleware('check.permission:role-create');
        Route::get('edit/{id}', [RoleController::class, 'edit'])->name('role.edit')
            ->middleware('check.permission:role-edit');
        Route::post('update/{id}', [RoleController::class, 'update'])->name('role.update')
            ->middleware('check.permission:role-edit');
        Route::get('delete/{id}', [RoleController::class, 'destroy'])->name('role.delete')
            ->middleware('check.permission:role-delete');
    });

    Route::group(['prefix' => 'comment', 'middleware' => 'loginMiddleware'], function () {
        Route::get('delete/{id}/{id_news}', [CommentController::class, 'destroy'])->name('comment.delete');
    });

    Route::group(['prefix' => 'user', 'middleware'=> 'loginMiddleware'], function(){
        Route::get('list', [UserController::class, 'getList'])->name('user.list')
            ->middleware('check.permission:user-list');
        Route::get('create', [UserController::class, 'create'])->name('user.create')
            ->middleware('check.permission:user-create');
        Route::post('store', [UserController::class, 'store'])->name('user.store')
            ->middleware('check.permission:user-create');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit')
            ->middleware('check.permission:user-edit');
        Route::post('update/{id}', [UserController::class, 'update'])->name('user.update')
            ->middleware('check.permission:user-edit');
        Route::get('delete/{id}', [UserController::class, 'destroy'])->name('user.delete')
            ->middleware('check.permission:user-delete');
        Route::get('editmyself/{id}', [UserController::class, 'editMyself'])->name('user.edit.myself');
        Route::post('updatemyself/{id}', [UserController::class, 'updateMyself'])->name('user.update.myself');
    });

    Route::group(['prefix' => 'video-news', 'middleware'=> 'auth'], function(){
        Route::get('list', [VideoNewsController::class, 'getList'])->name('video-news.list')
            ->middleware('check.permission:video-news-list');
        Route::get('create', [VideoNewsController::class, 'create'])->name('video-news.create')
            ->middleware('check.permission:video-news-create');
        Route::post('store', [VideoNewsController::class, 'store'])->name('video-news.store')
            ->middleware('check.permission:video-news-create');
        Route::get('edit/{id}', [VideoNewsController::class, 'edit'])->name('video-news.edit')
            ->middleware('check.permission:video-news-edit');
        Route::post('update/{id}', [VideoNewsController::class, 'update'])->name('video-news.update')
            ->middleware('check.permission:video-news-edit');
        Route::get('delete/{id}', [VideoNewsController::class, 'destroy'])->name('video-news.delete')
            ->middleware('check.permission:video-news-delete');
    });
});
Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');

Route::get('homepage', [PagesController::class, 'homepage'])->name('homepage');
Route::get('contact', [PagesController::class, 'contact']);
Route::get('introduce', [PagesController::class, 'introduce']);

Route::get('category/{name_url}', [PagesController::class, 'category']);
Route::get('typeOfNews/{name_url}', [PagesController::class, 'typeOfNews']);
Route::get('news/{title_url}', [PagesController::class, 'news'])->name('news');

Route::get('login', [CustomAuthController::class, 'getLogin'])->name('loginHomepage');
Route::post('login', [CustomAuthController::class, 'postLogin'])->name('postLoginHomepage');

Route::get('logout', [CustomAuthController::class, 'getLogout']);

Route::get('user', [UserController::class, 'getUser'])->name('user.show');
Route::post('user/{id}', [UserController::class, 'postUser'])->name('user.last');

Route::get('registration', [CustomAuthController::class, 'getRegistration'])->name('registrationHomepage');
Route::post('registration', [CustomAuthController::class, 'postRegistration'])->name('postRegistration');

Route::post('comment/{id}', [CommentController::class, 'postComment']);

Route::get('search', [PagesController::class, 'search']);

Route::get('/',[PagesController::class, 'homepage1']);
Route::get('/{any}',[PagesController::class, 'homepage1']);
Route::get('/{any}/{title_url}',[PagesController::class, 'homepage1']);
Route::get('/{any}/{name_url}',[PagesController::class, 'homepage1']);
