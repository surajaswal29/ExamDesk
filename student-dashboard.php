<?php include "files.php"; ?> <!--file that contains all external code -->

<div class="container-fluid vh-100 student-main-wrap">
    <?php include "top-header.php"; ?> <!--top-header code file -->

        <div class="row">
            <?php include "sidebar.php"; ?> <!--sidebar code file -->
            <div class="col-md-10 student-home-section">
                <section>
                    <div class="home-section-box mt-3 space-around">

                        <!-- join exam -->
                       <div class="exam-item">
                            <h2>Join Exam Now</h2>
                            <h5>Enter or paste code below to join exam</h5>
                            <form action="#" class="mt-3" method="post" autocomplete="off">
                                <input type="text" name="j_code" id="j_code" placeholder="Enter or paste code here">
                                <input type="submit" value="Join" name="join" class="bg-grad-1">
                                <?php

                                if(isset($_POST['join'])){
                                    $paper_code=$_POST['j_code'];
                                    $paper_query="SELECT * FROM exam WHERE exam_id='$paper_code'";
                                    $paper_result=mysqli_query($con,$paper_query);

                                    // MCQ based question
                                    if(mysqli_num_rows($paper_result)>0){
                                        $type=mysqli_fetch_assoc($paper_result);
                                        redirect("main-exam.php?exam_code=".$paper_code."&exam_type=".$type['type']);
                                    }else{
                                        // descriptive based question
                                        $paper_query1="SELECT * FROM desc_exam WHERE exam_code='$paper_code'";
                                        $paper_result1=mysqli_query($con,$paper_query1);
                                       
                                        if(mysqli_num_rows($paper_result1)>0){
                                            $type1=mysqli_fetch_assoc($paper_result1);
                                            redirect("main-exam.php?exam_code=".$paper_code."&exam_type=".$type1['type']);
                                        }else{
                                            echo'<script>alert("No exam found with this code")</script>';
                                        }
                                    }
                                }
                                ?>
                            </form>
                       </div>

                        <!--mock test  -->
                        <div class="exam-item">
                            <h2>Mock Tests</h2>
                            <h5>Mock Test is to familiarize the students about processes of Computer Based Test (CBT).</h5>
                            <a href="mock-test.php?exam_code=mock-test" class="enter-btn mt-4 bg-grad-1">Mock Test</a>
                        </div>

                        <!--studdy buddy  -->
                        <div class="exam-item">
                            <h2>Study Buddy <sup style='font-size:11px; color:red;'>Beta</sup></h2>
                            <h5>Invite your friends to join on Exam Desk & Prepare for exam together</h5>
                            <form action="#" method="post" class="mt-3 s-buddy">
                                <input type="text" name="s_buddy" id="s_buddy" placeholder="Enter Reg Id of your friend here">
                                <input type="submit" value="Add" class="enter-btn m-0 bg-grad-1 w-sbuddy">
                            </form>
                        </div>

                        <!-- exam schedule -->
                        <div class="exam-item-schedule">
                            <h1>Exam Schedules <sup style='font-size:11px; color:red;'>Beta</sup></h1>
                            <table class="table table-bordered mt-3 border-secondary">
                                <tr>
                                    <th>Date</th>
                                    <th>Exam</th>
                                </tr>
                                <?php
                                 $sql_exm="SELECT DISTINCT examination_name,date FROM exam_schedule";
                                 $sql_rslt=mysqli_query($con,$sql_exm);

                                 if(mysqli_num_rows($sql_rslt)>0){
                                    while($sql_data=mysqli_fetch_assoc($sql_rslt)){
                                        echo"
                                            <tr>
                                                <td>".$sql_data['date']."</td>
                                                <td>".$sql_data['examination_name']."</td>
                                            </tr>
                                        ";
                                    }
                                 }
                                ?>
                            </table>
                        </div>

                        <!-- notification -->
                        <div class="exam-item-notify">
                            <h1>Notifications</h1>
                            <div class="notify-box mt-3">
                                <ul id="notify">
                                    <?php
                                        $notify_query="SELECT * FROM notification";
                                        $notify_query_result=mysqli_query($con,$notify_query);

                                        if(mysqli_num_rows($notify_query_result)>0){
                                            while($data_notify=mysqli_fetch_assoc($notify_query_result)){
                                    ?>
                                            <li>
                                                <span> <?php echo $data_notify['type'] ?></span>: <?php echo $data_notify['description']?>
                                               <?php
                                                if($data_notify['type']=='Exam Desk'){
                                                    echo"<a href='update.php' class='badge bg-grad'>Info</a>";

                                                }elseif($data_notify['type']=='Exam schedule'){
                                                    echo"<a href='exam-schedules-view.php?role=".$_SESSION['role']."' class='badge bg-grad'>view</a>";

                                                }else{
                                                    echo"<a href='exam-schedules-view.php?role=".$_SESSION['role']."' class='badge bg-grad'></a>";
                                                }
                                                ?>
                                            </li>
                                    <?php
                                            }
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        
                        <!-- profile edit -->
                        <div class="exam-item-notify">
                            <!-- <h1>Profile Card</h1> -->
                            <!-- <i class="fas fa-print"></i> -->
                            <?php
                                $profile_detail="SELECT * FROM user WHERE email='{$_SESSION['email_id']}'";
                                $profile_output=mysqli_query($con,$profile_detail);

                                if(mysqli_num_rows($profile_output)>0){
                                    $profile_data=mysqli_fetch_assoc($profile_output);
                                }
                            ?>
                            <div class="profile-card-img-st absolute-center mt-4">
                                <img src="images/uploaded_images/<?php echo $profile_data['image'] ?>" alt="profile image" class="img-1 border">
                            </div>
                            <div class="profile-details mt-3">
                                <h2><?php echo $profile_data['username']; ?></h2>
                                <h6>Reg id: <?php echo $profile_data['reg_id']; ?></h6>
                                <h6>Phone: <?php echo $profile_data['phone']; ?></h6>
                                <h6>Email: <?php echo $profile_data['email']; ?></h6>
                                <a href="edit-profile.php?edit_id=<?php echo $profile_data['id']; ?>" class="bg-grad-1">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
</html>