<?php 

include "files.php"; 
$exam_id= $_GET['mcq_based_exam_code'];
?> <!--file that contains all external code -->

<div class="container-fluid vh-100 student-main-wrap">
    <?php include "top-header.php"; ?> <!--top-header code file -->

        <div class="row">
            <?php include "sidebar.php"; ?> <!--sidebar code file -->
            <!-- main section -->
            <div class="col-md-10 student-home-section">
                <div class="nav px-4 pt-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item mb-0"><a href="teacher-dashboard.php">Home</a></li>
                            <li class="breadcrumb-item mb-0"><a href="choose-exam-type.php">Choose Exam Type</a></li>
                            <li class="breadcrumb-item mb-0 active" aria-current="page">Create Exam</li>
                        </ol>
                    </nav>
                </div>
                <section>
                    <div class="home-section-box absolute-center">
                        <!-- MCQ based Question modal box start-->

                        <div class="create-exam-wrap">
                            <form action="#" method="POST" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="row exam-name px-4">
                                            <?php
                                                $exm_name_query="SELECT * FROM exam WHERE exam_id='$exam_id'";
                                                $exm_name_result=mysqli_query($con,$exm_name_query);

                                                $exm_name_data=mysqli_fetch_assoc($exm_name_result);
                                                if(isset($exm_name_data['exam_name'])){
                                                    echo"<div class='col-md-12'><h3>Exam Name: ".$exm_name_data['exam_name']."</h3></div>";
                                                }else{
                                            ?>
                                            
                                            <div class="col-md-3">
                                                <label for="examname">Exam Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="exam_name" id="exam_name" placeholder="Enter exam name here">
                                            </div>
                                            
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <?php
                                        $count_question="SELECT * FROM exam WHERE exam_id='$exam_id'";
                                        $count_result=mysqli_query($con,$count_question);
                                        $ques_count=mysqli_num_rows($count_result);

                                        if($ques_count>0){
                                            echo "<h4>".$ques_count."/20</h4>";
                                        }
                                        ?>
                                    </div>
                                </div>
                                    
                                <div class="row px-3 mt-3">
                                    <div class="col-md-12">
                                        <!-- textarea for question -->
                                        <textarea name="question" id="question" placeholder="Enter question here" required></textarea>

                                        <!-- option boxes start-->
                                        <div class="row rw-cex">
                                            <!-- option A -->
                                            <div class="col-md-6 option-input">
                                                <input type="text" name="optionA" placeholder="Option A" id="optionA" required>
                                            </div>
                                            <!-- option B -->
                                            <div class="col-md-6 option-input">
                                                <input type="text" name="optionB" placeholder="Option B" id="optionB" required>
                                            </div>
                                        </div>
                    
                                        <div class="row rw-cex">
                                            <!-- option C -->
                                            <div class="col-md-6 option-input">
                                                <input type="text" name="optionC" placeholder="Option C" id="optionC" required>
                                            </div>
                                            <!-- option D -->
                                            <div class="col-md-6 option-input">
                                                <input type="text" name="optionD" placeholder="Option D" id="optionD" required>
                                            </div>
                                        </div>
                                        <!-- option boxes end-->

                                        <!-- Choose correct answer start-->
                                        <div class="row px-3 py-3">
                                            <div class="col-md-8 ">
                                                <select name="correctoption" id="correctoption">
                                                    <option value="#">Choose Correct Answer</option>
                                                    <option value="1">Option A</option>
                                                    <option value="2">Option B</option>
                                                    <option value="3">Option C</option>
                                                    <option value="4">Option D</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Choose correct answer end-->

                                        <!-- submit button -->
                                        <div class="row mt-3 px-3">
                                            <div class="col-md-4">
                                                <input type="submit" name="save" value="Save" class="btn">
                                            </div>
                                            <div class="col-md-4">
                                                <a href="preview-question.php?exam_code=<?php echo $exam_id?>&examname=<?php echo $exm_name_data['exam_name']; ?>&exam_type=<?php echo $exm_name_data['type']; ?>" id="preview-question" class="nav-item">Preview</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php
                            
                                if(isset($_POST['save'])){
                                    $question=mysqli_real_escape_string($con,$_POST['question']);
                                    $op1=mysqli_real_escape_string($con,$_POST['optionA']);
                                    $op2=mysqli_real_escape_string($con,$_POST['optionB']);
                                    $op3=mysqli_real_escape_string($con,$_POST['optionC']);
                                    $op4=mysqli_real_escape_string($con,$_POST['optionD']);
                                    $correct_option=mysqli_real_escape_string($con,$_POST['correctoption']);

                                    if(isset($exm_name_data['exam_name'])){
                                        $exam_name=$exm_name_data['exam_name'];
                                    }else{
                                        $exam_name=mysqli_real_escape_string($con,$_POST['exam_name']);
                                    }
                                    $created_on=date('Y-m-d H:i:s');

                                    if($correct_option=='1'){

                                         $c_op=mysqli_real_escape_string($con,$op1);
                                    }elseif($correct_option=='2'){

                                         $c_op=mysqli_real_escape_string($con,$op2);
                                    }elseif($correct_option=='3'){

                                         $c_op=mysqli_real_escape_string($con,$op3);
                                    }elseif($correct_option=='4'){

                                         $c_op=mysqli_real_escape_string($con,$op4);
                                    }

                                    $query="INSERT INTO exam(type,exam_id,created_by,exam_name,question,option1,option2,option3,option4,correct_option,created_on) 
                                            VALUES('mcq','$exam_id','{$_SESSION['reg_id']}','$exam_name','$question','$op1','$op2','$op3','$op4','$c_op','$created_on')";
                                    $output=mysqli_query($con,$query);

                                    if($output){
                                        redirect("create-exam.php?mcq_based_exam_code=".$exam_id);
                                    }
                                }
                            ?>
                        </div>

                        <!-- MCQ based Question modal box ends-->
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
</html>