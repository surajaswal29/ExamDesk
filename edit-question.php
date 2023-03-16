<?php include "files.php"; 
  $exam_code=$_GET['q_id']; ##getting exam id
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
                            <li class="breadcrumb-item mb-0 active" aria-current="page">Edit Question</li>
                        </ol>
                    </nav>
                </div>
                <section class="p-1 absolute-center">
                <div class="home-section-box absolute-center">
                    <?php
                    if($_GET['exam_type']=='des'){
                    ?>
                        <!-- descriptive based Question modal box start-->

                        <div class="create-exam-wrap descriptive-based-wrap">
                            <form action="#" method="POST" autocomplete="off" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="row exam-name px-4">
                                            <?php
                                                $exm_name_query="SELECT * FROM desc_exam WHERE id='$exam_code'";
                                                $exm_name_result=mysqli_query($con,$exm_name_query);

                                                $exm_name_data=mysqli_fetch_assoc($exm_name_result);
                                            ?>
                                            
                                            <div class="col-md-3">
                                                <label for="examname">Exam Name</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" name="exam_name" value="<?php echo $exm_name_data['exam_name']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <?php
                                        $ques_count=mysqli_num_rows($exm_name_result);

                                        if($ques_count>0){
                                            echo "<h4>".$ques_count."/20</h4>";
                                        }else{
                                            echo "<h4>0/20</h4>";
                                        }
                                        ?>
                                    </div>
                                </div>
                                    
                                <div class="row px-3 mt-3 descriptive-based">
                                    <div class="col-md-12">
                                        <!-- textarea for question -->
                                        <textarea name="question" id="question"><?php echo $exm_name_data['Question']; ?></textarea>

                                        <!-- code & diagram -->
                                        <div class="row rw-cex">
                                            <!-- code -->
                                            <div class="col-md-6 descriptive-input">
                                                <label for="code"><h5>Code box</h5></label>
                                                <textarea name="codesnippet" id="codesnippet" placeholder="// Only for Computer Science Questions"><?php echo $exm_name_data['code']; ?></textarea>
                                            </div>
                                            <!-- diagram -->
                                            <div class="col-md-6 descriptive-input p-3">
                                                <label for="diagram"><h5>Diagram</h5></label>
                                                <label for="diagram">
                                                    <mark>If your Question is based on any image or diagram then upload your diagram/image here</mark>
                                                </label>
                                                <input type="file" name="diagram" class="mt-3">
                                            </div>
                                            <small class="mt-1"><em>Note: Both 'code box' and 'Diagram' are optional, you can leave them blank.</em></small>
                                        </div>

                                        <!-- submit button -->
                                        <div class="row mt-1 px-3">
                                            <div class="col-md-4">
                                                <input type="submit" name="save" value="Save" class="btn">
                                            </div>
                                            <div class="col-md-4">
                                                <a href="preview-question.php?exam_code=<?php echo $_GET['exam_code']?>&examname=<?php echo $exm_name_data['exam_name']; ?>&exam_type=<?php echo $exm_name_data['type']?>" id="preview-question" class="nav-item">Preview</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php
                            
                                if(isset($_POST['save'])){
                                    $question=mysqli_real_escape_string($con,$_POST['question']);
                                    $code=mysqli_real_escape_string($con,$_POST['codesnippet']);

                                    $created_on=date('Y-m-d H:i:s');
                                    $exam_name=mysqli_real_escape_string($con,$_POST['exam_name']);

                                    if($_FILES['diagram']['size'] != 0){
                                        $image_name=$_FILES['diagram']['name'];
                                        $temp_name=$_FILES['diagram']['tmp_name'];

                                        $ar1= explode('.',$image_name);  //creating array from image name
                                        $actual_image_name= $ar1[0].date('His').'.'.$ar1[1];  //adding timestamp to image name

                                        $destination="images/uploaded_images/des_ques/".$actual_image_name;

                                        if(move_uploaded_file($temp_name,$destination)){
                                            // update image name in database
                                            $query2="UPDATE desc_exam SET exam_name='$exam_name',Question='$question',code='$code',diagram='$actual_image_name' WHERE id='$exam_code'";
                                            $output2=mysqli_query($con,$query2);
    
                                            if($output2){
                                                redirect("preview-question.php?exam_code=".$_GET['exam_code']."&examname=".$exm_name_data['exam_name']."&exam_type=".$exm_name_data['type']);
                                            }
                                        }
                                    }else{
                                        $query="UPDATE desc_exam SET exam_name='$exam_name',Question='$question',code='$code' WHERE id='{$_GET['q_id']}'";
                                        $output=mysqli_query($con,$query);

                                        if($output){
                                            redirect("preview-question.php?exam_code=".$_GET['exam_code']."&examname=".$exm_name_data['exam_name']."&exam_type=".$exm_name_data['type']);
                                        }
                                    }
                                }
                            ?>
                        </div>

                        <!-- descriptive based Question modal box ends-->
                    <?php
                        }elseif($_GET['exam_type']=='mcq'){
                    ?>
                        <!-- MCQ based Question modal box start-->

                        <div class="create-exam-wrap">
                            <form action="#" method="POST" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="row exam-name px-4">
                                            <?php
                                                $exm_name_query="SELECT * FROM exam WHERE id='$exam_code'";
                                                $exm_name_result=mysqli_query($con,$exm_name_query);

                                                $exm_name_data=mysqli_fetch_assoc($exm_name_result);
                                            ?>
                                            
                                            <div class="col-md-3">
                                                <label for="examname">Exam Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="exam_name" value="<?php echo $exm_name_data['exam_name']?>" placeholder="Enter exam name here">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <?php
                                        $count_question="SELECT * FROM exam WHERE exam_id='$exam_code'";
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
                                        <textarea name="question" id="question" placeholder="Enter question here"><?php echo $exm_name_data['Question']?></textarea>

                                        <!-- option boxes start-->
                                        <div class="row rw-cex">
                                            <!-- option A -->
                                            <div class="col-md-6 option-input">
                                                <input type="text" name="optionA" placeholder="Option A" value="<?php echo $exm_name_data['option1']?>" required>
                                            </div>
                                            <!-- option B -->
                                            <div class="col-md-6 option-input">
                                                <input type="text" name="optionB" placeholder="Option B" value="<?php echo $exm_name_data['option2']?>" required>
                                            </div>
                                        </div>
                    
                                        <div class="row rw-cex">
                                            <!-- option C -->
                                            <div class="col-md-6 option-input">
                                                <input type="text" name="optionC" placeholder="Option C" value="<?php echo $exm_name_data['option3']?>" required>
                                            </div>
                                            <!-- option D -->
                                            <div class="col-md-6 option-input">
                                                <input type="text" name="optionD" placeholder="Option D" value="<?php echo $exm_name_data['option4']?>" required>
                                            </div>
                                        </div>
                                        <!-- option boxes end-->

                                        <!-- Choose correct answer start-->
                                        <div class="row px-3 py-3">
                                            <div class="col-md-8 ">
                                                <select name="correctoption" id="correctoption">
                                                    <option value="0"><?php echo $exm_name_data['correct_option']?></option>
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
                                                <a href="preview-question.php?exam_code=<?php echo $_GET['exam_code']?>&examname=<?php echo $exm_name_data['exam_name']; ?>&exam_type=<?php echo $exm_name_data['type']; ?>" id="preview-question" class="nav-item">Preview</a>
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
                                    $exam_name=mysqli_real_escape_string($con,$_POST['exam_name']);

                                    $created_on=date('Y-m-d H:i:s');

                                    if($correct_option=='1'){

                                         $c_op=mysqli_real_escape_string($con,$op1);
                                    }elseif($correct_option=='2'){

                                         $c_op=mysqli_real_escape_string($con,$op2);
                                    }elseif($correct_option=='3'){

                                         $c_op=mysqli_real_escape_string($con,$op3);
                                    }elseif($correct_option=='4'){

                                         $c_op=mysqli_real_escape_string($con,$op4);
                                    }elseif($correct_option=='0'){

                                        $c_op=$exm_name_data['correct_option'];
                                    }

                                    $query="UPDATE exam SET exam_name='$exam_name',Question='$question',option1='$op1',option2='$op2',option3='$op3',option4='$op4',correct_option='$c_op' WHERE id='$exam_code'";
                                    $output=mysqli_query($con,$query);

                                    if($output){
                                        redirect("preview-question.php?exam_code=".$_GET['exam_code']."&examname=".$exm_name_data['exam_name']."&exam_type=".$exm_name_data['type']);
                                    }
                                }
                            ?>
                        </div>

                        <!-- MCQ based Question modal box ends-->
                    <?php
                        }
                    ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
</html>