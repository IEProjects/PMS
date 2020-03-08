jQuery(document).ready(function($) {
    ////----- Open the modal to CREATE a task -----////

    jQuery('body').on('click', '.btn-add', function() {

        var metric_id = $(this).val();
        jQuery('#btn-save').val("add");
        jQuery('#btn-save').text("Add");
        jQuery('#modalFormData').trigger("reset");
        jQuery('#linkEditorModal').modal('show');
        jQuery('#linkEditorModalLabel').text("Add Task");
        jQuery('#task_id').val(metric_id);

    });


    ////----- Open the modal to UPDATE a task -----////
    jQuery('body').on('click', '.open-modal', function() {
        var task_id = $(this).val();
        console.log(task_id);
        jQuery('#linkEditorModal').modal('show');

        $.get('task/' + task_id, function(data) {
            jQuery('#task_id').val(data.id);
            jQuery('#taskname').val(data.taskname);
            jQuery('#btn-save').val("update");
            jQuery('#btn-save').text("Edit");
            jQuery('#linkEditorModalLabel').text("Edit Task");

        })
    });
    jQuery('body').on('click', '.delete-task', function() {
        var task_id = $(this).val();
        jQuery('#taskdeletemodal').modal('show');

        $.get('task/' + task_id, function(data) {

            jQuery('#deletelabel').text("Are you sure you want to delete: " + data.taskname + "?");
            jQuery('#btn-delete').val(data.id);


        })
    });
    // Clicking the save button on the open modal for both CREATE and UPDATE
    $("#btn-save").click(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }
        });
        e.preventDefault();
        var formData = {
            taskname: jQuery('#taskname').val(),
            metricid: jQuery('#task_id').val()
        };
        console.log(jQuery('#currentcounter').text())
        var state = jQuery('#btn-save').val();



        var type = "POST";
        var task_id = jQuery('#task_id').val();
        var ajaxurl = 'tasks';
        if (state == "update") {
            count = jQuery('#currentcounter').val();
            type = "PUT";
            ajaxurl = 'tasks/' + task_id;
        }

        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function(data) {

                var task = '<div class="row" id=task' + data.id + '><div class="col-sm-9"><p>' + data.taskname + '</p></div><div class="col-sm-3"><button title="Edit" class="text-info open-modal" id="popuptask_id" value=' + data.id + '> <i class=" glyphicon glyphicon-edit open-modal"></i></button>';
                task += ' <button  title="Delete" class="text-danger delete-task" value=' + data.id + '> <i class="glyphicon glyphicon-trash delete-task"></i></button></div></div>';

                if (state == "add") {
                    jQuery('#tasks-list' + task_id).append(task);
                } else {
                    $("#task" + task_id).replaceWith(task);
                }
                jQuery('#modalFormData').trigger("reset");
                jQuery('#linkEditorModal').modal('hide')
            },
            error: function(data) {
                console.log('Error:', data.responseText);
            }
        });
    });
    jQuery('#btn-delete').click(function() {
        var task_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: 'tasks/' + task_id,
            success: function(data) {
                console.log(data);
                $("#task" + task_id).remove();
                jQuery('#taskdeletemodal').modal('hide')
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    });


    // jQuery('body').on('click', '.metric-btn', function() {
    //     var metric_id = $(this).val();
    //     var radio = "";
    //     $(".prioritylabel").text("Set priority to key result");
    //     $(".metric-btn").not(this).css("background-color", "");
    //     $(this).css("background-color", "#eee");
    //     $(".task-btn").css("background-color", "");
    //     $('#pr_id').val("m" + metric_id);


    //     $.get('/metric/' + metric_id, function(data) {

    //         if (data.metric_severity == 1) {
    //             radio = '<input type="radio" id="priority1" name="priority" value="high"><label for="priority1">High</label><br><input type="radio" id="priority2" name="priority" value="medium">';
    //             radio += '<label for="priority2">Medium</label><br><input type="radio" id="priority3" name="priority" value="low" checked="checked"><label for="priority3" >Low</label>';
    //             $("#priority-list-body").html(radio);
    //         } else if (data.metric_severity == 2) {
    //             radio = '<input type="radio" id="priority1" name="priority" value="high"><label for="priority1">High</label><br><input type="radio" id="priority2" name="priority" value="medium" checked="checked">';
    //             radio += '<label for="priority2">Medium</label><br><input type="radio" id="priority3" name="priority" value="low" ><label for="priority3" >Low</label>';
    //             $("#priority-list-body").html(radio);
    //         } else if (data.metric_severity == 3) {
    //             radio = '<input type="radio" id="priority1" name="priority" value="high"  checked="checked"><label for="priority1">High</label><br><input type="radio" id="priority2" name="priority" value="medium">';
    //             radio += '<label for="priority2">Medium</label><br><input type="radio" id="priority3" name="priority" value="low" ><label for="priority3" >Low</label>';
    //             $("#priority-list-body").html(radio);
    //         }
    //         $('#message').text("");
    //         $('.proritypanel').show();





    //     })
    // });
    // jQuery('body').on('click', '.task-btn', function() {
    //     var task_id = $(this).val();
    //     var radio = "";
    //     $(".prioritylabel").text("Set priority to task");
    //     $(".metric-btn").css("background-color", "");
    //     $(".task-btn").not(this).css("background-color", "");
    //     $(this).css("background-color", "#eee");
    //     var color = $(this).css("background-color");

    //     $('#pr_id').val("t" + task_id);
    //     console.log($('#pr_id').val());





    //     $.get('/task/' + task_id, function(data) {

    //         if (data.task_severity == 1) {
    //             radio = '<input type="radio" id="priority1" name="priority" value="high"><label for="priority1">High</label><br><input type="radio" id="priority2" name="priority" value="medium">';
    //             radio += '<label for="priority2">Medium</label><br><input type="radio" id="priority3" name="priority" value="low" checked="checked"><label for="priority3" >Low</label>';
    //             $("#priority-list-body").html(radio);
    //         } else if (data.task_severity == 2) {
    //             radio = '<input type="radio" id="priority1" name="priority" value="high"><label for="priority1">High</label><br><input type="radio" id="priority2" name="priority" value="medium" checked="checked">';
    //             radio += '<label for="priority2">Medium</label><br><input type="radio" id="priority3" name="priority" value="low" ><label for="priority3" >Low</label>';
    //             $("#priority-list-body").html(radio);
    //         } else if (data.task_severity == 3) {
    //             radio = '<input type="radio" id="priority1" name="priority" value="high"  checked="checked"><label for="priority1">High</label><br><input type="radio" id="priority2" name="priority" value="medium">';
    //             radio += '<label for="priority2">Medium</label><br><input type="radio" id="priority3" name="priority" value="low" ><label for="priority3" >Low</label>';
    //             $("#priority-list-body").html(radio);
    //         }
    //         $('#message').text("");
    //         $('.proritypanel').show();




    //     })
    // });

    // jQuery('body').on('change', "input:radio[name='priority']", function() {
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //     var value = $("#pr_id").val();
    //     console.log(value);
    //     console.log("value");
    //     var severity = 1;

    //     if ($(this).is(':checked') && $(this).val() == 'high') {
    //         severity = 3;

    //     } else if ($(this).is(':checked') && $(this).val() == 'medium') {
    //         severity = 2;
    //     }
    //     var formData = {
    //         severity_v: severity

    //     };

    //     var ajaxurl = "/plan"
    //     if (value[0] == 'm') {
    //         ajaxurl = "/update-metric-severity/" + value.replace('m', '');
    //     } else if (value[0] == 't') {
    //         ajaxurl = "/update-task-severity/" + value.replace('t', '');
    //     }
    //     $.ajax({
    //         type: 'PUT',
    //         url: ajaxurl,
    //         data: formData,
    //         dataType: 'json',
    //         success: function(data) {
    //             $('#message').removeClass('text-danger');
    //             $('#message').addClass('text-success');
    //             $('#message').text = "Priority updated successfully";

    //         },
    //         error: function(data) {
    //             $('#message').addClass('text-danger');
    //             $('#message').removeClass('text-success');
    //             $('#message').text = "Error updating priority"
    //             console.log('Error:', data.responseText);
    //         }
    //     });
    // });
    jQuery('body').on('click', '.add-to-plan', function() {
        var task_id = $(this).val();
        console.log(task_id);
        $.get('plan-task/' + task_id, function(data) {
            element = '<div class="row"><div class="col-md-9"><p id=metric' + data[0].metricid + '><b>' + data[0].name + ' ' + '(20%)</b></p></div><div class="col-md-1 mt-1"><span><i class="text-danger glyphicon glyphicon-minus-sign"></i></span></div></div>';
            element += '<div><div class="row col-lg-11 col-md-push-1"><div class="col-md-9"><p id = task' + data[0].id + '> ' + data[0].taskname + '(4%) </p></div >';
            element += '<div class="col-md-1 "><span><i class="text-danger glyphicon glyphicon-minus-sign"></i></span></div></div></div>';
            $('#weeklyplan').append(element);
            $('#add-to-plan' + task_id).attr('disabled', 'disabled')
        })
    });
    $(".checkedAll").change(function() {
        var id = $(this).val();
        if (this.checked) {
            $(".checkSingle" + id).each(function() {
                this.checked = true;
            });
        } else {
            $(".checkSingle" + id).each(function() {
                this.checked = false;
            });
        }
    });
    $("#addplan").click(function(e) {
        var $boxes = $('input[name=checkAll]:checked');

        $boxes.each(function() {
            var id = $(this).val();
            var task_severity = $('#priority' + id).val();
            var metric_severity = 1;
            $.get('task/' + id, function(data) {
                console.log(data.metricid)

                metric_severity = $('#metricpriority' + data.metricid).val();


            })
        });
    });


});