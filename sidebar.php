<div class="col-md-1 student-sidebar">
    <ul class="list-unstyled mt-1">
        <li class="nav-item text-light py-3 px-3">
            <?php
            if($_SESSION['role']=='student'){

                echo'<a href="student-dashboard.php"><i class="fas fa-home"></i> Home</a>';
            }elseif($_SESSION['role']=='teacher'){

                echo'<a href="teacher-dashboard.php"><i class="fas fa-home"></i> Home</a>';
            }
            ?>
        </li>
        <li class="nav-item text-light py-3 px-3"><a href="exam-schedules-view.php?role=<?php echo $_SESSION['role'] ?>"><i class="fas fa-graduation-cap"></i> Exam Schedules</a></li>
        <li class="nav-item text-light py-3 px-3"><a href="reports.php"><i class="fas fa-file-contract"></i> Reports <sup style='font-size:11px; color:red;'>Beta</sup></a></li>
        <li class="nav-item text-light py-3 px-3"><a href="edit-profile.php"><i class="fas fa-user-cog"></i> Profile Settings </a></li>
        <li class="nav-item text-light py-3 px-3"><a href="help.php"><i class="fas fa-question-circle"></i> Help</a></li>
    </ul>
</div>
