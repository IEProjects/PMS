
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

            <div >
                <div >
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h2 class="text-info" ><i class="glyphicon glyphicon-list-alt"></i> Key Results</h2>
                        </div>
                        <div class="panel-body">
                            <div  class="col-lg-12" >
                                <div class="panel panel-info">
                                    <div class="panel-body">

                                        <div >
                                            @foreach($metric as $m)
                                            <div class="panel task-panel childClass">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="task" data-toggle="collapse" data-parent="#accordion" href="#{{$m->id}}" >
                                                        {{$m->name}}

                                                            <span  class="pull-right"><i class="glyphicon glyphicon-chevron-down"></i></span>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="{{$m->id}}" class="panel-collapse collapse">
                                                    <div class="panel-body " >
                                                       <div id="tasks-list{{$m->id}}">
                                                        @foreach($db as $task)
                                                        @if($task->metricid == $m->id)

                                                            <div class="row" id="task{{$task->id}}">
                                                              <div class="col-sm-9">
                                                                <p >{{$task->taskname}}</p>
                                                              </div>
                                                              <div class="col-sm-3">
                                                                <button  title="Edit" class="text-info open-modal" id="popuptask_id" value={{$task->id}} > <i class=" glyphicon glyphicon-edit open-modal"></i></button>
                                                                <button  title="Delete" class="text-danger delete-task" value={{$task->id}}> <i class="glyphicon glyphicon-trash delete-task"></i></button>

                                                            </div>
                                                            </div>


                                                        @endif
                                                        @endforeach
                                                        </div>
                                                        <div class="panel-footer">
                                                        <a class ="" href="#" >
                                                            <button class="glyphicon glyphicon-plus btn-add" value={{$m->id}}></button>

                                                        </a>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                           @endforeach

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
</div>


<!--Modals-->
<div class="modal fade" id="linkEditorModal" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <div class="panel-heading text-center">
                    <h2 class="text-default" id="linkEditorModalLabel"></h2>

                </div>
            </div>
            <div class="modal-body">

                <div class="panel-body">
                    <div class="col-lg-12">
                        <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">
                        <div class="form-group">
                            <input class="form-control" type="text"  value=""  id="taskname" placeholder="Task name">

                        </div>
                    </form>


                    </div>
                </div>
            </div>
            <div class="modal-footer">


                <div class="panel-footer">
                    <button id="btn-save" type="button" class="btn btn-primary"> </button>
                    <input type="hidden" id="task_id" name="task_id" value="0">
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="modal fade" id="taskdeletemodal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="taskdelete">Delete Task</h4>
    </div>
    <div class="modal-body">
        <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">

            <div class="form-group mt-3">
                <label for="inputLink" class=" control-label" id="deletelabel"></label>

            </div>


        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="btn-delete" value="">Delete
        </button>
        <input type="hidden" id="task_id" name="task_id" value="0">
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
