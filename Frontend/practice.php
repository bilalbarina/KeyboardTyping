<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Practice</title>
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

	<div class="container pt-20 px-20 xl:px-60">
		<div class="flex flex-col justify-center items-center">
			<div class="mx-auto">
				<img src="./assets/images/heading.svg" alt="" width="300px">
			</div>
			<div class="relative w-full">
				<div class="bg-white border border-black p-8 mt-12 min-h-full text-xl flex-wrap font-mono" id="text-box"></div>
				<div class="absolute -right-3 -bottom-3 rounded-full border border-black text-sm h-10 w-10 bg-white flex items-center justify-center" id="timer">
					60
				</div>
			</div>

			<div id="keyboard" class="mt-12">
				<div class="flex flex-col justify-center items-center space-y-2">

					<?php
					$rows = [
						['a', 'z', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p'],
						['q', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm'],
						['w', 'x', 'c', 'v', 'b', 'n', '\'', ','],
						['.', ';', ':', '-', '_', '!', '?']
					];

					foreach ($rows as $keys) :
					?>
						<div class="flex flex-row space-x-1">
							<?php
							foreach ($keys as $key) :
							?>
								<div id="key-<?= $key ?>" class="bg-white pb-2 pr-6 pl-1 pt-0.5 border border-black rounded-md" keyboard-key>
									<?= $key ?>
								</div>
							<?php endforeach ?>
						</div>
					<?php endforeach ?>
					<div class="px-8 w-full">
					<div id="key- " class="bg-white h-8 pb-2 pr-6 pl-1 pt-0.5 border border-black rounded-md" keyboard-key></div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="absolute top-0 right-0 -z-50">
		<img src="./assets/images/overlay_1.png" alt="" width="200px">
	</div>
	<div class="absolute top-12 right-0 -z-50">
		<img src="./assets/images/overlay_4.png" alt="" width="200px">
	</div>
	<div class="absolute top-6 left-0 -z-50">
		<img src="./assets/images/overlay_3.png" alt="" width="200px">
	</div>
	<div class="absolute top-60 left-0 -z-50">
		<img src="./assets/images/overlay_5.png" alt="" width="130px">
	</div>
	<div class="absolute bottom-0 left-0 -z-50">
		<img src="./assets/images/overlay_2.png" alt="" width="200px">
	</div>
	<div class="absolute bottom-0 right-0 -z-50">
		<img src="./assets/images/overlay_6.png" alt="" width="200px">
	</div>


	<script src="./assets/js/main.js"></script>
</body>

</html>