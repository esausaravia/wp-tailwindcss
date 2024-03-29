<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


// Setup custom SMTP credentials.
add_action('phpmailer_init', function (PHPMailer $mailer) {
  $mailer->isSMTP();
  $mailer->SMTPAutoTLS = false;
  $mailer->SMTPAuth = env('MAIL_USERNAME') && env('MAIL_PASSWORD');
  $mailer->SMTPDebug = env('WP_DEBUG') ? SMTP::DEBUG_SERVER : SMTP::DEBUG_OFF;
  $mailer->SMTPSecure = env('MAIL_ENCRYPTION', 'tls');
  $mailer->Debugoutput = 'error_log';
  $mailer->Host = env('MAIL_HOST');
  $mailer->Port = env('MAIL_PORT', 587);
  $mailer->Username = env('MAIL_USERNAME');
  $mailer->Password = env('MAIL_PASSWORD');
  return $mailer;
});

add_filter('wp_mail_from', fn() => env('MAIL_FROM_ADDRESS', 'hello@example.com'));
add_filter('wp_mail_from_name', fn() => env('MAIL_FROM_NAME', 'Example'));