<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Product Add</title>
		<link rel="stylesheet" href="../styles/output.css" />
		<link rel="stylesheet" href="../styles/style.css" />
	</head>

	<body class="px-10">
		<form
			method="post"
			action="../includes/addproduct.inc.php"
			id="product_form"
		>
			<header
				class="flex justify-between mt-12 pb-5 mb-10 border-b-2 border-gray-700 items-center"
             >
				<h1 class="text-3xl font-semibold">Product Add</h1>

				<div class="flex flex-col gap-3 md:flex-row md:gap-5 items-end md:items-center">
					<input
						type="submit"
						name="save"
						class="btn capitalize bg-blue-600 border-blue-600 text-white"
						id="save"
						value="Save"
					/>
					<a
						class="capitalize btn bg-red-600 border-red-600 text-white"
						href="../"
					>
						CANCEL
					</a>
				</div>
			</header>

			<main class="">
				<p id="error" class="mb-5 font-medium text-red-500">
                    <?php
                        if(isset($_GET['error']))
                            echo $_GET['error'];
                    ?>
                </p>

				<div class="item">
					<label class="label">SKU</label>
					<input
						type="text"
						name="sku"
						id="sku"
						class="input"
						required
					/>
				</div>

				<div class="item">
					<label class="label">Name</label>
					<input
						type="text"
						name="name"
						id="name"
						class="input"
						required
					/>
				</div>

				<div class="item">
					<label class="label">Price ($)</label>
					<input
						type="text"
						name="price"
						id="price"
						class="input"
						required
					/>
				</div>

				<div class="item">
					<label class="label">Type Switcher</label>
					<select
						id="productType"
						name="productType"
						class="input"
						required
						onchange="changeSwitcher()"
					>
						<option selected disabled value="">Select Type</option>
						<option>DVD</option>
						<option>Book</option>
						<option>Furniture</option>
					</select>
				</div>

				<div id="switcher"></div>
			</main>

			<?php include "../includes/footer.inc.php"; ?>
		</form>
	</body>
	<script src="../js_files/app.js"></script>
</html>
