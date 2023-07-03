<?php
 //require 'vendor/autoload.php';
  //require('subscribe.php');


?>

<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap-grid.min.css" integrity="sha512-Aa+z1qgIG+Hv4H2W3EMl3btnnwTQRA47ZiSecYSkWavHUkBF2aPOIIvlvjLCsjapW1IfsGrEO3FU693ReouVTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<div class=" container h-100 d-flex  justify-content-center">
   <div class="border rounded p-5" style="background: linear-gradient(to bottom, #ff9c33, #ff611b);">
    <h1>Subscribe to our Newsletter</h1>
    <form action="subscribe.php" method="post">
    <div class="form-group">
        
        <input class="m-2 " type="text" class="form-control" id="name" name="name" placeholder="Name" required>
      </div>
      <div class="form-group">
        <input class="m-2" type="email" class="form-control" id="email" name="email" placeholder="Email" required>
      </div>
      <button type="submit" class="btn btn-primary btn-sm m-2">Subscribe</button>
    </form>
    <div class="text-align-center">
    <?php 
    if (isset($_GET['user'])):?>
     <?php echo $_GET['user'];?>
     <br><a href="index.php" class="btn btn-primary btn-sm">Back to Home</a>
     <?php endif ?>
    </div>
    
   <?php if (isset($_GET['message'])) {
    echo $_GET['message'];
  }
  ?>


  </div>
</div>
</body>
</html>