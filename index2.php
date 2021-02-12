<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Danish Alam">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Shopping Cart System</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="index2.php"><i class="fa fa-mobile"></i>&nbsp;&nbsp;Danish Mobile Store</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link active" href="index2.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="checkout.php">Checkout</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger">2</span></a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
	<div class="row mt-2 pb-3">
		<?php
			include 'config.php';
			$stmt = $conn->prepare("SELECT * FROM product");
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc()):
		?>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="card-deck">
				<div class="card p-2 border-secondary mb-4">
					<img src="<?= $row['product_image'] ?>" class="card-img-top" height="200">
					<div class="card-body p-1">
						<h4 class="card-tittle text-centre text-info"><?= $row['product_name']?></h4>
						<h5 class="card-text text-centre text-danger"><i class="fa fa-rupee"></i>&nbsp;<?= number_format($row['product_price'],2) ?>/-</h5>
					</div>
					<div class="card-footer p-1">
						<a href="action.php?id=<?= $row['id']?>" class="btn btn-info btn-block"><i class="fa fa-cart-plus"></i>&nbsp;Add to cart</a>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>