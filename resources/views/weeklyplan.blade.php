@extends('layouts.app')
@section('style')
<style media="screen">
[v-cloak]{
    display: none;
}
</style>
@endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div>
                <div >
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h2 class="text-info" ><i class="glyphicon glyphicon-list-alt"></i> Add Weekly Plan</h2>
                        </div>
                        <div class="panel-body">
                            <div  class="col-lg-8" >
                                <div class="panel panel-info">
                                    <div class="panel-body">

                                        <div >

                                            <div class="panel task-panel childClass">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                       <b> Key Results</b>

                                                    </h4>
                                                </div>

                                                    <div class="panel-body ">



                                                                @foreach($metric as $m)
                                                                <div>
                                                                    <button class="cbtn default metric-btn" value = {{$m->id}} style="color: blue">{{$m->name}}</button>
                                                                    <a class="task pull-right" data-toggle="collapse" data-parent="#accordion" href="#{{$m->id}}" >


                                                                            <span  class="pull-right"><i class="glyphicon glyphicon-chevron-down"></i></span>
                                                                        </a>
                                                                </div>
                                                                <div id="{{$m->id}}" class="panel-collapse collapse">
                                                                    <div class="panel-body " >
                                                                    <input type="checkbox" class="custom-control-input checkedAll" name="checkedAll" id="checkedAll" value={{$m->id}} >
                                                                       <div id="tasks-list{{$m->id}}">
                                                                        @foreach($db as $task)
                                                                        @if($task->metricid == $m->id)


                                                                                    <table style="border-collapse: collapse; border: none;">

                                                                                      <tbody>
                                                                                        <tr style="border: none;">
                                                                                          <td style="border: none;">
                                                                                            <div class="custom-control custom-checkbox">
                                                                                            <input type="checkbox" id="customCheck{{$task->id}}" name="checkAll" class="custom-control-input checkSingle{{$m->id}} checkSingle" >
                                                                                                <label class="custom-control-label" for="customCheck{{$task->id}}"></label>
                                                                                            </div>
                                                                                          </td>
                                                                                          <td style="border: none;"> <button class="cbtn default task-btn" value = {{$task->id}}>{{$task->taskname}}</button></td>

                                                                                        </tr>


                                                                                      </tbody>
                                                                                    </table>


                                                                        @endif
                                                                        @endforeach
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                                @endforeach

                                                    </div>



                                                <!--/div-->

                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div  class="col-lg-3 proritypanel" hidden>
                                <div class="panel panel-info">
                                    <div class="panel-body">
                                        <div >
                                            <div class="panel task-panel childClass">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                       <b class="prioritylabel"> </b>
                                                    </h4>
                                                </div>
                                                <div class="panel-body" id = "priority-list-body">
                                                    <input type="radio" id="priority1" name="priority" value="high">
                                                    <label for="priority1">High</label>
                                                    <br><input type="radio" id="priority2" name="priority" value="medium">
                                                    <label for="priority2">Medium</label><br>
                                                    <input type="radio" id="priority3" name="priority" value="low" >
                                                    <label for="priority3" >Low</label>

                                                </div>
                                                <div>
                                                    <p id="message" class=""></p>
                                                </div>
                                                <input type="hidden" class ="pr_id" id="pr_id" name="pr_id" value="0">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="col-lg-9 col-md-push-1" style="margin-top: 8%">
                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <h4 class="text-success"><i class="glyphicon glyphicon-check"></i> Summary Weekly Plan</h4>
                                        <div>

                                        </div>
                                     <div>


                                        <div class="col-lg-10 col-md-push-1 " id="weeklyplan">



                                    </div>
                                    <button type="button" class="btn btn-warning btn-sm send-basecamp "style="float: right;" disabled>Send to basecamp <span class="glyphicon glyphicon-envelop"></span></button>

                                </div>
                            </div>
                        </div>
                    </div>


                        </div>
                    </div>
                </div>


                </div>
            </div>
        </div>
    </div>
</div>



@endsection
@section('script')

@if (session('message'))
<script>
toastr.success('{{session('message')}}');
</script>
@endif
@endsection
