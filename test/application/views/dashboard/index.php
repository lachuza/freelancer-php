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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class = "row" style="display: flex">
   <div class=""> 
    <?php

        if($flag == '1') { 
        ?>  Taught <?php 
        } else if($flag=='2') { ?>
            Moderator <?php
        } ?>
      </div>
    <div class="notification" style="display: none">
        <i class="fa fa-bell" ></i>

    </div>
    <div class="noti-content">

    </div>

    <script>
        var original_data='';
        var flag=<?php echo $flag ?>;


        function notification(){
            if (flag == 1){
            $.getJSON('dashboard/gettaught',function (data,status) {
                if(original_data != data){
                    original_data = data;
                    if(original_data){
                     $('.notification').css('display','block');
                    }

                    var mail_html = '';
                    var data_arr = data;
                    for(var i =0; i < data_arr.length; i++){
                        mail_html += "<div class='drop-title'>"+data_arr[i].username+" reviewed and completed the "+data_arr[i].course_description+" for "+data_arr[i].course_name+"</div>";
                        mail_html += "<div class='drop-title1'>you have a assessment release due in "+data_arr[i].pre_reminder_day+"</div>";
                        mail_html += "<div class='drop-title1'>you have submission due in "+data_arr[i].post_reminder_day+"</div>";

                    }
                    // var mail_html="<div class='drop-title'>AAA reviewed and completed the BBB for CCC</div>";

                    $('.noti-content').html(mail_html);
                }
            });
           } else{
                $.getJSON('dashboard/getnoti',function (data,status) {
                    if(original_data != data){
                        original_data = data;
                        if(original_data){
                            $('.notification').css('display','block');
                        }

                        var mail_html = '';
                        var data_arr = data;
                        for(var i =0; i < data_arr.length; i++){
                            mail_html += "<div class='drop-title'>"+data_arr[i].username+" uploaded the "+data_arr[i].course_description+" for "+data_arr[i].course_name+"</div>";
                        }
                        // var mail_html="<div class='drop-title'>AAA reviewed and completed the BBB for CCC</div>";

                        $('.noti-content').html(mail_html);
                    }
                });
            }
        }

        window.setInterval('notification()', 30000);
    </script>
   </div>
   <br />
   <br />
   <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
         <tr>
            <th>Course Name</th>
            <th>Last Assessment Pre Moderated</th>
            <th>Last Assessment Post Moderated</th>
             <th>Year</th>
             <th>Semester</th>
             <th>Moderate Name</th>
             <th>Teacher Name</th>
             <th style="width:189px;">Action</th>
         </tr>
      </thead>
      <tbody>

      <?php foreach ($output as $data): ?>
        <tr>
          <td><a class="ayam" title="Add Form" href="<?php echo base_url();?>assessment/assessment_form/<?php echo $data->id;?>"><?php echo $data->course_name;?></a></td>
          <td><a class="ayam" title="Add Form" href="<?php echo base_url();?>assessment/assessment_form/<?php echo $data->id;?>"><?php echo $data->assessment_release_date;?></a></td>
          <td><a class="ayam" title="Add Form" href="<?php echo base_url();?>assessment/assessment_form/<?php echo $data->id;?>"><?php echo $data->submission_due_date;?></a></td>
          <td><?php echo $data->year;?></td>
                <td><?php echo $data->semester;?></td>
            <?php foreach ($output1 as $data): ?>
                
                <td><?php echo $data->moderator_name;?></td>
                <td><?php echo $data->teacher_name;?></td>
                <td><a class="ayam btn btn-sm btn-primary" title="Add Form" href="<?php echo base_url();?>assessment/assessment_form/<?php echo $data->id;?>"><i class="glyphicon glyphicon-pencil"></i> Add Form</a></td>

            <?php endforeach; ?>
        </tr>
      <?php endforeach; ?>

      </tbody>
   </table>
</div>
</div>  
<style>
    .notification {
        position: absolute;
        left: 80px;
        background-color: #fff;
        padding: 5px;
        border-radius: 500px;
        box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.5);
    }
    .noti-content{
        margin-top: 43px;
        display: none;
    }
    .drop-title{
        display: none;
    }
    .drop-title1{
        margin-left: 50px;
        display: none;
    }
</style>
<script>
    $(document).ready(function () {
        $('.fa-bell').click(function () {

            $('.noti-content').slideToggle();
            $('.drop-title').css('display','block');
            $('.drop-title1').css('display','block');
        });
    });
</script>
</body>
</html>