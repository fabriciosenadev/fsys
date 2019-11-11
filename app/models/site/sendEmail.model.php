<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// implementa SendGrid usando Composer
require 'vendor/autoload.php';

/**
 * function sendEmail
 * @param array @data
 * @return boolean
 */
function sendEmail ($data, $idRequest)
{

    extract($data);
    // Instantiation and passing `true` enables exceptions
    $resetLink = resetLinkBuilder($idRequest);
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'Outlook.office365.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'fabricior.sena@outlook.com';                     // SMTP username
        $mail->Password   = 'Pr1s!on3r';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('fabricior.sena@outlook.com', 'Fabricio');
        $mail->addAddress($email, $name);     // Add a recipient
        $mail->addAddress($email);               // Name is optional
        $mail->addReplyTo('fabricior.sena@outlook.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Reset de senha - Fsys';
        $mail->Body    = "Olá $name, <br>";
        $mail->Body    .= " clique no link abaixo para alterar sua senha. <br>";
        $mail->Body    .= " $resetLink";
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        // echo 'Message has been sent';

        return true;

    } catch (Exception $e) {
        
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
        
    }
    
    
}


function resetLinkBuilder($idRequest) 
{
    $data = getResetRequest($idRequest);

    extract($data);

    $resetScript = 'http://localhost/fsys/reset.php';

    $linkToSend = $resetScript . "?id=" . $id . "&uid=" . $id_user . "&t=" . $token;

    return $linkToSend;
}

function getResetRequest ($idRequest)
{
    $connection = $GLOBALS['connection'];

    $select = "SELECT * FROM user_password_resets WHERE id = $idRequest";

    $result = mysqli_query($connection, $select);

    $return = mysqli_fetch_assoc($result);

    return $return;
}