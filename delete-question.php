<?php
    session_start();
    include "config.php";

    if($_GET['exam_type']=='mcq'){

        $delete_query="DELETE FROM exam WHERE id='{$_GET['q_id']}'";
        $delete_run=mysqli_query($con,$delete_query);

        if($delete_query){
            redirect("preview-question.php?exam_code=".$_GET['exam_code']."&exam_type=".$_GET['exam_type']);
        }
    }elseif($_GET['exam_type']=='des'){
        $delete_query="DELETE FROM desc_exam WHERE id='{$_GET['q_id']}'";
        $delete_run=mysqli_query($con,$delete_query);

        if($delete_query){
            redirect("preview-question.php?exam_code=".$_GET['exam_code']."&exam_type=".$_GET['exam_type']."&examname=".$_GET['examname']);
        } 
    }
?>