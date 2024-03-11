<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Analytics\AnalyticsFacade as Analytics;
use Spatie\Analytics\Period;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    // $exitCode = \Artisan::call('config:cache');
    // $exitCode = \Artisan::call('cache:clear');
    // $exitCode = \Artisan::call('view:cache');
    // $exitCode = \Artisan::call('view:clear');

        return view('home');

    }
}
