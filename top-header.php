    <div class="row">
        <div class="col-md-6">
            <nav class="student-top-navbar">
                <div class="dashboard-logo">
                    <img src="images/logo-oes/xam.png" alt="Exam Desk logo">
                </div>
                <div class="bread absolute-center">
                    <h1 class="text-color">
                        <!-- dynamically change file name -->
                        <?php
                            $full_filename=basename($_SERVER['PHP_SELF']);
                            $filename=str_replace('.php','',$full_filename);
                            $final_filename=str_replace('-',' ',$filename);
                            echo ucwords($final_filename);
                        ?>
                    </h1>
                </div>
            </nav>
        </div>
        <div class="col-md-6">
           <nav class="student-top-navbar justify-content-end position-relative">
                <div class="profile-date">
                    <span class="text-color" ><i class="far fa-calendar-alt"></i>&nbsp;<span id="profile-date"></span>&nbsp;|&nbsp;<i class="far fa-clock"></i>&nbsp;<span id="live-time"></span></span>
                </div>
                <div class="profile-nav" >
                    <!-- setting user profile pic -->
                    <?php
                        include "config.php";

                        $select_image="SELECT * FROM user WHERE email='{$_SESSION['email_id']}'";
                        $image_output=mysqli_query($con,$select_image);

                        if(mysqli_num_rows($image_output)>0){

                            $data_image=mysqli_fetch_assoc($image_output);
                            if(empty($data_image['image'])){
                               
                                if($data_image['role']=='teacher'){
                                    echo'<img src="images/teacher-img.jpg" alt="Profile Picture" class="img-fluid">&nbsp;';
                                }else{
                                    echo'<img src="images/student-img.jpg" alt="Profile Picture" class="img-fluid">&nbsp;';
                                }
                            }else{
                                echo'<img src="images/uploaded_images/'.$data_image["image"].'" alt="Profile Picture" class="img-fluid border">&nbsp;';
                            }
                        }
                    ?>
                    <span> 
                        <?php 
                          if(isset($_SESSION['user_name'])){
                              //  username 
                              echo $_SESSION['user_name'];
                            }else{
                                redirect("index.php");
                            } 
                        ?> 
                    </span>
                    <i class="fas fa-angle-down" id="profile-angle-down"></i>
                    <div class="dp-none" id="logout-dropdown">
                        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </div>
                </div>
                <div class="profile-search">
                    <div class="dp-none" id="search-box">
                        <form action="#" method="post">
                            <input type="search" name="p_search" id="p_search" placeholder="Search here...">
                        </form>
                    </div>
                    <i class="fas fa-search" id="profile-search"></i>
                </div>
           </nav>
        </div>
    </div>