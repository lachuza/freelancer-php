<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/1.3.3/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/0.4.5/sweetalert2.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/sweetalert2/1.3.3/sweetalert2.min.js"></script>
<style>
  .form-horizontal .form-group {
      margin-right: 0;
      margin-left: 0;
  }
</style>
<div class="row">
    <a class="ayam btn btn-success" href="assessment/form/<?php echo $flag;?>"><i class="glyphicon glyphicon-mius"></i> Back</a>
    <button class="btn btn-success" onclick="add_item()"><i class="glyphicon glyphicon-plus"></i> Add New Assessment</button>
    <br />
    <br />
    <div>&nbsp;&nbsp;&nbsp;<?php echo $course_name ?></div>
    <br />
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>

                <th>Assessment Name</th>
<!--                <th>Course Schedule</th>-->
<!--                <th>Course Prescription</th>-->
                <th style="width:250px;">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
</div>
<script type="text/javascript">
    $('#course_schedule').on('change', function () {
        alert(thisImage);
        var reader = new FileReader();
        reader.onload = function () {
            var thisImage = reader.result;
            alert(thisImage);
        };
        reader.readAsDataURL(this.files[0]);
    });

    var save_method;
    var table;
    $(document).ready(function() {
        table = $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('assessment/getlist')?>/" + "<?php echo $course_id?>",
                "type": "POST"
            },

            "columnDefs": [{
                "targets": [-1],
                "orderable": false,
            }, ],

        });
    });

    function add_item() {
        save_method = 'add';
        $('#form')[0].reset();

        $('[name="id"]').val('');  
        $('[name="pre-id"]').val('');
        $('[name="post-id"]').val('');
        $('[name="submission_due_date"]').val('');
        $('[name="assessment_release_date"]').val('');
        $('[name="course_description"]').val('');
                
        //$('[name="post_reminder_day"]').val('');        
        //$('[name="pre_reminder_day"]').val('');
        $('[name="assessment_description_down"]').html(''); 
        $('[name="marking_criteria_down"]').html(''); 
        $('[name="exam_solution_down"]').html('');
        $('[name="pre_event_file_down"]').html('');
        $('[name="post_event_file_down"]').html(''); 
        $('[name="student_sample_high_down"]').html(''); 
        $('[name="student_sample_low_down"]').html(''); 
        $('[name="student_sample_medium_down"]').html(''); 
        $('#post_Uploaded').attr('checked',false);
        $('#post_Reviewed').attr("checked",false);
        $('#post_Completed').attr("checked",false);
        $('#pre_Uploaded').attr('checked',false);
        $('#pre_Reviewed').attr("checked",false);
        $('#pre_Completed').attr("checked",false);       
        $('#modal_form').modal('show');
        $('.modal-title').text('Add New Form');
    }

    function edit_item(id) {
        $('#post_Uploaded').attr('checked',false);
        $('#post_Reviewed').attr("checked",false);
        $('#post_Completed').attr("checked",false);
        $('#pre_Uploaded').attr('checked',false);
        $('#pre_Reviewed').attr("checked",false);
        $('#pre_Completed').attr("checked",false); 
        save_method = 'update';
        $('#form')[0].reset();

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('assessment/edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                //setting
                $('[name="id"]').val(data.id);

                $('[name="pre-id"]').val(data.id);
                $('[name="post-id"]').val(data.id);
                $('[name="course_name"]').val(data.course_name);
                $('[name="submission_due_date"]').val(data.submission_due_date);
                $('[name="assessment_release_date"]').val(data.assessment_release_date);
                $('[name="year"]').val(data.year);
                $('[name="course_description"]').val(data.course_description);
                $('[name="semester"]').val(data.semester);
                $('[name="post_reminder"]').val(data.post_reminder);
                $('[name="post_reminder_day"]').val(data.post_reminder_day);
                $('[name="pre_reminder"]').val(data.pre_reminder);
                $('[name="pre_reminder_day"]').val(data.pre_reminder_day);


                $('[name="qustion_4"]').val(data.qustion_4);
                $('[name="qustion_5"]').val(data.qustion_5);
                $('[name="qustion_6"]').val(data.qustion_6);
                $('[name="qustion_7"]').val(data.qustion_7);
                $('[name="qustion_8"]').val(data.qustion_8);
                $('[name="qustion_9"]').val(data.qustion_9);
                $('[name="qustion_10"]').val(data.qustion_10);
                $('[name="qustion_11"]').val(data.qustion_11);
                $('[name="qustion_12"]').val(data.qustion_12);
                $('[name="qustion_13"]').val(data.qustion_13);
                $('[name="qustion_14"]').val(data.qustion_14);
                $('[name="qustion_15"]').val(data.qustion_15);
                
                $('[name="post_5"]').val(data.post_5);
                $('[name="post_6"]').val(data.post_6);
                $('[name="post_7"]').val(data.post_7);
                $('[name="post_8"]').val(data.post_8);
                $('[name="post_9"]').val(data.post_9);
                $('[name="post_10"]').val(data.post_10);
                
                //set description and comments
                if(data.assessment_description) {
                    var tmp = '<table class="table table-striped table-bordered" width=100% cellpadding=0><tr><td>FileName</td><td>Version</td><td>User</td><td>Action</td></tr>';
                    for(i in data.assessment_description)
                    {
                        tmp = tmp + "<tr id='table_"+data.assessment_description[i]['id']+"'><td>";
                        tmp = tmp + '<a href="<?php echo site_url('assessment/download_file')?>/' + data.assessment_description[i]['id']+'">' + data.assessment_description[i]['origin_name']+ '</a> ';
                        tmp = tmp + "</td><td>" + parseInt(i+1)+ "</td><td>" + data.assessment_description[i]['username'] +"<td><a href='javascript:ondelete("+data.assessment_description[i]['id']+")'>Delete</a></td></tr>";
                    }
                    tmp = tmp + "</table>"
                    $('[name="assessment_description_down"]').html(tmp); 
                }
                if(data.marking_criteria) {
                    var tmp = '<table class="table table-striped table-bordered" width=100% cellpadding=0><tr><td>FileName</td><td>Version</td><td>User</td><td>Action</td></tr>';
                    for(i in data.marking_criteria)
                    {
                        tmp = tmp + "<tr id='table_"+data.marking_criteria[i]['id']+"'><td>";
                        tmp = tmp + '<a href="<?php echo site_url('assessment/download_file')?>/' + data.marking_criteria[i]['id']+'">' + data.marking_criteria[i]['origin_name']+ '</a> ';
                        tmp = tmp + "</td><td>" + parseInt(i+1)+ "</td><td>" + data.marking_criteria[i]['username'] +"<td><a href='javascript:ondelete("+data.marking_criteria[i]['id']+")'>Delete</a></td></tr>";
                    }
                    tmp = tmp + "</table>"
                    $('[name="marking_criteria_down"]').html(tmp); 
                }
                if(data.exam_solution) {
                    var tmp = '<table class="table table-striped table-bordered" width=100% cellpadding=0><tr><td>FileName</td><td>Version</td><td>User</td><td>Action</td></tr>';
                    for(i in data.exam_solution)
                    {
                        tmp = tmp + "<tr id='table_"+data.exam_solution[i]['id']+"'><td>";
                        tmp = tmp + '<a href="<?php echo site_url('assessment/download_file')?>/' + data.exam_solution[i]['id']+'">' + data.exam_solution[i]['origin_name']+ '</a> ';
                        tmp = tmp + "</td><td>" + parseInt(i+1)+ "</td><td>" + data.exam_solution[i]['username'] +"<td><a href='javascript:ondelete("+data.exam_solution[i]['id']+")'>Delete</a></td></tr>";
                    }
                    tmp = tmp + "</table>"
                    $('[name="exam_solution_down"]').html(tmp); 
                }
                if(data.pre_event_file) {
                    var tmp = '<table class="table table-striped table-bordered" width=100% cellpadding=0><tr><td>FileName</td><td>Version</td><td>Comment</td><td>User</td><td>Action</td></tr>';
                    for(i in data.pre_event_file)
                    {
                        tmp = tmp + "<tr id='table_"+data.pre_event_file[i]['id']+"'><td>";
                        tmp = tmp + '<a href="<?php echo site_url('assessment/download_file')?>/' + data.pre_event_file[i]['id']+'">' + data.pre_event_file[i]['origin_name']+ '</a> ';                        
                        tmp = tmp + "</td><td>" + parseInt(i+1)+ "</td><td>" + data.pre_event_file[i]['comment']+"</td><td>" + data.pre_event_file[i]['username'] +"<td><a href='javascript:ondelete("+data.pre_event_file[i]['id']+")'>Delete</a></td></tr>";
                    }
                    tmp = tmp + "</table>"
                    $('[name="pre_event_file_down"]').html(tmp); 
                }
                if(data.post_event_file) {
                    var tmp = '<table class="table table-striped table-bordered" width=100% cellpadding=0><tr><td>FileName</td><td>Version</td><td>Comment</td><td>User</td><td>Action</td></tr>';
                    for(i in data.post_event_file)
                    {
                        tmp = tmp + "<tr id='table_"+data.post_event_file[i]['id']+"'><td>";
                        tmp = tmp + '<a href="<?php echo site_url('assessment/download_file')?>/' + data.post_event_file[i]['id']+'">' + data.post_event_file[i]['origin_name']+ '</a> ';
                        tmp = tmp + "</td><td>" + parseInt(i+1)+ "</td><td>" + data.post_event_file[i]['comment']+"</td><td>" + data.post_event_file[i]['username'] +"<td><a href='javascript:ondelete("+data.post_event_file[i]['id']+")'>Delete</a></td></tr>";                        
                    }
                    tmp = tmp + "</table>"
                    $('[name="post_event_file_down"]').html(tmp); 
                }
                if(data.student_sample_high) {
                    var tmp = '<table class="table table-striped table-bordered" width=100% cellpadding=0><tr><td>FileName</td><td>Version</td><td>User</td><td>Action</td></tr>';
                    for(i in data.student_sample_high)
                    {
                        tmp = tmp + "<tr id='table_"+data.student_sample_high[i]['id']+"'><td>";
                        tmp = tmp + '<a href="<?php echo site_url('assessment/download_file')?>/' + data.student_sample_high[i]['id']+'">' + data.student_sample_high[i]['origin_name']+ '</a> ';                        
                        tmp = tmp + "</td><td>" + parseInt(i+1)+ "</td><td>" + data.student_sample_high[i]['username'] +"<td><a href='javascript:ondelete("+data.student_sample_high[i]['id']+")'>Delete</a></td></tr>";
                    }
                    tmp = tmp + "</table>"
                    $('[name="student_sample_high_down"]').html(tmp); 
                }
                if(data.student_sample_low) {
                    var tmp = '<table class="table table-striped table-bordered" width=100% cellpadding=0><tr><td>FileName</td><td>Version</td><td>User</td><td>Action</td></tr>';
                    for(i in data.student_sample_low)
                    {
                        tmp = tmp + "<tr id='table_"+data.student_sample_low[i]['id']+"'><td>";
                        tmp = tmp + '<a href="<?php echo site_url('assessment/download_file')?>/' + data.student_sample_low[i]['id']+'">' + data.student_sample_low[i]['origin_name']+ '</a> ';
                        tmp = tmp + "</td><td>" + parseInt(i+1)+ "</td><td>" + data.student_sample_low[i]['username'] +"<td><a href='javascript:ondelete("+data.student_sample_low[i]['id']+")'>Delete</a></td></tr>";
                    }
                    tmp = tmp + "</table>"
                    $('[name="student_sample_low_down"]').html(tmp); 
                }
                if(data.student_sample_medium) {
                    var tmp = '<table class="table table-striped table-bordered" width=100% cellpadding=0><tr><td>FileName</td><td>Version</td><td>User</td><td>Action</td></tr>';
                    for(i in data.student_sample_medium)
                    {
                        tmp = tmp + "<tr id='table_"+data.student_sample_medium[i]['id']+"'><td>";
                        tmp = tmp + '<a href="<?php echo site_url('assessment/download_file')?>/' + data.student_sample_medium[i]['id']+'">' + data.student_sample_medium[i]['origin_name']+ '</a> ';
                        tmp = tmp + "</td><td>" + parseInt(i+1)+ "</td><td>" + data.student_sample_medium[i]['username'] +"<td><a href='javascript:ondelete("+data.student_sample_medium[i]['id']+")'>Delete</a></td></tr>";
                    }
                    tmp = tmp + "</table>"
                    $('[name="student_sample_medium_down"]').html(tmp); 
                }

                if(data.post_event_status) {
                    data.post_event_status.forEach(function(element) {
                        
                        if(element == 'Uploaded') {
                            $('#post_Uploaded').attr('checked','true');
                            $('#post_Uploaded').attr("readonly",true);
                        }
                        if(element == 'Reviewed') {                            
                            $('#post_Reviewed').attr('checked','true');
                            $('#post_Reviewed').attr("readonly",true);
                        }
                        if(element == 'Completed') {
                            $('#post_Completed').attr('checked','true');
                            $('#post_Completed').attr("readonly",true);
                        }
                    });
                    }
                    if(data.pre_event_status) {
                    data.pre_event_status.forEach(function(element) {
                        if(element == 'Uploaded') {
                        $('#pre_Uploaded').attr('checked','true');
                        $('#pre_Uploaded').attr('readonly','true');
                        }
                        if(element == 'Reviewed') {
                        $('#pre_Reviewed').attr('checked','true');
                        $('#pre_Reviewed').attr('readonly','true');
                        }
                        if(element == 'Completed') {
                        $('#pre_Completed').attr('checked','true');
                        $('#pre_Completed').attr('readonly','true');
                        }
                    });
                }
                    
                $('#modal_form').modal('show');
                $('.modal-title').text('Edit Form');

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }    

    function pre_event() {
        var id = $('[name="pre-id"]')[0].value;
        if(!id) {
            alert("First Create the form!");
            //return;
        }
        $('#pre_event_modal_form').modal('show');
        $('.modal-title').text('Edit Form');
    }

    function post_event() {
        var id = $('[name="post-id"]')[0].value;
        if(!id) {
            alert("First Create the form!");
            return;
        }
        $('#post_event_modal_form').modal('show');
        $('.modal-title').text('Edit Form');
    }

    function reload_table() {
        table.ajax.reload(null, false);
    }

    function save() {
        var url;
        if (save_method == 'add') {
            url = "<?php echo site_url('assessment/add')?>";
        } else {
            url = "<?php echo site_url('assessment/update')?>";
        }
        var url;
        var form = $('#form');

        //pre event status check
        var count = 0;
        var checkedValue = null; 
        var inputElements = $('#pre_Uploaded');
        if(inputElements[0].checked){
            count = count + 1;
        }

        inputElements = $('#pre_Reviewed');
        if(inputElements[0].checked){
            count = count + 1;
        }

        inputElements = $('#pre_Completed');
        if(inputElements[0].checked){
            count = count + 1;
        }

        var ff = $('[name="pre_event_status_"]');
        if(ff[0].style.display == "block") {
            if(count > 1) {
                alert("Pre Event Status can only check one!")
                return;
            }

            /*if(count < 1) {
                alert("Please select the pre event status");
                return;
            }*/
        }

        if(count == 1) {
            var assess = $('[name="assessment_description_down"] table tr').length;
            var marking = $('[name="marking_criteria_down"] table tr').length;
            var exam = $('[name="exam_solution_down"] table tr').length;
            var pre = $('[name="pre_event_file_down"] table tr').length;
            var post = $('[name="post_event_file_down"] table tr').length;
            var high = $('[name="student_sample_high_down"] table tr').length;
            var low = $('[name="student_sample_low_down"] table tr').length;
            var med = $('[name="student_sample_medium_down"] table tr').length;
            var sub = $('[name="submission_due_date"]')[0].value;
            var rel = $('[name="assessment_release_date"]')[0].value;

            if(!(assess!=1 && marking!=1 && exam!=1 && pre!=1 && sub!='' && rel!='')) {
                alert("Pre Event Status can not check! Please upload files!");
                //return;
            }
        }

        //post event status check
        count = 0;      
        inputElements = $('#post_Uploaded');
        if(inputElements[0].checked){
            count = count + 1;
        }

        inputElements = $('#post_Reviewed');
        if(inputElements[0].checked){
            count = count + 1;
        }

        inputElements = $('#post_Completed');
        if(inputElements[0].checked){   // && !inputElements[0].readOnly
            count = count + 1;
        }

        var ff = $('[name="post_event_status_"]');
        if(ff[0].style.display == "block") {
            if(count > 1) {
                alert("Post Event Status can only check one!")
                return;
            }

            /*if(count < 1) {
                alert("Please select the post event status");
                return;
            }*/
        }
        if(count == 1) {
            var assess = $('[name="assessment_description_down"] table tr').length;
            var marking = $('[name="marking_criteria_down"] table tr').length;
            var exam = $('[name="exam_solution_down"] table tr').length;
            var pre = $('[name="pre_event_file_down"] table tr').length;
            var post = $('[name="post_event_file_down"] table tr').length;
            var high = $('[name="student_sample_high_down"] table tr').length;
            var low = $('[name="student_sample_low_down"] table tr').length;
            var med = $('[name="student_sample_medium_down"] table tr').length;
            var sub = $('[name="submission_due_date"]')[0].value;
            var rel = $('[name="assessment_release_date"]')[0].value;

            if(!(high!=1 && low!=1 && med!=1 && post!=1)) {
                alert("Post Event Status can not check! Please upload files!");
                return;
            }
        }

        ff = $('[name="assessment_release_date"]');
        if(ff[0].value == '') {
            alert("Please insert the assessment release date");
            return;
        }

        ff = $('[name="submission_due_date"]');
        if(ff[0].value == '') {
            alert("Please insert the submission due date");
            return;
        }

        //form[0].action = url;
        //form[0].submit();
        
        $.ajax({
            url: url,
            type: "POST",
            data: new FormData(form[0]),
            enctype: 'multipart/form-data',
            contentType: false,
            cache: false,
            processData:false,
            success: function(data) {                
                $('#modal_form').modal('hide');
                reload_table();
                swal(
                    'Success!',
                    'Data has been save!',
                    'success'
                )
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
            }
        });
        
    }

    function pre_save() {
        var form = $('#pre-form');
        url = "<?php echo site_url('assessment/pre_save')?>";
        $.ajax({
            url: url,
            type: "POST",
            data: new FormData(form[0]),            
            contentType: false,
            cache: false,
            processData:false,
            success: function(data) {                
                $('#pre_event_modal_form').modal('hide');
                reload_table();
                swal(
                    'Success!',
                    'Data has been save!',
                    'success'
                )
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
            }
        });
    }

    function post_save() {
        var form = $('#post-form');
        url = "<?php echo site_url('assessment/post_save')?>";
        $.ajax({
            url: url,
            type: "POST",
            data: new FormData(form[0]),            
            contentType: false,
            cache: false,
            processData:false,
            success: function(data) {                
                $('#post_event_modal_form').modal('hide');
                reload_table();
                swal(
                    'Success!',
                    'Data has been save!',
                    'success'
                )
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
            }
        });
    }

    function ondelete(id) {        
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false
        }).then(function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "<?php echo site_url('assessment/delete_file')?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        var tid = "#table_" + id;
                        $(tid).remove();            
                        swal(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error adding / update data');
                    }
                });

            }
        })
    }

    function delete_item(id) {

        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false
        }).then(function(isConfirm) {
            if (isConfirm) {

                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('assessment/delete')?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        //if success reload ajax table
                        $('#modal_form').modal('hide');
                        reload_table();
                        swal(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error adding / update data');
                    }
                });

            }
        })

    }

    //datepicker
    var date = new Date();
    date.setDate(date.getDate());
    $('.datepicker').datepicker({
        startDate: date,
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
    });
