<?php 

include "files.php"; 
$exam_id= $_GET['descriptive_based'];
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
                            <li class="breadcrumb-item mb-0 active" aria-current="page">Descriptive Based</li>
                        </ol>
                    </nav>
                </div>
                <section class="p-1 absolute-center">
                <div class="home-section-box absolute-center">
                        <!-- descriptive based Question modal box start-->

                        <div class="create-exam-wrap descriptive-based-wrap">
                            <form action="#" method="POST" autocomplete="off" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="row exam-name px-4">
                                            <?php
                                                $exm_name_query="SELECT * FROM desc_exam WHERE exam_code='$exam_id'";
                                                $exm_name_result=mysqli_query($con,$exm_name_query);

                                                $exm_name_data=mysqli_fetch_assoc($exm_name_result);
                                                if(isset($exm_name_data['exam_name'])){
                                                    echo"<div class='col-md-12'><h3>Exam Name: ".$exm_name_data['exam_name']."</h3></div>";
                                                }else{
                                            ?>
                                            
                                            <div class="col-md-3">
                                                <label for="examname">Exam Name</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" name="exam_name" id="exam_name" placeholder="Enter exam name here">
                                            </div>
                                            
                                            <?php
                                                }
                                            ?>
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
                                        <textarea name="question" id="question" placeholder="Enter question here" required></textarea>

                                        <!-- code & diagram -->
                                        <div class="row rw-cex">
                                            <!-- code -->
                                            <div class="col-md-6 descriptive-input">
                                                <label for="code"><h5>Code box</h5></label>
                                                <textarea name="codesnippet" id="codesnippet" placeholder="// Only for Computer Science Questions"></textarea>
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
                                                <a href="preview-question.php?exam_code=<?php echo $exam_id?>&examname=<?php echo $exm_name_data['exam_name']; ?>&exam_type=<?php echo $exm_name_data['type']?>" id="preview-question" class="nav-item">Preview</a>
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

                                    if(isset($exm_name_data['exam_name'])){
                                        $exam_name=$exm_name_data['exam_name'];
                                    }else{
                                        $exam_name=mysqli_real_escape_string($con,$_POST['exam_name']);
                                    }

                                    if($_FILES['diagram']['size'] != 0){
                                        $image_name=$_FILES['diagram']['name'];
                                        $temp_name=$_FILES['diagram']['tmp_name'];

                                        $ar1= explode('.',$image_name);  //creating array from image name
                                        $actual_image_name= $ar1[0].date('His').'.'.$ar1[1];  //adding timestamp to image name

                                        $destination="images/uploaded_images/des_ques/".$actual_image_name;

                                        if(move_uploaded_file($temp_name,$destination)){
                                            // update image name in database
                                            $query2="INSERT INTO desc_exam(type,exam_code,created_by,exam_name,Question,code,diagram,date) 
                                            VALUES('des','$exam_id','{$_SESSION['reg_id']}','$exam_name','$question','$code','$actual_image_name','$created_on')";
                                            $output2=mysqli_query($con,$query2);
    
                                            if($output2){
                                                redirect("descriptive-based.php?descriptive_based=".$exam_id);
                                            }
                                        }
                                    }else{
                                        $query="INSERT INTO desc_exam(type,exam_code,created_by,exam_name,Question,code,diagram,date) 
                                        VALUES('des','$exam_id','{$_SESSION['reg_id']}','$exam_name','$question','$code','$actual_image_name','$created_on')";
                                        $output=mysqli_query($con,$query);

                                        if($output){
                                            redirect("descriptive-based.php?descriptive_based=".$exam_id);
                                        }
                                    }
                                }
                            ?>
                        </div>

                        <!-- descriptive based Question modal box ends-->
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
</html>