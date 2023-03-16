<?php include "files.php"; ?> <!--file that contains all external code -->

<div class="container-fluid vh-100 student-main-wrap">
    <?php include "top-header.php"; ?> <!--top-header code file -->

        <div class="row">
            <?php include "sidebar.php"; ?> <!--sidebar code file -->
            <!-- main section -->
            <div class="col-md-10 student-home-section">
                <div class="nav p-4">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item mb-0"><a href="teacher-dashboard.php">Home</a></li>
                            <li class="breadcrumb-item mb-0"><a href="choose-exam-type.php">Choose Exam Type</a></li>
                            <?php
                            if($_GET['exam_type']=='des'){
                                echo '<li class="breadcrumb-item mb-0"><a href="descriptive-based.php?descriptive_based='.$_GET['exam_code'].'">Create Exam</a></li>';
                            }else{
                                echo '<li class="breadcrumb-item mb-0"><a href="create-exam.php?mcq_based_exam_code='.$_GET['exam_code'].'">Create Exam</a></li>';
                            }
                            ?>
                            <li class="breadcrumb-item mb-0 active" aria-current="page">Preview Question</li>
                        </ol>
                    </nav>
                </div>
                <section class="p-1 absolute-center">
                    <div class="preview-question" id="notify">
                            <div class="question-header">
                                <div class="row px-3 py-2">
                                    <div class="col-md-3">
                                        <img src="images/logo-oes/exam-desk-logo-5.png" alt="">
                                    </div>
                                    <div class="col-md-6 text-center absolute-center">
                                        <h4><?php echo $_GET['examname'] ?></h4>
                                    </div>
                                    <div class="col-md-3 absolute-center">
                                        <h5>Exam Code: <?php echo $_GET['exam_code'] ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="question-wrap">
                                <?php
                                if($_GET['exam_type']=='des'){
                                    $ques_query="SELECT * FROM desc_exam WHERE exam_code='{$_GET['exam_code']}'";
                                    $ques_result=mysqli_query($con,$ques_query);
                                    if(mysqli_num_rows($ques_result)>0){
                                        while($ques_data=mysqli_fetch_assoc($ques_result)){
                                ?>
                                    <div class="question mt-3">
                                        <h1>Q. <?php echo $ques_data["Question"]; ?></h1>
                                        
                                        <div class="option-box code-diagram mt-3">
                                        <?php
                                        if(!empty($ques_data['code'])){
                                        ?>
                                            <div class="code">
                                                <pre><?php echo htmlentities($ques_data["code"]); ?></pre>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if(!empty($ques_data['diagram'])){
                                        ?>
                                            <div class="diagram-img">
                                                <img src="images/uploaded_images/des_ques/<?php echo $ques_data["diagram"]; ?>" alt="diagram" class="img-fluid">
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        </div>
                                        
                                        <div class="ed-dl-btn d-flex mt-2">
                                            <div class="col-md-1">
                                                <a href="edit-question.php?q_id=<?php echo $ques_data['id']; ?>&examname=<?php echo $_GET['examname']; ?>&exam_code=<?php echo $_GET['exam_code']; ?>&exam_type=<?php echo $_GET['exam_type']?>" class="btn btn-primary p-0 px-3">Edit</a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="delete-question.php?q_id=<?php echo $ques_data['id']; ?>&examname=<?php echo $_GET['examname']; ?>&exam_code=<?php echo $_GET['exam_code']; ?>&exam_type=<?php echo $_GET['exam_type']?>" class="btn btn-danger p-0 px-3">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                        }
                                    }
                                ?>
                                <?php
                                }elseif($_GET['exam_type']=='mcq'){
                                    $ques_query="SELECT * FROM exam WHERE exam_id='{$_GET['exam_code']}'";
                                    $ques_result=mysqli_query($con,$ques_query);
                                    if(mysqli_num_rows($ques_result)>0){
                                        while($ques_data=mysqli_fetch_assoc($ques_result)){
                                    ?>
                                    <div class="question mt-2">
                                        <h1>Q. <?php echo $ques_data["Question"]; ?></h1>
                                        <div class="option-box">
                                            <h4>A). <?php echo $ques_data["option1"]; ?></h4>
                                            <h4>B). <?php echo $ques_data["option2"]; ?></h4>
                                            <h4>C). <?php echo $ques_data["option3"]; ?></h4>
                                            <h4>D). <?php echo $ques_data["option4"]; ?></h4>
                                            <h4 class="mt-3">Correct Answer: <?php echo $ques_data["correct_option"]; ?></h4>
                                        </div>
                                        <div class="ed-dl-btn d-flex">
                                            <div class="col-md-1">
                                                <a href="edit-question.php?q_id=<?php echo $ques_data['id']; ?>&examname=<?php echo $_GET['examname']; ?>&exam_code=<?php echo $_GET['exam_code']; ?>&exam_type=<?php echo $_GET['exam_type']?>" class="btn btn-primary p-0 px-3">Edit</a>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="delete-question.php?q_id=<?php echo $ques_data['id']; ?>&exam_code=<?php echo $_GET['exam_code']; ?>&exam_type=<?php echo $_GET['exam_type']?>" class="btn btn-danger p-0 px-3">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    }
                                }
                                ?>
                            </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
</html>