</script>
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
<div class="modal-dialog" style="width:90%;">

<form action="#" id="form" method="post" class="form-horizontal" enctype="multipart/form-data">
   <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h3 class="modal-title">Assign Role/h3>
      </div>
      <div class="modal-body form">

            <input type="hidden" value="" name="id"/>
            <input name="course_id" type="hidden" value="<?php echo $course_id ?>">
            <div class="form-body">
             <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">                  
                 <tbody>
                   <tr>
                     <td colspan="5">
                       <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                         <tr>
                           <td>Course Name</td>
                           <td><input type="text" name="course_name" id="course_name" class='form-control' readonly value="<?php echo $course_name?>"></td>
                           <td>Assessment Name</td>
                           <td><input type="text" name="course_description" id="course_description" class='form-control'></td>
                           <td>Year</td>
                           <td>
                             <select name="year" id="year"  class='form-control'>
<!--                               --><?php
//
//                                 for($i=2018; $i<=2100; $i++) {
//                                   echo "<option value='" .  $i . "' selected>" . $i . "</option>";
//                                 }
//                               ?>
                                 <option value="<?php echo date('Y'); ?>" selected><?php echo date('Y'); ?></option>
                             </select>
                           </td>
                           <td>Semester</td>
                           <td>
                                 <select name="semester" class='form-control'>

                                   <option value='1'>Feb-June</option>
                                   <option value='2'>July-Nov</option>
                                   <option value='Summer School'>December-Jan</option>
                                 </select>
                           </td>
                         </tr>
                       </table>
                     </td>                        
                   </tr>
                   <tr>
                       <td>Assessment Description</td>
                       <td>Marking Schedule</td>            
                       <td>Exam Solution</td>
                       <td style="width:189px;text-align:center;">Assessment Release Date</td>
                       <td style="width:189px;">Submission Due Date</td>
                   </tr>
                   <tr>
                       <td style="text-align:center;font-size:15px;">                            
                        <div name="assessment_description_">
                            <input type='file' name='assessment_description' id='assessment_description' multiple class='form-control' style="background:#3287c1;color:white;">
                            <!-- <p>
                             <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                   <tr>
                                     <td>
                                       Version History
                                     </td>
                                     <td>
                                       <input type="text" name='assessment_description_version_history' class="form-group">
                                     </td>
                                   </tr>
                             </table>                              
                            </p> -->
                            <p name="assessment_description_down" style="height:140px;display:block;overflow:overlay;"></p>
                        </div>                          
                       </td>
                       <td style="text-align:center;font-size:15px;">
                         <div name="marking_criteria_">
                           <input type='file' name='marking_criteria' id='marking_criteria' class='form-control' style="background:#3287c1;color:white;">
                           <!-- <p>
                             <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                   <tr>
                                     <td>
                                       Version History
                                     </td>
                                     <td>
                                       <input type="text" name='marking_criteria_version_history' class="form-group">
                                     </td>
                                   </tr>
                             </table>                              
                           </p> -->
                           <p name="marking_criteria_down" style="height:140px;display:block;overflow:overlay;"></p>
                         </div>
                       </td>
                       <td style="text-align:center;font-size:15px;">
                         <div name="exam_solution_">
                           <input type='file' name='exam_solution' id='exam_solution' class='form-control' style="background:#3287c1;color:white;">
                           <!-- <p>
                             <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                   <tr>
                                     <td>
                                       Version History
                                     </td>
                                     <td>
                                       <input type="text" name='exam_solution_version_history' class="form-group">
                                     </td>
                                   </tr>
                             </table>                              
                           </p> -->
                           <p name="exam_solution_down" style="height:140px;display:block;overflow:overlay;"></p>
                         </div>                         
                       </td>
                       <td style="width:189px;text-align:center;">
                         <div name="assessment_release_date_">
                            <p>
                           <input name="assessment_release_date" placeholder="Assessment Release Date" class="form-control datepicker" type="text">  
                           <br>
                            </p>
                            <p>
                                Reminder Week:
                                <select name="pre_reminder_day">
                                    <option value="7">1</option>
                                    <option value="14" selected>2</option>
                                    <option value="21">3</option>
                                    <option value="28">4</option>
                                    <option value="35">5</option>
                                </select>
                            </p>
                            <!-- <p>
                                Content
                                <textarea name="pre_reminder" class="form-control" row="5"></textarea>
                            </p>
                        -->
                         </div>
                       </td>
                       <td style="width:189px;text-align:center;">
                         <div name="submission_due_date_">
                            <p>
                                <input name="submission_due_date" placeholder="Assessment Release Date" class="form-control datepicker" type="text">  
                                <br/>
                            </p>
                            <p>
                                Reminder Day:
                                <select name="post_reminder_day">
                                    <option value="1">1</option><option value="2">2</option>
                                    <option value="3">3</option><option value="4">4</option>
                                    <option value="5">5</option><option value="6">6</option>
                                    <option value="7">7</option><option value="8">8</option>
                                    <option value="9">9</option><option value="10">10</option>
                                    <option value="11">11</option><option value="12">12</option>
                                    <option value="13">13</option><option value="14">14</option>
                                </select>
                            </p>
                            <!--<p>
                                Content
                                <textarea name="post_reminder" class="form-control" row="5"></textarea>
                            </p> -->
                         </div>
                       </td>
                   </tr>
                   <tr>
                       <td>Pre Event </td>
                       <td>Pre Event Status</td>            
                       <td>Post Event </td>
                       <td style="width:189px;text-align:center;">Post Event Status</td>
                       <td style="width:189px;"></td>
                   </tr>
                   <tr>
                       <td style="text-align:center;font-size:15px;">
                         <div name="pre_event_file_">
                           <input type='file' name='pre_event_file' id='pre_event_file' class='form-control' style="background:#3287c1;color:white;">
                           
                           <p>
                             <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                               <!-- <tr>
                                 <td>
                                   Version History
                                 </td>
                                 <td>
                                   <input type="text" name='pre_event_version_history' class="form-group">
                                 </td>
                               </tr> -->
                               <tr>
