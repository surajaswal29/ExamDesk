<?php 

include "files.php"; 

if(!isset($_GET['question_no'])){
    $q_no=0;
}else{
    $q_no=$_GET['question_no'];
}

$question_per_card=1;
$offset=$question_per_card*$q_no;

$q_no=$q_no+$question_per_card;

?> <!--file that contains all external code -->

    <div class="container-fluid vh-100 student-main-wrap">
        <?php include "top-header.php"; ?> <!--top-header code file -->
        <!-- top header end -->
        <?php
            $question_select="SELECT * FROM mock_test WHERE exam_code='{$_GET['exam_code']}' LIMIT $question_per_card OFFSET $offset";
            $question_output=mysqli_query($con,$question_select);
            
            $row_count=mysqli_num_rows($question_output);
            if($row_count>0){
                $question_data=mysqli_fetch_assoc($question_output);

        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="main-exam-wrap absolute-center">
                    <div class="exam-box-gh">
                        <div class="question-box">
                            <form action="#" method="post" class="border p-3">
                                <div class="row">
                                        <div class="col-md-1">
                                            <h1 class="color-code">Q.<?php echo $q_no; ?></h1>
                                        </div>
                                        <div class="col-md-11">
                                            <h1><?php echo $question_data['question']; ?></h1>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-1 absolute-center">
                                                    <label class="checkbox-label">
                                                        <input type="radio" name="option" value="<?php echo $question_data['option1']; ?>">
                                                        
                                                    </label>
                                                </div>
                                                <div class="col-md-10">
                                                    <span class="label-text"><?php echo $question_data['option1']; ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-1">
                                            <div class="row">
                                                <div class="col-md-1 absolute-center">
                                                    <label class="checkbox-label">
                                                        <input type="radio" name="option" value="<?php echo $question_data['option2']; ?>">
                                                        
                                                    </label>
                                                </div>
                                                <div class="col-md-10">
                                                    <span class="label-text"><?php echo $question_data['option2']; ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-1">
                                            <div class="row">
                                                <div class="col-md-1 absolute-center">
                                                    <label class="checkbox-label">
                                                        <input type="radio" name="option" value="<?php echo $question_data['option3']; ?>">
                                                        
                                                    </label>
                                                </div>
                                                <div class="col-md-10">
                                                    <span class="label-text"><?php echo $question_data['option3']; ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-1">
                                            <div class="row">
                                                <div class="col-md-1 absolute-center">
                                                    <label class="checkbox-label">
                                                        <input type="radio" name="option" value="<?php echo $question_data['option4']; ?>">
                                                        
                                                    </label>
                                                </div>
                                                <div class="col-md-10">
                                                    <span class="label-text"><?php echo $question_data['option4']; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 p-4 nav-button">
                                        <button type="submit" name="next" class="btn btn-success nav-button">Next</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                            if(isset($_POST['next'])){
                                $option=$_POST['option'];
                                
                                redirect("mock-test.php?exam_code=".$_GET['exam_code']."&question_no=".$q_no);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }else{
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="main-exam-wrap absolute-center">
                    <div class="exam-box-gh pg-x">
                        <div class="question-box">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1>Exam Summary</h1>
                                </div>
                                
                                <?php
                                   
                                    // total Question
                                    $exam_submitted="SELECT * FROM mock_test WHERE exam_code='{$_GET['exam_code']}'";
                                    $exam_submitted_res=mysqli_query($con,$exam_submitted);

                                    $total_question=mysqli_num_rows($exam_submitted_res);
                                    // echo'<h1 class="color-code">Total Questions:&nbsp;'.$total_question.'</h1>';
                                    /*
                                    // Number of question answered
                                    $ques_answered_query="SELECT * FROM mock_test WHERE exam_code='{$_GET['exam_code']}'AND student_reg_id='{$_SESSION['reg_id']}' AND answer!='0'";
                                    $ques_answered_res=mysqli_query($con,$ques_answered_query);

                                    $ques_answered=mysqli_num_rows($ques_answered_res);

                                    // leaved question
                                    $leaved_ques_query="SELECT * FROM mock_test WHERE exam_code='{$_GET['exam_code']}'AND student_reg_id='{$_SESSION['reg_id']}' AND answer='0'";
                                    $leaved_ques_res=mysqli_query($con,$leaved_ques_query);

                                    $leaved_ques=mysqli_num_rows($leaved_ques_res);

                                    // correct answer
                                    $count_correct="SELECT * FROM `mock_test` WHERE exam_code='{$_GET['exam_code']}'AND student_reg_id='{$_SESSION['reg_id']}' AND answer=c_answer";
                                    $count_correct_res=mysqli_query($con,$count_correct);

                                    $count_no=mysqli_num_rows($count_correct_res);
                                    // echo '<h1 class="color-code">Correct answers:&nbsp;'.$count_no.'</h1>';

                                    // wrong answers
                                    $count_correct1="SELECT * FROM `mock_test` WHERE exam_code='{$_GET['exam_code']}'AND student_reg_id='{$_SESSION['reg_id']}' AND answer!=c_answer";
                                    $count_correct_res1=mysqli_query($con,$count_correct1);

                                    $count_no1=mysqli_num_rows($count_correct_res1);
                                    // echo '<h1 class="color-code">Wrong answers:&nbsp;'.$count_no1.'</h1>';
                                    */

                                ?>
                                <div class="col-md-8">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Reg Id</td>
                                            <td><?php echo $_SESSION['reg_id'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Exam Code</td>
                                            <td><?php echo $_GET['exam_code'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Questions</td>
                                            <td><?php echo $total_question ?></td>
                                        </tr>
                                        <!--
                                        <tr>
                                            <td>Questions attended</td>
                                            <td>
                                                <?php
                                                    if($ques_answered>0){

                                                        echo $ques_answered;
                                                    }else{
                    
                                                        echo 0;
                                                    }
                                                ?>
                                            </td>
                                        </tr>   
                                        <tr>
                                            <td>Question not attended</td>
                                            <td>
                                                <?php
                                                    if($leaved_ques){

                                                        echo $leaved_ques;
                                                    }else{
                    
                                                        echo 0;
                                                    }
                                                ?>
                                            </td>
                                        </tr>   
                                        <tr>
                                            <td>Correct answers</td>
                                            <td><?php echo $count_no ?></td>
                                        </tr> 
                                        <tr>
                                            <td>Wrong answers</td>
                                            <td><?php echo $count_no1 ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Marks Scored</td>
                                            <td><?php echo $total_marks_scored1=$count_no*5 ."/". $total_question*5 ?></td>
                                        </tr>    
                                        -->
                                    </table>
                                </div>
                                <div class="col-md-4 marks-system">
                                    <h1>Marks System</h1>
                                    <h2>Maximum Question: 20 Questions</h2>
                                    <h2>Marks/Question: 5 Marks</h2>
                                    <h2>Negative Marking: No</h2>
                                    <?php
                                        // if($total_marks_scored1>20){
                                            // echo'<img src="images/passed.jpg" alt="pass graphic">';
                                        // }else{
                                            // echo'<img src="images/fail-png.png" alt="fail graphic" class="fail">';
                                        // }
                                    ?>
                                </div>
                                <div class="col-md-12">
                                    <nav class="nav">
                                            <a href="student-dashboard.php" class="nav-link btn bg-grad-1 text-light"><i class="fas fa-home"></i> Student Dashboard</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</body>
</html>