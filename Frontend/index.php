<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Login</title>
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
	<link rel="stylesheet" href="/assets/css/main.css">
</head>

<body>

	<div class="container flex justify-center items-center pt-28">
		<div class="w-full flex flex-col justify-center items-center border border-black rounded-md shadow-md py-16 pb-28 max-w-xl">
			<div class="mx-auto">
				<img src="/assets/images/login.svg" alt="" width="150px">
			</div>

			<div class="mt-16 w-full px-24">
				<input type="text" placeholder="Username" name="username" class="border border-black rounded-sm bg-gray-50 py-1 px-4 w-full" id="login-username">
			</div>

			<button type="button" class="bg-black py-1 px-6 text-white text-center mt-4 rounded-sm" id="login-button">
				Login
			</button>
			<button type="button" class="hidden bg-black py-1 px-6 text-white text-center mt-4 rounded-sm" id="loading-button">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="animate-spin w-4 h-4">
					<path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
				</svg>
			</button>
			<a type="button" class="border border-black py-1 px-6 text-black text-center mt-4 rounded-sm" href="practice.php" onclick="window.localStorage.removeItem('username')">
				Skip
			</a>
		</div>
	</div>
	<div class="absolute top-0 right-0 -z-50">
		<img src="/assets/images/overlay_1.png" alt="" width="200px">
	</div>
	<div class="absolute bottom-0 left-0 -z-50">
		<img src="/assets/images/overlay_2.png" alt="" width="200px">
	</div>

	<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
	<script src="/assets/js/index.js"></script>
</body>

</html>