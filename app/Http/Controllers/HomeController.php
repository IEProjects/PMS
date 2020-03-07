<?php

namespace App\Http\Controllers;
use App\Metric;
use Illuminate\Http\Request;

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
        $db = Metric::where("metricgtmhubid", '1234567')->orderby('metrics.updated_at', 'desc')-> join('tasks', 'metrics.id', '=', 'tasks.metricid')->get();
        $metric = Metric:: where("metricgtmhubid", '1234567')->get();
        return view('home', ['db' => $db, 'metric' => $metric]);
    }
}
