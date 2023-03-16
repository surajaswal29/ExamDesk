<?php include "files.php"; ?> <!--file that contains all external code -->

<div class="container-fluid vh-100 student-main-wrap">
    <?php include "top-header.php"; ?> <!--top-header code file -->

        <div class="row">
            <?php include "sidebar.php"; ?> <!--sidebar code file -->

            <div class="col-md-10 student-home-section">
               <section class="p-4 absolute-center">
                   <div class="edit-profile-wrap">
                       <?php

                       $query="SELECT * FROM user WHERE email='{$_SESSION['email_id']}'";
                       $output=mysqli_query($con,$query);

                       if($output){
                           $data=mysqli_fetch_assoc($output);
                       }
                       ?>
                           <div class="row ">
                               <div class="col-md-2">
                                    <div class="profile-card-img">
                                    <?php
                                    if(empty($data['image'])){
                                        
                                        if($data['role']=='teacher'){
                                            echo'<img src="images/teacher-img.jpg" alt="Profile Picture" class="img">&nbsp;';
                                        }else{
                                            echo'<img src="images/student-img.jpg" alt="Profile Picture" class="img-1">&nbsp;';
                                        }
                                    }else{
                                        echo'<img src="images/uploaded_images/'.$data["image"].'" alt="profile image" class="img-1">&nbsp;';
                                    }
                                    ?>
                                    </div>
                               </div>
                               <div class="col-md-5">
                                    <div class="profile-details">
                                        <h2><?php echo $data['username'] ?></h2>
                                        <h6>Reg id: <?php echo $data['reg_id'] ?></h6>
                                        <h6>Phone: <?php echo $data['phone'] ?></h6>
                                        <h6>Email: <?php echo $data['email'] ?></h6>
                                    </div>
                               </div>
                               <div class="col-md-5 image-upload">
                                   <form action="#" method="post" enctype="multipart/form-data">
                                       <label for="images">Change Profile Photo</label>
                                       <input type="file" name="image" id="image">
                                       <button type="submit" name="upload" class="img-up-btn"><i class="fas fa-upload"></i> Upload</button>
                                   </form>
                                   <!-- image uploading script -->
                                   <?php
                                        if(isset($_POST['upload'])){

                                            $image_name=$_FILES['image']['name'];
                                            $temp_name=$_FILES['image']['tmp_name'];

                                            $ar1= explode('.',$image_name);  //creating array from image name
                                            $actual_image_name= $ar1[0].date('His').'.'.$ar1[1];  //adding timestamp to image name

                                            $destination="images/uploaded_images/".$actual_image_name;

                                            if(move_uploaded_file($temp_name,$destination)){
                                                // update image name in database
                                                $query2="UPDATE user SET image='$actual_image_name' WHERE reg_id='{$data['reg_id']}'";
                                                $output2=mysqli_query($con,$query2);

                                                if($output2){
                                                    redirect("edit-profile.php");
                                                }
                                            }
                                        }
                                   ?>
                               </div>
                           </div>
                        <form action="#" method="post">
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <label for="username">Username</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="uname" value="<?php echo $data['username'] ?>">
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <label for="Phone">Phone</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="phone" value="<?php echo $data['phone'] ?>">
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <label for="Email">Email</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="email" value="<?php echo $data['email'] ?>">
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <label for="Institute">Institute</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="institute" value="<?php echo $data['institute'] ?>">
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-4 offset-md-2">
                                    <button type="submit" name="save" class="btn-up-save">Save</button>
                                </div>
                            </div>
                            <?php

                                if(isset($_POST['save'])){
                                    $username=$_POST['uname'];
                                    $phone=$_POST['phone'];
                                    $email=$_POST['email'];
                                    $institute=$_POST['institute'];

                                    $query1="UPDATE user SET username='$username', phone='$phone', email='$email',institute='$institute' WHERE reg_id='{$data['reg_id']}'";
                                    $output1=mysqli_query($con,$query1);

                                    if($output1){
                                        redirect("edit-profile.php");
                                    }
                                }
                            ?>
                       </form>
                   </div>
               </section>
            </div>
        </div>
    </div>
</body>
</html>