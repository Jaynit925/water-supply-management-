require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function send_mail($receiver_email,$n,$ps,$g) {
    $mail = new PHPMailer(true);

    try {
       $mail->Host = $_ENV['MAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['MAIL_USERNAME'];
        $mail->Password = $_ENV['MAIL_PASSWORD'];
        $mail->SMTPSecure = $_ENV['MAIL_ENCRYPTION'];
        $mail->Port = $_ENV['MAIL_PORT'];

        $mail->setFrom(
            $_ENV['MAIL_FROM_ADDRESS'],
            $_ENV['MAIL_FROM_NAME']
        );
        $mail->addAddress($receiver_email);
        $mail->isHTML(true);
      $mail->Subject = 'You Are registed!';
        $mail->Body    = '

  <p>&nbsp;</p>
<table align="center" border="0" cellpadding="0" cellspacing="0" class="m_-1489438638309662633main_Div_section"
    role="presentation"
    style="background-color: white; color: #222222; font-family: Arial, Helvetica, sans-serif; font-size: small; margin: 0px auto; max-width: 600px; min-width: 600px; width: 600px;"
    valign="top">
    <tbody>
        <tr>
            <td dir="ltr" style="margin: 0px;" valign="top">
                <div class="m_-1489438638309662633main_Div_section"
                    style="color: #3c4043; font-family: &quot;Google Sans Text&quot;, Roboto, &quot;Segoe UI&quot;, &quot;Helvetica Neue&quot;, Frutiger, &quot;Frutiger Linotype&quot;, &quot;Dejavu Sans&quot;, &quot;Trebuchet MS&quot;, Verdana, Arial, sans-serif; font-size: 14px; line-height: 21px; margin: 0px auto; max-width: 600px; padding: 0px;">
                    <div class="m_-1489438638309662633div_main_first"
                        style="color: #1967d2; font-family: &quot;Google Sans&quot;, Roboto, &quot;Segoe UI&quot;, &quot;Helvetica Neue&quot;, Frutiger, &quot;Frutiger Linotype&quot;, &quot;Dejavu Sans&quot;, &quot;Trebuchet MS&quot;, Verdana, Arial, sans-serif; font-size: 30px; line-height: 42px; margin: 24px 32px 48px;">
                        Thank you for registering! 🎉</div>
                    <div class="m_-1489438638309662633div_main" style="line-height: 21px; margin: 0px 32px 32px;">Welcome to our community! Were thrilled to have you join us. Feel free to explore, connect, and make yourself at home. If you have any questions or need assistance, dont hesitate to reach out. Happy exploring!</div>
                    <div class="m_-1489438638309662633div_data_table" style="margin: 0px auto 48px; max-width: 400px;">
                        <center class="m_-1489438638309662633div_main">
                            <table border="0" cellpadding="0" cellspacing="0"
                                class="m_-1489438638309662633darkmode_fix_datacard" role="presentation"
                                style="background-color: #eff5fe; border-radius: 20px; color: #3c4043; font-size: 14px; padding: 20px 0px; width: 400px;">
                                <tbody>
                                    <tr>
                                        <td style="margin: 0px; padding: 8px 8px 12px 20px; vertical-align: top; word-break: break-word;"
                                            width="50%">User Name:</td>
                                        <td style="font-weight: bold; margin: 0px; padding: 8px 20px 12px 8px; vertical-align: top; word-break: break-word;"
                                            width="50%"><a aria-hidden="true"
                                                ="https://mail.google.com/mail/u/0/#m_-1489438638309662633_"
                                                style="color: #3c4043; text-decoration-line: none;">'.$n.'</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="margin: 0px; padding: 8px 8px 12px 20px; vertical-align: top; word-break: break-word;"
                                            width="50%">Gmail:</td>
                                        <td style="font-weight: bold; margin: 0px; padding: 8px 20px 12px 8px; vertical-align: top; word-break: break-word;"
                                            width="50%"><a aria-hidden="true"
                                                ="https://mail.google.com/mail/u/0/#m_-1489438638309662633_"
                                                style="color: #3c4043; text-decoration-line: none;">'.$g.'</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="margin: 0px; padding: 8px 8px 12px 20px; vertical-align: top; word-break: break-word;"
                                            width="50%">Password:</td>
                                        <td style="font-weight: bold; margin: 0px; padding: 8px 20px 12px 8px; vertical-align: top; word-break: break-word;"
                                            width="50%"><a aria-hidden="true"
                                                ="https://mail.google.com/mail/u/0/#m_-1489438638309662633_"
                                                style="color: #3c4043; text-decoration-line: none;">'.$ps.'</a></td>
                                    </tr>
                                   


                                </tbody>
                            </table>
                        </center>
                    </div>
                    <div class="m_-1489438638309662633div_main" style="line-height: 21px; margin: 0px 32px 32px;">If you
                        didn’t expect this change, please contact the payments profile admin.</div>
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation">
                        <tbody>
                            <tr>
                                <td height="20" style="height: 20px; line-height: 20px; margin: 0px;">&nbsp;<br /><br />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
    </tbody>
</table>   ';

        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        echo 'Error sending OTP: ' . $e->getMessage();
        return false;
    }
}
?>
