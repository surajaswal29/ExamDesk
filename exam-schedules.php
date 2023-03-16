<?php include "files.php"; 
  $exam_code=$_GET['role']; ##getting exam id
  if(isset($_GET['examin_code']) & isset($_GET['examin_name'])){
    $e_code=$_GET['examin_code'];
    $e_name=$_GET['examin_name'];
  }else{
    $e_code=0;
    $e_name=0;
  }
?> <!--file that contains all external code -->

<div class="container-fluid vh-100 student-main-wrap">
    <?php include "top-header.php"; ?> <!--top-header code file -->

        <div class="row">
            <?php include "sidebar.php"; ?> <!--sidebar code file -->
            <!-- main section -->
            <div class="col-md-10 student-home-section">
                <section class="schedule-wrap">
                    <div class="schedule-heading">
                        <div class="row">
                            <?php
                                $select_schedule="SELECT * FROM exam_schedule WHERE reg_id='{$_SESSION['reg_id']}'AND examination_code='$e_code'";
                                $select_schedule_result=mysqli_query($con,$select_schedule);

                                if(mysqli_num_rows($select_schedule_result)>0){
                                    $examin_data=mysqli_fetch_assoc($select_schedule_result);
                                
                                    if($e_code==$examin_data['examination_code']){
                            ?>
                            <div class="col-md-12">
                                <h1><?php echo $_GET['examin_name'] ?></h1>
                            </div>
                            <?php
                                    }
                            }else{
                            ?>
                                    <div class='col-md-6'>
                                        <h1>Create Exam Schedules</h1>
                                    </div>
                                    <div class="col-md-6 examination-name absolute-center">
                                        <form action="#" method="post">
                                            <input type="text" name="examination_name" id="examination_name" placeholder="Enter Examination Name">
                                            <input type="submit" name="esave" value="save" class="btn bg-grad-1 bnt-exm-sch">
                                        </form>
                                        <?php
                                            if(isset($_POST['esave'])){
                                                $examin_name=$_POST['examination_name'];
                                                $examin_code="EXAM".rand(999,9999);
                                                $date=date("y-m-d");

                                                $examin_sql="INSERT INTO exam_schedule(examination_name,examination_code,reg_id,date,day,time_from,time_to,exam_name,date_created) 
                                                VALUES('$examin_name','$examin_code','{$_SESSION['reg_id']}','0','0','0','0','0','$date')";
                                                $examin_result=mysqli_query($con,$examin_sql);
                                                
                                                if($examin_result){
                                                    redirect("exam-schedules.php?role=teacher&examin_name=".$examin_name."&examin_code=".$examin_code);
                                                }
                                        }
                                        ?>
                                    </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="schedule-details">
                        <table class="table table-bordered table-striped">
                            <tr class="bg-grad-1">
                                <th><i class="far fa-calendar-alt"></i> Examination</th>
                                <th><i class="far fa-calendar-alt"></i> Date</th>
                                <th><i class="far fa-calendar-alt"></i> Day</th>
                                <th><i class="fas fa-hourglass-start"></i> Time</th>
                                <th><i class="fas fa-book"></i> Exam Name</th>
                                <th>Action</th>
                            </tr>
                            <?php
                                $select_schedule1="SELECT * FROM exam_schedule WHERE reg_id='{$_SESSION['reg_id']}' AND examination_code='$e_code' AND date!='0'";
                                $select_schedule_result1=mysqli_query($con,$select_schedule1);

                                if(mysqli_num_rows($select_schedule_result1)>0){
                                    while($schedule_data=mysqli_fetch_assoc($select_schedule_result1)){
                                        echo"
                                        <tr>
                                            <td>".$schedule_data['examination_name']."</td>
                                            <td>".$schedule_data['date']."</td>
                                            <td>".$schedule_data['day']."</td>
                                            <td>".$schedule_data['time_from']." - ".$schedule_data['time_to']."</td>
                                            <td>".$schedule_data['exam_name']."</td>
                                            <td><i class='fas fa-edit'></i> | <i class='fas fa-trash-alt'></i></td>
                                        </tr>
                                        ";
                                    }

                                }
                            ?>
                            <tr>
                                <form action="#" method="post">
                                    <td><input type="date" name="exam_date" id="exam_date" required></td>
                                    <td>
                                        <select name="exam_day" id="exam_day" required>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="time" id="exam_time" name="exam_time1" min="07:00" max="18:00" required>
                                        &nbsp;
                                        to
                                        &nbsp;
                                        <input type="time" id="exam_time" name="exam_time2" min="07:00" max="18:00" required>
                                    </td>
                                    <td><input type="text" name="exam_name" id="exam_name" placeholder="Exam Name"></td>
                                    <td class="border-0">
                                        <button type="submit" name="save" class="btn bg-grad-1 text-light">Save</button>
                                    </td>
                                </form>
                            </tr>
                            <tr>
                                <td>
                                    <form action="#" method="post">
                                        <button type="submit" name="notification" class="btn bg-grad-1 text-light">Notify Student</button>
                                    </form>
                                </td>
                                <td colspan="4">
                                    <p class="mt-2">Note: Before Notifying Student make sure that you've uplaoded complete datesheet</p>
                                </td>
                            </tr>
                            <?php
                                if(isset($_POST['save'])){
                                    
                                    $e_date=$_POST['exam_date'];
                                    $e_day=$_POST['exam_day'];
                                    $e_time1=$_POST['exam_time1'];
                                    $e_time2=$_POST['exam_time2'];
                                    $e_name=$_POST['exam_name'];
                                    $date_created=date("y-m-d");

                                    $check_query="SELECT * FROM exam_schedule WHERE reg_id='{$_SESSION['reg_id']}' AND examination_code='{$_GET['examin_code']}'";
                                    $check_query_result=mysqli_query($con,$check_query);

                                    if(mysqli_num_rows($check_query_result)>0){
                                        $check_query_data=mysqli_fetch_assoc($check_query_result);

                                        if($check_query_data['date']==0){
                                            $exam_schedule="UPDATE exam_schedule SET date='$e_date',day='$e_day',time_from='$e_time1',time_to='$e_time2',exam_name='$e_name'
                                                    WHERE examination_code='$e_code'";
                                            $exam_schedule_result=mysqli_query($con,$exam_schedule);

                                            if($exam_schedule_result){
                                                redirect("exam-schedules.php?role=teacher&examin_name=".$_GET['examin_name']."&examin_code=".$_GET['examin_code']);
                                            }
                                        }else{
                                            $exam_schedule1="INSERT INTO exam_schedule(examination_name,examination_code,reg_id,date,day,time_from,time_to,exam_name,date_created) 
                                            VALUES('{$_GET['examin_name']}','{$_GET['examin_code']}','{$_SESSION['reg_id']}','$e_date','$e_day','$e_time1','$e_time2','$e_name','$date_created')";
                                            $exam_schedule_result1=mysqli_query($con,$exam_schedule1);

                                            if($exam_schedule_result1){
                                                redirect("exam-schedules.php?role=teacher&examin_name=".$_GET['examin_name']."&examin_code=".$_GET['examin_code']);
                                            }
                                        }
                                    }
                                }

                                if(isset($_POST['notification'])){
                                    $type="Exam schedule";
                                    $description="Datesheet Uploaded for:".$e_name;
                                    $date=date("y-m-d");

                                    $notify="INSERT INTO notification(type,description,date) VALUES('$type','$description','$date')";
                                    $notify_query=mysqli_query($con,$notify);

                                    if($notify_query){
                                        echo'<script>alert("Notification Updated")</script>';
                                    }
                                }
                            ?>
                        </table>
                    </div>
                </section>
            </div>
        </div>
</div>
</body>
</html>