<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_mail($email, $v_code)
{
  require('PHPMailer/Exception.php');
  require('PHPMailer/SMTP.php');
  require('PHPMailer/PHPMailer.php');

  $mail = new PHPMailer(true);

  try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;      //Send using SMTP
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gamil.com';                     //Set the SMTP server to send through
    // $mail->AuthType = 'LOGIN';
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sahu98272@gmail.com';                     //SMTP username
    $mail->Password   = 'rawmojkhpwxlphxj';                               //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;    //Enable implicit TLS encryption ENCRYPTION_STARTTLS
    // $mail->Port       = 465;        //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable implicit TLS encryption ENCRYPTION_STARTTLS
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    // $mail->SMTPOptions = array(
    //   'ssl' => array(
    //     'verify_peer' => false,
    //     'verify_peer_name' => false,
    //     'allow_self_signed' => true
    //   )
    // );
    $mail->Host = gethostbyname('tls://smtp.gmail.com');
    //Recipients
    $mail->setFrom('sahu98272@gmail.com');
    $mail->addAddress($email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email verification from RURALHAAT';
    $mail->Body    = "<!DOCTYPE html>
    <html>
    
    <head>
        <title></title>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge' />
        <style type='text/css'>
            @media screen {
                @font-face {
                    font-family: 'Lato';
                    font-style: normal;
                    font-weight: 400;
                    src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
                }
    
                @font-face {
                    font-family: 'Lato';
                    font-style: normal;
                    font-weight: 700;
                    src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
                }
    
                @font-face {
                    font-family: 'Lato';
                    font-style: italic;
                    font-weight: 400;
                    src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
                }
    
                @font-face {
                    font-family: 'Lato';
                    font-style: italic;
                    font-weight: 700;
                    src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
                }
            }
    
            /* CLIENT-SPECIFIC STYLES */
            body,
            table,
            td,
            a {
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
            }
    
            table,
            td {
                mso-table-lspace: 0pt;
                mso-table-rspace: 0pt;
            }
    
            img {
                -ms-interpolation-mode: bicubic;
            }
    
            /* RESET STYLES */
            img {
                border: 0;
                height: auto;
                line-height: 100%;
                outline: none;
                text-decoration: none;
            }
    
            table {
                border-collapse: collapse !important;
            }
    
            body {
                height: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 100% !important;
            }
    
            /* iOS BLUE LINKS */
            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
            }
    
            /* MOBILE STYLES */
            @media screen and (max-width:600px) {
                h1 {
                    font-size: 32px !important;
                    line-height: 32px !important;
                }
            }
    
            /* ANDROID CENTER FIX */
            div[style*='margin: 16px 0;'] {
                margin: 0 !important;
            }
        </style>
    </head>
    
    <body style='background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;'>
        <!-- HIDDEN PREHEADER TEXT -->
        <div style='display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: 'Lato', Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;'> We're thrilled to have you here! Get ready to dive into your new account.
        </div>
        <table border='0' cellpadding='0' cellspacing='0' width='100%'>
            <!-- LOGO -->
            <tr>
                <td bgcolor='red' align='center'>
                    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                        <tr>
                            <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td bgcolor='red' align='center' style='padding: 0px 10px 0px 10px;'>
                    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                        <tr>
                            <td bgcolor='#ffffff' align='center' valign='top' style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
                                <h2 style='font-size: 40px; font-weight: 400; margin: 2;'>RURALHAAT</h2> <img src=' https://img.icons8.com/clouds/100/000000/handshake.png' width='125' height='120' style='display: block; border: 0px;' />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
                    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                        <tr>
                            <td bgcolor='#ffffff' align='left' style='padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                <p style='margin: 10px;padding: 15px'>Reset your Ruralhaat Password. </p>
                            </td>
                        </tr>
                        <tr>
                            <td align='left' bgcolor='#ffffff' style='padding: 24px; font-family: ' Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;'>
                                <p style='margin: 0;'>Below OTP to reset your Ruralhaat Account Password.This OTP will valid for 24hr only. If you didn't Request for Reset password <a href='http://localhost:8080/author/index.html'>RURALHAAT</a>, you can safely delete this email.</p>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor='#ffffff' align='left'>
                                <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                    <tr>
                                        <td bgcolor='#ffffff' align='center' style='padding: 20px 30px 60px 30px;'>
                                            <table border='0' cellspacing='0' cellpadding='0'>
                                                <tr>
                                                    <td align='center' style='border-radius: 3px;padding: 15px;' bgcolor='red'><h3  target='_blank' style='font-size: 20px; font-family: Helvetica, Arial, sans-serif;text-decoration: none; color: #fff !important; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid red; display: inline-block;'>$v_code</h3></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr> <!-- COPY -->
                      
                        <tr>
                            <td align='center' bgcolor='#e9ecef' style='padding: 12px 24px; font-family: ' Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px; color: #666;'>
                                <p style='margin: 0;'>You received this email because we received a request for Reset of your account. If you didn't request for registration in Ruralhaat, you can safely delete this email.</p>
                            </td>
                        </tr>
                       
                        <tr>
                            <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                <p style='margin: 0;padding: 15px'>Ruralhaat,<br> Team</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td bgcolor='#f4f4f4' align='center' style='padding: 30px 10px 0px 10px;'>
                    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                        <tr>
                            <td bgcolor='#FFECD1' align='center' style='padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                                <h2 style='font-size: 20px; font-weight: 400; color: #111111; margin: 0;'>Need more help?</h2>
                                <p style='margin: 0;'><a href='#' target='_blank' style='color: red;'>We&rsquo;re here to help you out</a></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
                    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                        <tr>
                            <td bgcolor='#f4f4f4' align='left' style='padding: 0px 30px 30px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;'> <br>
                                <p style='margin: 0;'>If these emails get annoying, please feel free to <a href='#' target='_blank' style='color: #111111; font-weight: 700;'>unsubscribe</a>.</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
    
    </html>
    ";

    $mail->send();
    return true;
  } catch (Exception $e) {
    return false;
  }
}


?>