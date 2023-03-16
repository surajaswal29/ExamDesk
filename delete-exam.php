<?php

$exm_type=$_GET['type'];

include "config.php";

if($exm_type=='mcq'){

    $exm_code_mcq=$_GET['mcq_based_exam_code'];

    $delete_exam="DELETE FROM exam WHERE exam_id='$exm_code_mcq'";
    $delete_result=mysqli_query($con,$delete_exam);

    if($delete_result){

        redirect("choose-exam-type.php");
    }
}elseif($exm_type=='des'){
    
    $exm_code_des=$_GET['descriptive_based'];

    $delete_exam="DELETE FROM desc_exam WHERE exam_code='$exm_code_des'";
    $delete_result=mysqli_query($con,$delete_exam);

    if($delete_result){

        redirect("choose-exam-type.php");
    }
}
?>