<?php
require_once("includes/class-autoload.inc.php");

$products = new ProductsView();

$all = $products->showProducts();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Product List</title>
	<link rel="stylesheet" href="./styles/output.css" />
	<link rel="stylesheet" href="./styles/style.css" />
</head>

<body class="px-10">
	<form method="post" action="./includes/deleteproduct.inc.php">
		<header class="flex justify-between mt-12 pb-5 mb-10 border-b-4 border-gray-700">
			<h1 class="text-3xl font-semibold">Product List</h1>

			<div class="flex flex-col gap-3 md:flex-row md:gap-5 items-end md:items-center">
				<a class="btn bg-blue-600 border-blue-600 text-white" href="./add-product/">
					ADD
				</a>
				<input type="submit" name="delete" value="MASS DELETE" class="btn bg-red-600 border-red-600 text-white" id="delete-product-btn" />
			</div>
		</header>

		<main class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
			<?php foreach ($all as $product) { ?>
				<div class="border-2 border-gray-900 p-8 flex flex-col justify-center items-center relative">
					<input type="checkbox" class="delete-checkbox" name="item[]" value="<?php echo  $product['sn'] ?>" />'
					<h2 class="uppercase font-semibold"><?php echo $product['sku']; ?></h2>
					<p><?php echo $product['name']; ?></p>
					<p></p>
					<p><?php echo $product['price']; ?>$</p>
					<p><?php echo $product['details']; ?></p>
				</div>
			<?php

			}

			?>
		</main>

		<?php include "./includes/footer.inc.php"; ?>
	</form>
</body>

</html>