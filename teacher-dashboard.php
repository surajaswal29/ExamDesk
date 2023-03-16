<?php include "files.php"; ?> <!--file that contains all external code -->

<div class="container-fluid vh-100 student-main-wrap">
    <?php include "top-header.php"; ?> <!--top-header code file -->

        <div class="row">
            <?php include "sidebar.php"; ?> <!--sidebar code file -->

            <div class="col-md-10 student-home-section">
                <section>
                    <div class="home-section-box space-around mt-3">
                        <!-- create exam -->
                       <div class="exam-item">
                            <h2>Create Exam</h2>
                            <h5>MCQ Based or Descriptive type</h5>
                            <a href="choose-exam-type.php" class="enter-btn mt-4 bg-grad-1"><i class="fas fa-plus-circle"></i> Create</a>
                       </div>
                        <!-- report -->
                        <div class="exam-item">
                            <h2>Reports <sup style='font-size:11px; color:red;'>Beta</sup></h2>
                            <h5>View Student Report</h5>
                            <a href="reports.php" class="enter-btn mt-4 bg-grad-1">Proceed</a>
                        </div>
                        <!-- exam schedule -->
                        <div class="exam-item">
                            <h2>Exam Schedules</h2>
                            <h5>Create Exam Schedules</h5>
                            <a href="exam-schedules.php?role=teacher" class="enter-btn mt-4 bg-grad-1"><i class="fas fa-plus-circle"></i> Create</a>
                        </div>
                        <!-- create virtual classroom -->
                        <div class="exam-item-schedule teacher-item-schedule">
                            <h1>Create a Virtual Classroom <sup style='font-size:11px; color:red;'>Beta</sup></h1>
                            <h5>Ask your students to register on ExamDesk and then ask for student's RegID</h5>
                            <div class="row">
                                <div class="col-md-12 teacher-item-schedule">
                                    <form action="#" method="" class="d-flex">
                                        <input type="text" name="cname" id="cname" placeholder="Enter class name">
                                        <input type="submit" value="Save" class="bg-grad-1">
                                    </form>
                                </div>
                           </div>
                           <div class="row mt-1">
                               <div class="col-md-12 class-img">
                                    <img src="images/6663.jpg" alt="">
                               </div>
                           </div>
                          
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
                                                echo "<li><span>".$data_notify['type']."</span>: ". $data_notify['description']." <a href='exam-schedules-view.php' class='badge bg-grad '>view</a></li>";
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
                            <div class="profile-card-img absolute-center mt-4">
                                <?php
                                    if(empty($profile_data['image'])){
                                        echo'<img src="images/teacher-img.jpg" alt="profile image" class="img-1">';
                                    }else{
                                        echo'<img src="images/uploaded_images/'.$profile_data["image"].'" class="img">';
                                    }
                                ?>
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