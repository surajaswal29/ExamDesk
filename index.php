<?php
include "files.php"; //master file
include "config.php"; //database config file
?>

    <div class="container-fluid" id="main-div">
        <!-- Header start -->
        <header>
            <!-- top sticky header start -->
            <div class="row p-3 top-header">

                    <!-- Exam desk Online examination panel logo -->
                    <div class="col-md-4">
                        <a href="index.php" class="exam-logo">
                            <img src="images/logo-oes/xam.png" alt="Exam desk Online examination panel logo">
                        </a>
                    </div>

                    <!-- top navbar -->
                    <div class="col-md-8 top-navbar">
                        <nav class="nav-bar">
                            <a href="#services">Services</a>
                            <a href="#about">About us</a>
                            <a href="#contact">Contact us</a>
                        </nav>

                        <!-- login-register button -->
                        <div class="nav-bar">
                            <a href="#" id="login" class="user-lr"><i class="fas fa-sign-in-alt"></i>&nbsp;Login</a>
                            <a href="#" id="register" class="user-lr"><i class="fas fa-user-plus"></i>&nbsp;Register</a>
                        </div>
                    </div>
            </div>
            <!-- top sticky header end -->

            <!-- examdesk banner -->
            <div class="row sub-header">
                    <div class="col-md-5 mg-4">
                        <div class="banner-text">
                            <h1>Exam Desk</h1>
                            <p>A Robust Online Testing Platform For Conducting Remote Online Examinations</p>
                            <a href="#services" class="bg-grad">See more <i class="fas fa-arrow-alt-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-7 mg-4 absolute-center">
                        <img src="images/modern-infra.jpg" alt="">
                    </div>
            </div>
            <!-- exam desk banner end -->
        </header>
        <!-- header end -->

        <!-- feature card-section start-->
        <section>
            <div class="row card-section-1">
                <div class="col-md-12">
                    <h1>Experience Virtual Exams With Our Secure And Robust Online Examination System</h1>
                </div>
                <div class="col-md-12 space-around mt-5">
                    <div class="card-section shadow">
                        <img src="images/svg/Efficiency.svg" class="svg-card-img">
                        <h2>Fast & Optimized</h2>
                    </div>
                    <div class="card-section shadow">
                        <img src="images/svg/Remote-proctoring-1.svg" class="svg-card-img">
                        <h2>Online Invigilation & Proctoring</h2>
                    </div>
                    <div class="card-section shadow">
                        <img src="images/svg/Student-authentication-1.svg" class="svg-card-img">
                        <h2>Automatic Grading</h2>
                    </div>              
                </div>
                <div class="col-md-12 space-around mt-5">
                    <div class="card-section shadow">
                        <img src="images/svg/online-exam.svg" class="svg-card-img">
                        <h2>Take Exam Anytime, Anywhere</h2>
                    </div>
                    <div class="card-section shadow">
                        <img src="images/svg/result.svg" class="svg-card-img">
                        <h2>Real-time Results</h2>
                    </div>
                    <div class="card-section shadow">
                        <img src="images/svg/security.svg" class="svg-card-img">
                        <h2>Configure Online Exam</h2>
                    </div>  
                </div>
            </div>
        </section>
        <!--feature card section end -->

        <!-- main section start-->
        <main>
            <!-- exam desk about -->
            <div class="row about" id="about">
                <h1>About us</h1>
                <div class="about-wrap">
                    <div class="about-para">
                        <h1>Examination Made Easy.</h1>
                        <p><span>Exam Desk</span> is an online, cloud-based platform which allows instructors to conveniently create, share, administer, and evaluate exams.</p>
                        <p>In <span>Exam Desk</span> students can remotely attend their exam by any means i.e Mobile phones, Laptop, Desktop.
                        This doesn't offer just creating exam  and attending them, it offers many more features.</p>
                    </div>
                    <div class="about-image">
                        <img src="images/banner-image-1.jpg" alt="">
                    </div>
                </div>
            </div>

            <!-- service -->
            <div class="row services" id="services">
                <h1>What We Offer</h1>
                <p>We provide an Online-based Examination system to enrich the examination process for students, instructors, and institutions.</p>
                    <div class="row service-box mt-2">
                        <div class="sub-service-box shadow">
                            <div class="sub-service-image">
                                <img src="images/svg/New-Way.svg" alt="">
                            </div>
                            <h2>Online Examinations</h2>
                            <p>Exam Desk offers an extensive library of online examination tools which allows instructors to
                                administer complex online examinations at the touch of a button.</p>
                        </div>
                        <div class="sub-service-box shadow">
                            <div class="sub-service-image">
                                <img src="images/svg/Data-security.svg" alt="">
                            </div>
                            <h2>Security</h2>
                            <p>Exam Desk uses state-of-the-art security principles to ensure your institution's data is kept safe. 
                                Extensive measures are taken to reduce the possibility of cheating during examinations.</p>
                        </div>
                        <div class="sub-service-box shadow">
                            <div class="sub-service-image">
                                <img src="images/svg/quick-results.svg" alt="">
                            </div>
                            <h2>Analytics</h2>
                            <p>Exam Desk's analytics toolbox helps instructors establish a fine-grained connection
                                between assignments and examination results and assess changes to the curriculum.</p>
                        </div>
                    </div>
            </div>

            <!-- contact us -->
            <div class="row contact" id="contact">
                <h1>Contact Us</h1>
                <div class="contact-wrap">
                    <div class="contact-image">
                        <img src="images/contact-image.jpg" alt="">
                    </div>
                    <div class="contact-form">
                        <p>Want to get in touch with us?</p>
                        <form action="#">
                            <!-- c is the prefix here to ensure that the name given is for contact form -->
                            <input type="text" name="c_name" id="c_name" placeholder="Your name">
                            <input type="email" name="c_email" id="c_email" placeholder="Your email">
                            <textarea name="c_msg" id="c_msg" cols="30" rows="10" placeholder="Your Message here..."></textarea>
                            <input type="submit" value="Send" name="send" class="bg-grad">
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <!-- main section end -->

        <?php include "footer.php" ?>
    </div>

