<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Login</title>
	<link rel="stylesheet" href="./assets/css/main.css">
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet" />
	<script src="https://cdn.tailwindcss.com"></script>
	<script>
		tailwind.config = {
			theme: {
				extend: {
					colors: {
						primary: "black",
						primaryText: "#4C9BC8",
					},
					container: {
						center: true,
					},
				},
			},
		};
	</script>
	<link rel="stylesheet" href="./assets/css/main.css">
</head>

<body>

	<div class="container flex justify-center items-center pt-28">
		<div class="w-full flex flex-col justify-center items-center border border-black rounded-md shadow-md py-16 pb-28 max-w-xl">
			<div class="mx-auto">
				<img src="./assets/images/login.svg" alt="" width="150px">
			</div>

			<div class="mt-16 w-full px-24">
				<input type="text" placeholder="Username" name="username" class="border border-black rounded-sm bg-gray-50 py-1 px-4 w-full" id="login-username">
			</div>

			<button type="button" class="bg-black py-1 px-6 text-white text-center mt-4 rounded-sm" id="login-button">
				Start
			</button>
		</div>
	</div>
	<div class="absolute top-0 right-0 -z-50">
		<img src="./assets/images/overlay_1.png" alt="" width="200px">
	</div>
	<div class="absolute bottom-0 left-0 -z-50">
		<img src="./assets/images/overlay_2.png" alt="" width="200px">
	</div>

	<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
	<script src="./assets/js/index.js"></script>
</body>

</html>