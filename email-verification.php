<?php 

include "files.php";
$token=$_GET['token_id'];

?>

<div class="container-fluid verify-email">
    <div class="row absolute-center mt-4">
        <?php
         include "config.php";

         $select_password="SELECT * FROM user WHERE token='$token'"; //getting password field
         $result_password=mysqli_query($con,$select_password);
         $password_row=mysqli_fetch_assoc($result_password);

         if(isset($token)&&empty($password_row['password'])){
            //  checking if token id is set and password field is empty
        ?>
        
        <div class="col-md-6 email-v p-3 create-pass mt-5">
            <h1>Set your password</h1>
            <form action="#" method="POST">
                <div class="row mt-4">
                    <div class="col-md-6">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" name="cpassword" id="cpassword" class="form-control">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <ul>
                            <li>Password must contain atleast one Uppercase character, one Lowercase character, Numbers(0-9) and @ </li>
                            <li>Passwords must be at least 8 characters in length, but can be much longer. </li>
                        </ul>
                    </div>
                    <div class="col-md-5">
                        <input type="submit" value="Submit" name="submit" class="btn bg-grad-green text-light">
                    </div>
                </div>
                <?php
                    if(isset($_POST["submit"])){

                        $pass=mysqli_real_escape_string($con,$_POST['password']);
                        $cpass=mysqli_real_escape_string($con,$_POST['cpassword']);

                        if(strlen($pass)>=8){
                            if($pass == $cpass){

                                $query="UPDATE `user` SET `password` = '$pass',status='verified' WHERE user.token='$token'";
                                $output=mysqli_query($con,$query);

                                if($output){
                                    redirect("index.php");
                                }
                            }else{
                                echo"<p style='color:red; font-size:14px; margin-top:1rem;'>Error: Passwords does not match</p>";
                            }
                        }else{
                            echo"<p style='color:red; font-size:14px; margin-top:1rem;'>Error: Passwords must be at least 8 characters in length</p>";
                        }
                    }
                ?>
            </form>
        </div>

        <?php
         }elseif(isset($token)&&isset($password_row['password'])){
             //  checking if token id is set and password field is set
        ?>
            <div class="col-md-10 email-v absolute-center mt-5 py-3">
                <div class="col-md-8">
                    <h1><i class="fas fa-user-check"></i> It looks like you're already Verified</h1>
                </div>
            </div>
        <?php
         }else{
            //  if nothing is set
        ?>
            <div class="col-md-10 email-v absolute-center mt-5">
                <div class="col-md-4 p-3">
                    <div class="email-v-img">
                        <img src="images/email-v.jpg" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-8 p-3">
                    <h1>Almost done...</h1>
                    <h4>Please click on the link that has just been sent to your email account to verify your email and continue the registration process.</h4>
                </div>
            </div>
        <?php
         }
        ?>
    </div>   

    <?php include "footer.php"; ?> 
</div>
</body>
</html>