<!-- pop up login form start-->
<div class="dp-none" id="login-wrap">
    <div class="wrap-login-1">
        <div class="box-container">
            <div class="img-box">
            </div>
            <div class="form-wrap">
                <div class="top-signup">
                    <span>Don't you have an account?</span>
                    <a href="index.php" id="register" class="signup-btn">SIGN UP</a>
                </div>
                <div class="mid-container">
                    <h1>Welcome Back</h1>
                    <h6>Login your Account</h6>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" class="form">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="Username">Email/ Phone Number</label></br>
                                <input type="email" name="uname" placeholder="Your email or phone number" required> 
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="Password">Password</label></br>
                                <input type="password" name="pass" placeholder="Your password" required>
                            </div>
                        </div>
                        <div class="mt-1"><a href="forgot-pass.php?status=fgpass" class="fg-pass">Forgot password?</a></div>
                        <br>
                        <button type="submit" class="login-btn" name="loginbtn">Login</button>
                    </form>
                    <?php
                        if(isset($_POST['loginbtn'])){
                            $username=$_POST['uname'];
                            $password=$_POST['pass'];
                            
                            $sql="SELECT * FROM user WHERE email='$username' and password='$password'";
                            $result=mysqli_query($con,$sql);
                            $if_exist=mysqli_num_rows($result);
                                    
                            if($if_exist>0){
                                $data=mysqli_fetch_assoc($result);

                                $_SESSION['user_name']=$data['username'];
                                $_SESSION['email_id']=$data['email'];
                                $_SESSION['reg_id']=$data['reg_id'];
                                $_SESSION['role']=$data['role'];
                                
                                if($data['role']=='teacher'){
                                    redirect("teacher-dashboard.php?role=".$data['role']);

                                }elseif($data['role']=='student'){
                                    redirect("student-dashboard.php?role=".$data['role']);

                                }
                            }else{
                                echo"<p style='color:red; font-size:14px; margin-top:1rem;'>Error: login credential does not matches</p>";
                            }
                        }
                    ?>
                </div>
                <div class="login-with">
                    <span>Login with</span>
                    <a href="https://facebook.com/"><img src="images/login-images/fb.png" alt=""></a>
                    <a href=""><img src="images/login-images/google.png" alt=""></a>
                    <a href="https://twitter.com/"><img src="images/login-images/twitter.png" alt=""></a>
                    <a href="https://twitter.com/"><img src="images/login-images/linkedin.png" alt=""></a>
                </div>
            </div>
            <div class="cancel-btn d-flex justify-content-center align-items-start">
                <span class="fas fa-times-circle" id="cancel-btn"></span>
            </div>
        </div>
    </div>
</div>
<!-- pop up login form end-->

