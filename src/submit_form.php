<?php

require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $company = $_POST['company'];
    $country = $_POST['country'];
    $prefix = $_POST['prefix'];
    $phone = $_POST['phoneNumber'];
    $email = $_POST['email'];

    //EDIT DB CONNECTION IF NECCESARY
    $db = new mysqli('localhost', 'root', '', 'kpi');

    $stmt = $db->prepare("INSERT INTO form_data (firstName, lastName, company, country, prefix, phoneNumber, email) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $firstName, $lastName, $company, $country, $prefix, $phone, $email);
    $stmt->execute();

    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="TKI-Membership-Brochure.pdf"');
    readfile('../assets/TKI-Membership-Brochure.pdf');

    $mail = new PHPMailer;

    $mail->SMTPDebug = 3;
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "kpitest24@gmail.com";
    $mail->Password = "aqet yqtq tmlj hjli";
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;

    $mail->From = "kpitest24@gmail.com";
    $mail->FromName = "Efrain Mejia";

    $mail->addAddress("alex.podariu@kpiinstitute.com", "Alex Podariu");

    $mail->isHTML(true);

    $mail->Subject = "This is my KPI test";
    $mail->Body = "Hi, this is Efrain and this is the body of my KPI test";
    $mail->AltBody = "plain text version";
    $mail->send();
}
