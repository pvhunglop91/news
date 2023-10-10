<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use App\Models\TypeOfNews;
use App\Models\VideoNews;
use App\Services\CustomAuthService;
use App\Services\NewsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CustomAuthController extends Controller
{
    protected $customAuthSevice;

    protected $newsService;

    public function __construct(CustomAuthService $customAuthService, NewsService $newsService)
    {
        $this->customAuthSevice = $customAuthService;
        $this->newsService = $newsService;
    }

    public function index()
    {
        return view('Admin.auth.login');
    }

    public function dashboard(Request $request)
    {
        $userCount = User::count();
        $categoryCount = Category::count();
        $typeOfNewsCount = TypeOfNews::count();
        $newsCount = News::count();
        $commentCount = Comment::count();
        $videoNewsCount = VideoNews::count();
        $dataSearch = $request->start;
        $search = $this->newsService->searchNewsViewHigh($request);
        $userCountByMonth = User::where('created_at', 'like', '%' . $dataSearch . '%')->get()->count();
        $categoryCountByMonth = Category::where('created_at', 'like', '%' . $dataSearch . '%')->get()->count();
        $typeOfNewsCountByMonth = TypeOfNews::where('created_at', 'like', '%' . $dataSearch . '%')->get()->count();
        $newsCountByMonth = News::where('created_at', 'like', '%' . $dataSearch . '%')->get()->count();
        $commentCountByMonth = Comment::where('created_at', 'like', '%' . $dataSearch . '%')->get()->count();
        $videoNewsCountByMonth = VideoNews::where('created_at', 'like', '%' . $dataSearch . '%')->get()->count();

        if(Auth::check()){
            $data = [
                'user'=>$userCountByMonth,
                'category'=>$categoryCountByMonth,
                'type'=>$typeOfNewsCountByMonth,
                'new'=>$newsCountByMonth,
                'comment'=>$commentCountByMonth,
                'video'=>$videoNewsCountByMonth
            ];

            return view('Admin.layouts.dashboard',
                compact('data',
                    'userCount',
                'categoryCount',
                'typeOfNewsCount',
                'newsCount',
                'commentCount',
                'videoNewsCount', 'search',
                'dataSearch'));
        }


        return redirect()->route('login')->with('message','You are not allowed to access');
    }

    public function customLogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/dashboard')
                ->with('success','Signed in');
        }
        return redirect()->route('login')->with('error','Login details are not valid');
    }

    public function registration()
    {
        return view('Admin.auth.register');
    }

    public function customRegistration(RegisterRequest $request)
    {

        $data = $request->all();
        $this->customAuthSevice->create($data);
        return redirect()->route('dashboard')->with('message','You have signed-in');
    }

    public function signOut()
    {
        Auth::logout();
        return redirect('/admin/login');
    }

    /** Authenticated with Homepage */

    public function getLogin()
    {
        return view('pages.login');
    }

    public function postLogin(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('homepage');
        } else {
            return redirect('login')->with('error', 'Login details are not valid');
        }
    }

    public function getRegistration()
    {
        return view('pages.registration');
    }

    public function postRegistration(RegisterRequest $request)
    {
        $data = $request->all();
        $this->customAuthSevice->create($data);
        return redirect('login')->with('message', 'Registration success');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('homepage');
    }
}