<!-- pop up register box start -->
<div class="dp-none" id="register-wrap">
    <div class="wrap-login-1">
        <div class="signup-form">
            <div class="register-img-box">
            </div>
            <div class="form-wrap">
                    <div class="top-signup">
                        <span>Already have an account?</span>
                        <a href="index.php" id="login" class="signup-btn">SIGN IN</a>
                    </div>
                    <div class="mid-reg-container">
                        <h2>Register Now</h2>
                        <p>Create, Share, administer and evaluate exams</p>
                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                            <input type="text" name="uname" id="uname" placeholder="Enter your name" required>
                            </br>
                            <input type="number" name="mob" id="mob" placeholder="Enter mobile number" required>
                            </br>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                                </div>
                                <div class="col-md-6">
                                    <select name="role" id="role" name="role" required>
                                        <option value="">Select your role</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="student">Student</option>
                                    </select>
                                </div>
                            </div>
                            <input type="text" name="institute" id="institute" placeholder="Enter School/College Name (Optional)">
                            <input type="submit" value="Submit" name="submit" class="bg-grad">
                        </form>
                    </div>
                    <div class="login-with">
                        <span>Signup with</span>
                        <a href="https://facebook.com/"><img src="images/login-images/fb.png" alt=""></a>
                        <a href=""><img src="images/login-images/google.png" alt=""></a>
                        <a href="https://twitter.com/"><img src="images/login-images/twitter.png" alt=""></a>
                        <a href="https://twitter.com/"><img src="images/login-images/linkedin.png" alt=""></a>
                    </div>
            </div>
            <div class="cancel-btn d-flex justify-content-center align-items-start">
                <span class="fas fa-times-circle" id="reg-cancel-btn"></span>
            </div>
                    <?php

                        if(isset($_POST['submit'])){
                            $reg_id="ED".strval(date("Y").rand(100,999));
                            $full_name=$_POST["uname"];
                            $phone=$_POST["mob"];
                            $email=$_POST["email"];
                            $role=$_POST['role'];
                            $institute=$_POST['institute'];
                            $date=date("Y-m-d");

                            // email verification
                            $token=bin2hex(random_bytes("12"));
                            $msg_body="
                            <div style='width:100%; display:flex; justify-content:center; align-items:center;'>
                                <div style='background:#fff; border:1px solid #f7f7f7; padding: 30px;'>
                                    <div style='display: flex; align-items:center; padding: 10px;'>
                                        <img src='https://ik.imagekit.io/sweetgrapes2912/OES/xam_Xmp6NmO4Mo.png?updatedAt=1629602651424'>
                                    </div>
                                    <div style='background: #e0e0e0; padding: 10px; font-family: open sans;'>
                                        <h2>Dear ".$full_name."</h2>
                                        <p>You have registered in Exam Desk </p>
                                        <p>Please Click on this link to verify your email address</p>
                                        <a href='http://localhost/oes/email-verification.php?token_id=".$token."&status=1' style='text-decoration: none; padding:4px 10px; background: #9a3bc7; border-radius:5px; color:#fff;'>Click Here</a>
                                        <h4>Thanks & Regards</h4>
                                    </div>
                                    <div style='background: #242424;padding: 10px; color:#fff; font-family: open sans;'>
                                        <p style='font-size: 12px;'>DISCLAIMER: YOU ARE RECEIVING THIS EMAIL BECAUSE YOU HAVE REGISTERED IN EXAM DESK- ONLINE EXAMINATION SYSTEM</p>
                                        <p style='font-size: 10px;'>This is a system generated email. Please do not reply to this.</p>
                                    </div>
                                </div>
                            </div>
                                ";
                            $from_email="MIME-Version: 1.0" . "\r\n";
                            $from_email .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                            $from_email.="From: surajaswal29@gmail.com";

                            if(mail($email,"Exam Desk: Verification Email",$msg_body,$from_email)){
                                // inserting data into database(ExamDesk)
                                $query="INSERT INTO user(reg_id,username,phone,email,role,institute,password,token,status,date) 
                                VALUES('$reg_id','$full_name','$phone','$email','$role','$institute','$password','$token','pending','$date')";
                                $result=mysqli_query($con,$query);

                                if($result){
                                    redirect("email-verification.php?status=0");
                                }

                            }else{
                                echo"Not sent or check your email address";
                            }
                        }
                    ?>
        </div>
    </div>
</div>
<!-- pop up register box end -->

<!-- chatbot code start-->
<div class="dp-none" id="msg-wrap">
    <span>Hello, I'm Suraj</span></br>
    <span>Need any help?</span></br>
    <span>FAQ</span></br>
    <span class='contact-chatbot'>Q. How to Signup in Exam Desk?</span></br>
    <span class='contact-chatbot'>Q. Can i have Multiple Account?</span>
</div>
<div class="chat-bot" id="bot-btn">
</div>
<!-- chatbot code end-->

<!-- index page end -->
</body>
</html>