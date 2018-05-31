<?php
/**
 * Created by PhpStorm.
 * User: rafa
 * Date: 31/05/2018
 * Time: 14:21
 */
require('PHPMailer/src/Exception.php');
require('PHPMailer/src/PHPMailer.php');
require('PHPMailer/src/SMTP.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  print_r($_POST);
  $name = $_POST['name'];
  $mail_client = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $mail = new PHPMailer\PHPMailer\PHPMailer();// create a new object
//  $mail->SMTPOptions = array(
//    'ssl' => array(
//      'verify_peer' => false,
//      'verify_peer_name' => false,
//      'allow_self_signed' => true
//    )
//  );
  $mail->isSMTP();
  $mail->SMTPDebug = 1;
 $mail->Host = gethostbyname('smtp.gmail.com');
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = "ralexm14@gmail.com";
  $mail->Password = "Prospero123";
  $mail->setFrom('ralexm14@example.com', 'Zona9 Digital');
  $mail->addReplyTo($mail_client, $name);
  $mail->addAddress('ramendoza@uci.cu');
  $mail->Subject = 'testing';
  $mail->Body = "<h1>Nueva solicitud de contacto</h1>" .
    "<p>Un nuevo cliente ha enviado datos en el formulario de contacto</p>" .
    "<ul>" .
    "<li>Nombre: ".$name."</li>" .
    "<li>Correo: ".$mail_client."</li>" .
    "<li>T&iacute;tulo: ".$subject."</li>" .
    "<li>Mensaje: ".$message."</li>" .
    "</ul>";
  $mail->Send();

}