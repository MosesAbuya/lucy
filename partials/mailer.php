<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../assets/phpmailer/Exception.php';
require_once __DIR__ . '/../assets/phpmailer/PHPMailer.php';
require_once __DIR__ . '/../assets/phpmailer/SMTP.php';
require_once __DIR__ . '/../admin/config.php';

function getEmailTemplate($title, $content) {
    return '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    </head>
    <body style="margin: 0; padding: 0; background-color: #0b0b0a; font-family: \'Inter\', sans-serif; color: #f3eee4;">
        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #0b0b0a; padding: 40px 20px;">
            <tr>
                <td align="center">
                    <table width="100%" max-width="600" cellpadding="0" cellspacing="0" border="0" style="max-width: 600px; background-color: #121211; border: 1px solid #B8935A; border-radius: 8px; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
                        <tr>
                            <td align="center" style="padding: 40px 40px 20px;">
                                <h1 style="margin: 0; font-family: \'Playfair Display\', serif; font-size: 28px; color: #B8935A; font-weight: normal; letter-spacing: 1px; text-transform: uppercase;">'.$title.'</h1>
                                <div style="width: 50px; height: 1px; background-color: #B8935A; margin: 20px auto 0; opacity: 0.5;"></div>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 20px 40px 40px; font-size: 16px; line-height: 1.8; color: rgba(243, 238, 228, 0.9);">
                                '.$content.'
                            </td>
                        </tr>
                        <tr>
                            <td align="center" style="padding: 30px; background-color: #080808; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px; border-top: 1px solid rgba(184, 147, 90, 0.2);">
                                <p style="margin: 0; font-family: \'Playfair Display\', serif; font-size: 14px; color: #B8935A; font-style: italic;">"A Journey of Wellness, Self-Discovery and Transformation"</p>
                                <p style="margin: 10px 0 0; font-size: 12px; color: rgba(243, 238, 228, 0.5); text-transform: uppercase; letter-spacing: 1px;">&copy; ' . date('Y') . ' Lucy Mworia</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
    </html>';
}

function sendMail($to, $subject, $body, $isHtml = false, $templateTitle = 'Lucy Mworia') {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = SMTP_USER;
        $mail->Password   = SMTP_PASS;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = SMTP_PORT;

        // Recipients
        $mail->setFrom(SMTP_USER, 'Lucy Mworia');
        $mail->addAddress($to);

        // Content
        $mail->isHTML($isHtml);
        $mail->Subject = $subject;
        
        if ($isHtml) {
            $mail->Body = getEmailTemplate($templateTitle, $body);
            $mail->AltBody = strip_tags(str_replace('<br>', "\n", $body));
        } else {
            $mail->Body = $body;
        }

        return $mail->send();
    } catch (Exception $e) {
        // Log error silently
        error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        return false;
    }
}
?>
