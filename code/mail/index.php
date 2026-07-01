<?php
  
include("../../admin/code/connection.php");

session_start();
require 'function.php';




    $sender_mail ="makwanajaynit8@gmail.com";
    $n="9404783930";
    $ps="jayu@92";
    $g="makwanajaynit8@gmail.com";
    
   
            $mail_sent = send_mail($sender_mail,$n,$ps,$g);

            if ($mail_sent) {
                $_SESSION['code_email'] = $sender_mail;
                echo "<script>
                alert('send success');
                </script>";
            } else {
                $errorMsgLogin = "Failed to send OTP. Please try again later.";
            }
?>