<!--                                 <td>-->
<!--                                 Comment-->
<!--                                 </td>-->
                                 <td>
                                   <!-- <input type="text" name='pre_event_comment' class="form-group"> -->
                                   <input type="button" class="btn btn-primary" onclick="pre_event();" value="Form" style="float: right"></button>
                                 </td>
                               </tr>
                             </table>                              
                           </p>
                           <p name="pre_event_file_down" style="height:140px;display:block;overflow:overlay;"></p>
                         </div>
                         <!---->
                       </td>
                       <td style="font-size:15px;">
                         <p name="pre_event_status_" style="display:block;">
                           <input type="checkbox" class="pre_event_list" name="pre_event_status[]" id="pre_Uploaded" value="Uploaded">&nbsp;Uploaded<br>
                           <input type="checkbox" class="pre_event_list" name="pre_event_status[]" id="pre_Reviewed" value="Reviewed">&nbsp;Reviewed<br>
                           <input type="checkbox" class="pre_event_list" name="pre_event_status[]" id="pre_Completed" value="Completed">&nbsp;Completed<br>
                         </p>
                       </td>
                       <td style="text-align:center;font-size:15px;">
                         <div name="post_event_file_">
                           <input type='file' name='post_event_file' id='post_event_file' class='form-control' style="background:#3287c1;color:white;">
                           
                            <p>
                             <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                               <!-- <tr>
                                 <td>
                                   Version History
                                 </td>
                                 <td>
                                   <input type="text" name='post_event_version_history' class="form-group">
                                 </td>
                               </tr> -->
                               <tr>
