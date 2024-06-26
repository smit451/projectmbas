<?php

include '../Includes/dbcon.php';

    $tid = intval($_GET['tid']);//


    if($tid == 2){
        echo'<div class="form-group row mb-3">
                        <div class="col-xl-6">
                        <label class="form-control-label">Select Date<span class="text-danger ml-2">*</span></label>
                        <input type="date" class="form-control" name="singleDate" id="exampleInputFirstName">
                        </div>
                    </div>';
    }
    else if($tid == 3){

         echo'<div class="form-group row mb-3">
                        <div class="col-xl-6">
                        <label class="form-control-label">From Date<span class="text-danger ml-2">*</span></label>
                        <input type="date" class="form-control" name="fromDate" id="exampleInputFirstName">
                        </div>
                        <div class="col-xl-6">
                        <label class="form-control-label">To Date<span class="text-danger ml-2">*</span></label>
                        <input type="date" class="form-control" name="toDate" id="exampleInputFirstName">
                        </div>
                    </div>';

    }
    else{


    }
        
?>

