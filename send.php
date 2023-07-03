<?php
require('./vendor/autoload.php');

$db = new mysqli('localhost', 'root', '', 'newsletter');

//we will query the db to get the data
$query = "SELECT * FROM content";
$result = $db->query($query);
$contents = mysqli_fetch_all($result,MYSQLI_ASSOC);


$subs = $db->query("SELECT * FROM subscribers");
$subscribers = mysqli_fetch_all($subs, MYSQLI_ASSOC);

function dd($args)
{
    echo '<pre>';
    print_r($args);
    echo '</pre>';
    die();
}

if(isset($_POST['content'], $_POST['subscriber']))
{
	$subQuery = $db->query("SELECT * FROM content WHERE id = " .  $_POST['content']);
	$contents = $subQuery->fetch_all(MYSQLI_ASSOC);


    $subQuery = $db->query("SELECT * FROM subscribers WHERE id IN(" . join(',', $_POST['subscriber']) . ")");
	$subscribers = $subQuery->fetch_all(MYSQLI_ASSOC);
    //$tolists = [];

    foreach ($subscribers as $subs) {
	    error_reporting(E_ALL ^ E_DEPRECATED);

        $recemail = $subs['email'];
        $recname = $subs['name'];
        $recid = $subs['id'];
	    $transport = (new Swift_SmtpTransport('sandbox.smtp.mailtrap.io', 25))
		    ->setUsername('8cce50bb44ffeb')
		    ->setPassword('ff8015d8cc6d20');

	    $mailer = new Swift_Mailer($transport);

	    $c = $contents[0]['content'];
	    //print_r($c);
	    $unsubscribeLink = $c.'<br><a href="https://newsletter.test/unsubscribe.php?delete='.$recid.'">Unsubscribe From email</a>';
	    //print_r($unsubscribeLink);

	    $message = (new Swift_Message('Test Subject'))
		    ->setFrom(['support@webino.com' => 'Webino Support'])
		    ->setTo([$recemail=>$recname])
		    ->setBody($unsubscribeLink, 'text/html');

	    $mailer->send($message);


    }
}
?>


<html lang="en">
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	<title>Add Content</title>
</head>
<body>
<div class=" h-100 d-flex justify-content-center">
	<div class="border rounded p-5" style="background: linear-gradient(to bottom, #ff9c33, #ff611b);">
		<h1>Admin Add Content</h1>
		<form action="send.php" method="post">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Content</label>
                <select name="content" class="form-control" id="exampleFormControlSelect1">
                    <?php foreach ($contents as $content):?>
                    <option value="<?php echo $content['id']?>"><?php echo $content['id']." ".$content['name'] ?></option>

                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Select Subcriber</label>
                <select multiple name="subscriber[]" class="form-control" id="exampleFormControlSelect2">
					<?php foreach ($subscribers as $subscriber):?>
                        <option value="<?php echo $subscriber['id']; ?>"><?php echo $subscriber['name']." ".$subscriber['email'] ?></option>
					<?php endforeach;?>
                </select>
            </div>
			<button type="submit" class="btn btn-primary btn-sm m-1">Send Email</button>
		</form>
	</div>
</div>
</body>
</html>