<!--                                 <td>-->
<!--                                 Comment-->
<!--                                 </td>-->
                                 <td>
                                   <!-- <input type="text" name='post_event_comment' class="form-group"> -->
                                   <input type="button" class="btn btn-primary" onclick="post_event();" value="Form" style="float: right"></button>
                                 </td>
                               </tr>
                             </table>   
                            </p>
                            <p name="post_event_file_down" style="height:140px;display:block;overflow:overlay;"></p>                                                         
                         </div>
                         <!---->
                       </td>
                       <td style="width:189px;text-align:center;">
                         <p name="post_event_status_" style="display:block;">
                           <input type="checkbox" class="post_event_list" name="post_event_status[]" id="post_Uploaded" value="Uploaded">&nbsp;Uploaded<br>
                           <input type="checkbox" class="post_event_list" name="post_event_status[]" id="post_Reviewed"  value="Reviewed">&nbsp;Reviewed<br>
                           <input type="checkbox" class="post_event_list" name="post_event_status[]" id="post_Completed"  value="Completed">&nbsp;Completed<br>
                         </p>
                       </td>
                       <td style="width:189px;"></td>
                   </tr>
                   <tr>
                       <td>Student Sample:Low</td>
                       <td>Student Sample:Med</td>            
                       <td>Student Sample:High</td>            
                       <td style="width:189px;text-align:center;"></td>
                       <td style="width:189px;"></td>
                   </tr>
                   <tr>
                       <td style="text-align:center;font-size:15px;">
                         <div name="student_sample_low_">
                           <input type='file' name='student_sample_low' id='student_sample_low' class='form-control' style="background:#3287c1;color:white;">
                           <!-- <p>
                             <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                               <tr>
                                 <td>
                                   Version History
                                 </td>
                                 <td>
                                   <input type="text" name='student_sample_low_version_history' class="form-group">
                                 </td>
                               </tr>                                 
                             </table>                              
                           </p>     -->
                           <p name="student_sample_low_down" style="height:140px;display:block;overflow:overlay;"></p>                          
                         </div>
                         <!---->
                       </td>
                       <td style="text-align:center;font-size:15px;">
                         <div name="student_sample_medium_">
                           <input type='file' name='student_sample_medium' id='student_sample_medium' class='form-control' style="background:#3287c1;color:white;">
                           <!-- <p>
                             <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                               <tr>
                                 <td>
                                   Version History
                                 </td>
                                 <td>
                                   <input type="text" name='student_sample_med_version_history' class="form-group">
                                 </td>
                               </tr>                                 
                             </table>                              
                           </p>         -->
                           <p name="student_sample_medium_down" style="height:140px;display:block;overflow:overlay;"></p>                       
                         </div>
                         <!---->
                       </td>
                       <td style="text-align:center;font-size:15px;">
                         <div name="student_sample_high_">
                           <input type='file' name='student_sample_high' id='student_sample_high' class='form-control' style="background:#3287c1;color:white;">
                           <!-- <p>
                             <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                               <tr>
                                 <td>
                                   Version History
                                 </td>
                                 <td>
                                   <input type="text" name='student_sample_high_version_history' class="form-group">
                                 </td>
                               </tr>                                 
                             </table>                              
                           </p>          -->
                           <p name="student_sample_high_down" style="height:140px;display:block;overflow:overlay;"></p>                     
                         </div>
                         </td>
                       <td style="width:189px;text-align:center;"></td>
                       <td style="width:189px;"></td>
                   </tr>
                 </tbody>
             </table>
            </div>
      </div>
      <div class="modal-footer">
         <button type="button" id="btnSave" class="btn btn-primary" onclick="save();">Save</button>
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
      </form>
   </div>      
