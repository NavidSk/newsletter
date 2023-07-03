<?php

$db = new mysqli('localhost', 'root', '', 'newsletter');

if(isset($_POST['content'], $_POST['name'])){
    $content = $_POST['content'];
    $name = $_POST['name'];

	//$query = "INSERT INTO content (content, name) VALUES ('$content', '$name')";
    $result = $db->query("INSERT INTO content (content, name) VALUES ('$content', '$name')");

    if ($result=== true){
	    $db->close();
	    header('Location: /content.php?message= Successfully Submitted');
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
<div class="container h-100 d-flex justify-content-center">
    <div class="border rounded p-5" style="background: linear-gradient(to bottom, #ff9c33, #ff611b);">
        <h1>Admin Add Content</h1>
        <form action="" method="post">
            <div class="form-group">
                <input class="m-1 " type="text" class="form-control" id="name" name="name" placeholder="Name" required>

                <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="20" placeholder="content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-sm m-1">Subscribe</button>
            <br>
        </form>
    </div>
</div>
</body>
</html>