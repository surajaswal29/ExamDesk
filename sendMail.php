<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'saswal086@gmail.com';                     //SMTP username
    $mail->Password   = 'enrkwiasinvmkycm';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('saswal086@gmail.com', 'Suraj Aswal');
    $mail->addAddress('surajaswal29@gmail.com', 'Suraj Aswal');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'ExamDesk - User Email Verification';
    $mail->Body    = "
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
            </div>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}