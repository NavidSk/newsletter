<?php
 require 'vendor/autoload.php';


try {
    $db = new mysqli('localhost', 'root', '', 'newsletter');
    if ($db->connect_errno) {
        throw new Exception($db->connect_error);
    }
} catch (\Exception $e) {
    $errorMessage = 'Failed to connect Because Sharik Sucks';
    echo $errorMessage;
}


if (isset($_POST['email'], $_POST['name'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];

    $ifExist = "SELECT * FROM subscribers WHERE name='$name' AND email='$email'";

    $result = $db->query($ifExist);

    if ($result->num_rows > 0) {
        $redirect ='index.php?user='. urlencode($result ? 'Already Subcribed To Newsletter':'');
        $db->close();
        header('Location: '.$redirect);
    }

    $query = "INSERT INTO subscribers (name,email) VALUES ('$name','$email')";
	$qresult = $db->query($query);
//    try {
//        $result = $db->query($query);
//        $success = true;
//        $sucessMessage = 'Submitted Successfully';
//    } catch (\Exception $ex) {
//        $error = true;
//        $errorMessage = 'Not Submitted Please contact admin';
//    }


    $transport = (new Swift_SmtpTransport('sandbox.smtp.mailtrap.io', 25))->setUsername('8cce50bb44ffeb')->setPassword('ff8015d8cc6d20');

    $mailer = new Swift_Mailer($transport);

    $message = (new Swift_Message('Wonderful Subject'))
        ->setFrom(['support@webina.com' => 'Webino Support'])
        ->setTo(
			[$email => $name]
        )
        ->setBody('Thank you for subscribing to our newsletter.');

    $result = $mailer->send($message);
	if($qresult == true){
		header('Location:index.php?message=Thank you for subscribing to our newsletter!');
	}
    //$redirect = 'index.php?message='. urlencode($result ? 'Thank you for subscribing to our newsletter!' : 'Subcription Failed');
    //header('Location: '.$redirect);
    // if ($result) {
    //     echo 'Thank you for subscribing to our newsletter!';
    // } else {
    //     echo 'subcription failed.';
    // }
}