</div>   
</div>


<div class="modal fade" id="pre_event_modal_form" role="dialog">
<div class="modal-dialog" style="width:90%;">
<form action="#" id="pre-form" method="post" class="form-horizontal">
<div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h3 class="modal-title">Form/h3>
      </div>
      <div class="modal-body form">                     
            <div class="form-body">
            <input type="hidden" value="" name="pre-id"/>
             <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">                  
                 <tbody>
                   <tr><td>1. Moderator Comments *</td></tr>
                   <tr>
                     <td><input type="text" name="qustion_1" id="qustion_1" placeholder="Enter your answer" class='form-control'></td>
                   </tr>
                   <tr height="20px"><td></td></tr>
                   <tr><td>2. Lecturer or Course Leader response</td></tr>
                   <tr>
                       <td><input type="text" name="qustion_2" id="qustion_2" placeholder="Enter your answer" class='form-control'></td>
                   </tr>
                   <tr height="20px"><td></td></tr>
                   <tr><td>3. Assessment Number*</td></tr>
                   <tr>
                        <td>                                
                            <input type="radio" name="qustion_3" value="1">1<br>
                            <input type="radio" name="qustion_3" value="2">2<br>
                            <input type="radio" name="qustion_3" value="3">3<br>
                            <input type="radio" name="qustion_3" value="4">4<br>
                            <input type="radio" name="qustion_3" value="5">5<br>
                        </td>
                    </tr>
                    <tr height="20px"><td></td></tr>
                    <tr><td>4. Weightage (%) *</td></tr>
                    <tr>
                        <td><input type="text" name="qustion_4" id="qustion_4" placeholder="Enter your answer" class='form-control'></td>
                    </tr>
                    <tr height="20px"><td></td></tr>
                    <tr><td>5. Total Marks *</td></tr>
                    <tr>
                        <td><input type="text" name="qustion_5" id="qustion_5" placeholder="Enter your answer" class='form-control'></td>
                    </tr>
                    
                    <tr height="20px"><td></td></tr>
                    <tr><td>6. Do the assessment tasks effectively measure the associated learning outcome(s): *</td></tr>
                    <tr>
                        <td>
                            <input type="radio" name="qustion_6" value="1" id="question_yes">Yes<br>
                            <input type="radio" name="qustion_6" value="0" id="question_no">No<br>
                        </td>
                    </tr>
                    
                    <tr height="20px"><td></td></tr>
                    <tr><td>7. Are the assessment task/Question clear: *</td></tr>
                    <tr>
                        <td>
                            <input type="radio" name="qustion_7" value="1">Yes<br>
                            <input type="radio" name="qustion_7" value="0">No<br>
                        </td>
                    </tr>

                    <tr height="20px"><td></td></tr>
                    <tr><td>8. Is the assessment appropriate to level of course: *</td></tr>
                    <tr>
                        <td>
                            <input type="radio" name="qustion_8" value="1">Yes<br>
                            <input type="radio" name="qustion_8" value="0">No<br>
                        </td>
                    </tr>

                    <tr height="20px"><td></td></tr>
                    <tr><td>9. Is the assessment information accurate as per the course descriptor: *</td></tr>
                    <tr>
                        <td>
                            <input type="radio" name="qustion_9" value="1">Yes<br>
                            <input type="radio" name="qustion_9" value="0">No<br>
                        </td>
                    </tr>

                    <tr height="20px"><td></td></tr>
                    <tr><td>10. Is the marking scheme attached with assessment aapropriate: *</td></tr>
                    <tr>
                        <td>
                            <input type="radio" name="qustion_10" value="1">Yes<br>
                            <input type="radio" name="qustion_10" value="0">No<br>
                        </td>
                    </tr>
                    
                    <tr height="20px"><td></td></tr>
                    <tr><td>11. The conditions of assessment are fair: (eg. resources, time allowed etc.) *</td></tr>
                    <tr>
                        <td>
                            <input type="radio" name="qustion_11" value="1">Yes<br>
                            <input type="radio" name="qustion_11" value="0">No<br>
                        </td>
                    </tr>

                    <tr height="20px"><td></td></tr>
                    <tr><td>12. Lecturer hereby confirms that assessment is complete and issues identified have been addressed and resolved: *</td></tr>
                    <tr>
                        <td>
                            <input type="radio" name="qustion_12" value="1">Yes<br>
                            <input type="radio" name="qustion_12" value="0">No<br>
                        </td>
                    </tr>
                 </tbody>
             </table>
            </div>
      </div>
      <div class="modal-footer">
         <button type="button" id="btnSave" class="btn btn-primary" onclick="pre_save();">Save</button>
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
      </form>
   </div> 
