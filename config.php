<?php
    date_default_timezone_set("Asia/Calcutta"); //local time zone

    $host="localhost"; //Database server name
    $user="root";  //Database username
    $password=""; //Database password
    $db_name="oes"; //Database Name

    // connect to database
    $con=mysqli_connect($host,$user,$password,$db_name);

    if(!$con){
        echo"Failed to connect!";
    }

    //creating function for redirection through JS
    function redirect($rd){
?>
    <script>
        window.location.href="<?php echo $rd; ?>";
    </script>
<?php
    }
?>