<?php include "files.php"; ?>
<div class="container-fluid vh-100 absolute-center bg-grad">
    <div class="row">
        <div class="col-md-12">
                <div class="forgot-pass-wrap border">
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="email" class="forget-pass">Enter Your Registered Email Address</label><br>
                                <input type="email" name="fgemail" placeholder="Enter your registered email id" class="form-control mt-3">
                                <input type="submit" value="Proceed" name="proceed" class="btn bg-grad-1 text-light mt-3">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <?php
                                if(!empty($_GET['status']=='sent')){
                                    echo"<p class='text-success'>Your Password has been sent to your email account Kindly Check your Inbox or in some cases check spam box</p>";
                                }else{
                                    echo"<p class='text-danger'>Enter your registered email address here we will send your password to your email account.</p>";
                                }
                                ?>
                            </div>
                        </div>
                    </form>

                    <?php
                        if(isset($_POST['proceed'])){
                            include "config.php";

                            $femail=$_POST['fgemail'];

                            $fquery="SELECT * FROM user WHERE email='$femail'";
                            $fresult=mysqli_query($con,$fquery);

                                if(mysqli_num_rows($fresult)>0){

                                    $fetch_pass=mysqli_fetch_assoc($fresult);
                                    $from="From: surajaswal29@gmail.com";
                                    $msg="It looks like you've forget your password: Password=".$fetch_pass['password'];
                                    
                                    if(mail($femail,'Forgot Password',$msg,$from)){
                                        redirect("forgot-pass.php?status=sent");
                                    }
                                }
                        }
                    ?>
                </div>
        </div>
    </div>
</div>
</body>
</html>