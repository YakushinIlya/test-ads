<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\Category;
use App\Model\Region;
use App\Model\City;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'content' => view('front.profile', ['user' => Auth::user()]),
        ];
        return view('profile', $data);
    }

    public function edit()
    {
        $data = [
            'content' => view('front.profile', ['user' => Auth::user()]),
        ];
        return view('profile', $data);
    }

    public function myAds()
    {
        $data = [
            'content' => view('front.profile', ['user' => Auth::user()]),
        ];
        return view('profile', $data);
    }
}