</form>
</div>
</div>


<div class="modal fade" id="post_event_modal_form" role="dialog">
<div class="modal-dialog" style="width:90%;">
<form action="#" id="post-form" method="post" class="form-horizontal">
<div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h3 class="modal-title">Form/h3>
      </div>
      <div class="modal-body form">                     
            <div class="form-body">
            <input type="hidden" value="" name="post-id"/>
             <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">                  
                 <tbody>
                 <tr><td>1. Moderator Comments *</td></tr>
                 <tr>
                     <td>
                         <input type="text" placeholder="Enter your answer" class="form-control" name="post_1">
                     </td>
                 </tr>
                 <tr height="20px"><td></td></tr>
                 <tr><td>2. Lecturer or Course Leader response</td></tr>
                 <tr>
                     <td>
                         <input type="text" placeholder="Enter your answer" class="form-control" name="post_2">
                     </td>
                 </tr>
                   <tr><td>3. Summary of grade comparison*</td></tr>
                   <tr><td>Moderator to make a small collection of assessments and compare results</td></tr>
                   <tr>
                        <td>
                            <input type="text" placeholder="Enter your answer" name="post_3" class="form-control">
                        </td>
                    </tr>
                    <tr height="20px"><td></td></tr>
                    <tr><td>4. Is the feedback given to students appropriate and constructive? </td></tr>
                    <tr>
                        <td><input type="radio" name="post_4" value="1">Yes<br>
                            <input type="radio" name="post_4" value="0">No<br> </td>
                    </tr>
                    <tr height="20px"><td></td></tr>
                    <tr><td>5. Is the mark/result awarded to students appropriate? *</td></tr>
                    <tr>
                        <td><input type="radio" name="post_5" value="1">Yes<br>
                            <input type="radio" name="post_5" value="0">No<br> </td>
                    </tr>
                    
                    <tr height="20px"><td></td></tr>
                    <tr><td>6. High fail rate?: *</td></tr>
                    <tr>
                        <td>
                            <input type="radio" name="post_6" value="1">Yes<br>
                            <input type="radio" name="post_6" value="0">No<br>
                        </td>
                    </tr>

                 </tbody>
             </table>
            </div>
      </div>
      <div class="modal-footer">
         <button type="button" id="btnSave" class="btn btn-primary" onclick="post_save();">Save</button>
         <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
      </form>
   </div> 
</form>
</div>
</div>

<script>
    $('.pre_event_list').on('change', function() {
	    $('.pre_event_list').not(this).prop('checked', false);  
	});

    $('.post_event_list').on('change', function() {
	    $('.post_event_list').not(this).prop('checked', false);  
	});
</script>
</body>

</html>