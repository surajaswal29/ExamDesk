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
                            <div class="col-md-12">
                                <h1>Exam Schedules</h1>
                            </div>
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
                            if($_SESSION['role']=='teacher'){
                                $select_schedule1="SELECT * FROM exam_schedule WHERE reg_id='{$_SESSION['reg_id']}'";
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
                            }elseif($_SESSION['role']=='student'){
                                $select_schedule1="SELECT * FROM exam_schedule";
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