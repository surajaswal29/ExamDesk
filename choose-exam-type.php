<?php include "files.php"; ?> <!--file that contains all external code -->

<div class="container-fluid vh-100 student-main-wrap">
    <?php include "top-header.php"; ?> <!--top-header code file -->

        <div class="row">
            <?php include "sidebar.php"; ?> <!--sidebar code file -->
    
            <div class="col-md-10 student-home-section absolute-center">
                <section>
                    <div class="home-section-box-1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="sel-img">
                                    <img src="images/562.jpg" alt="select image">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="exam-type">
                                    <h1>Select Exam Type</h1>
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                        <Select name="chooseexam">
                                            <option value="Select exam type">Select exam type</option>
                                            <option value="MCQ">M.C.Q Based</option>
                                            <option value="Descriptive">Descriptive Based</option>
                                        </Select>
                                        <input type="submit" value="Next" name="next" class="exam-type-btn">
                                    </form>
                                    <?php
                                    if(isset($_POST['next'])){
                                        $examtype=$_POST['chooseexam'];
                                        // echo $ex_id=bin2hex(random_bytes('6'));
                                        $str=strtolower("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
                                        $alpha_code=substr(str_shuffle($str),0,3).'-'.substr(str_shuffle($str),0,4).'-'.substr(str_shuffle($str),0,3);

                                        if($examtype=='MCQ'){
                                            redirect("create-exam.php?mcq_based_exam_code=".$alpha_code);
                                        }else{
                                            redirect("descriptive-based.php?descriptive_based=".$alpha_code);
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="recent-all-exam">
                                    <h4>Recent Exams</h4>
                                    <?php
                                       $recent_exam_query="SELECT exam_id,exam_name,type FROM exam WHERE created_by='{$_SESSION['reg_id']}' 
                                                            UNION 
                                                            SELECT exam_code,exam_name,type FROM desc_exam WHERE created_by='{$_SESSION['reg_id']}' ORDER BY exam_name ASC";
                                        $recent_exam_result=mysqli_query($con,$recent_exam_query);

                                        if(mysqli_num_rows($recent_exam_result)>0){
                                    ?>
            
                                        <div class="ov-table" id="notify">
                                                <table class="table">
                                                     <tr>
                                                         <th>Exam Name</th>
                                                         <th>Exam code</th>
                                                         <th>Edit</th>
                                                         <th>Delete</th>
                                                     </tr>
                                                    <?php
                                                    while($recent_data=mysqli_fetch_assoc($recent_exam_result)){
                                                    ?>
                                                     <tr>
                                                         <td><?php echo $recent_data["exam_name"] ?></td>
                                                         <td><?php echo $recent_data["exam_id"] ?></td>
                                                         <td class="text-center"><?php 
                                                         if($recent_data["type"]=="mcq"){
                                                            echo '<a href="create-exam.php?mcq_based_exam_code='.$recent_data["exam_id"].'&type='.$recent_data["type"].'">
                                                                    <i class="far fa-edit"></i>
                                                                  </a>';
                                                         }else{
                                                            echo '<a href="descriptive-based.php?descriptive_based='.$recent_data["exam_id"].'&type='.$recent_data["type"].'">
                                                                    <i class="far fa-edit"></i>
                                                                 </a>';
                                                         }
                                                         ?></td>
                                                         <td class="text-center"><?php 
                                                         if($recent_data["type"]=="mcq"){
                                                            echo '<a href="delete-exam.php?mcq_based_exam_code='.$recent_data["exam_id"].'&type='.$recent_data["type"].'">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                  </a>';
                                                         }else{
                                                            echo '<a href="delete-exam.php?descriptive_based='.$recent_data["exam_id"].'&type='.$recent_data["type"].'">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                 </a>';
                                                         }
                                                         ?></td>
                                                     </tr>
                                                     <?php
                                                     }
                                                     ?>
                                                </table>
                                        </div>
                                    <?php
                                        }else{
                                            echo"No recent exams created";
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
</html>