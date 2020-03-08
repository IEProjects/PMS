<?php
use App\Task;
use App\Metric;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/plan', 'PlanController@index');

Route::get('/task/{task_id}', function ($task_id) {
    $task = Task::find($task_id);

    return $task;
});

Route::put('/tasks/{task_id}', function (Request $request, $task_id) {
    $task = Task::find($task_id);
    $task->taskname= $request->taskname;

    $task->save();
    return $task;
});
Route::put('/update-metric-severity/{metric_id}', function (Request $request, $metric_id) {
    $metric = Metric::find($metric_id);
    $metric->metric_severity= $request->severity_v;

    $metric->save();
    return $metric;
});
Route::put('/update-task-severity/{task_id}', function (Request $request, $task_id) {
    $task = Task::find($task_id);
    $task->task_severity= $request->severity_v;

    $task->save();
    return $task;
});
Route::post('/tasks', function (Request $request) {
    $task = new Task;

    $task->metricid = $request->metricid;
    $task->taskname = $request->taskname;
    $task->userid = 1;
    $task->save();
    return $task;
});
Route::delete('/tasks/{task_id?}', function ($task_id) {
    $task = Task::destroy($task_id);
    return $task;
});
 Route::get('/metric/{metric_id}',function ($metric_id) {
    $metric = Metric::find($metric_id);

    return $metric;
});
Route::get('/plan-task/{task_id}', function (Request $request, $task_id) {
    $task = Task::where('tasks.id', $task_id)->join('metrics', 'tasks.metricid', '=' ,'metrics.id')->get(array('tasks.*', 'metrics.name', 'metrics.metric_severity'));
    $request->session()->put('metrics.id', $task[0]->metricid );
    $request->session()->put('tasks.id', $task[0]->id );
    return $task;
});

// Route::post('/api/task','TaskController@add');
// Route::patch('/api/task/{id}','TaskController@update');
// Route::delete('/api/task/{id}','TaskController@destroy');
 Route::patch('/api/task-all/{status}','TaskController@updateAll');
// Route::delete('/api/task-all/{status}','TaskController@destroyAll');


// Route::delete('/task/{task}', function () {
// 		return view('');
//  });
