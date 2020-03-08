<?php

namespace App\Http\Controllers;
use DB;
use App\Metric;

use Illuminate\Http\Request;

class MetricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // SELECT * FROM metrics left join tasks on metrics.id = tasks.metricid where userid = 1
        $db = Metric::where("metricgtmhubid", '1234567')->orderby('metrics.updated_at', 'desc')-> join('tasks', 'metrics.id', '=', 'tasks.metricid')->get();
        $metric = Metric:: where("metricgtmhubid", '1234567')->get();
        return view('welcome', ['db' => $db, 'metric' => $metric]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $db = Metric::where("metricgtmhubid", '1234567')->get();
        return view('tasks.index', ['metric' => $db]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
