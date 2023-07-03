<?php
$db = new mysqli('localhost', 'root', '', 'newsletter');




    if (isset($_POST['delete']))
    {
         $id = $_POST['delete'];
         $query = "DELETE FROM subscribers WHERE id = '$id'";
	    $result = $db->query($query);
	    if ($result === false)
	    {
		    header('Location:index.php?message=SuccessFully Deleted');
	    } else
	    {
		    header('Location:index.php?message=Not Deleted');
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
		<h1>Are you sure you want to unsubscribe</h1>
		<form action="" method="post">
<!--			<div class="form-group">-->
<!--				<label for="email"></label>-->
<!--				<input class="m-1 " type="text" class="form-control" id="name" name="name" placeholder="Name" required>-->
<!--			</div>-->
            <?php  if (isset($_GET['delete'])): ?>
            <input type="hidden" name="delete" value="<?php echo $_GET['delete']?>">
            <?php endif; ?>
			<button type="submit" class="btn btn-primary btn-sm m-1">Unsubscribe</button>
			<br>
		</form>
	</div>
</div>
</body>
</html>