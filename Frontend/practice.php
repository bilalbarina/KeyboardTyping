<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Practice</title>
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

	<div class="container py-16 px-20 xl:px-60">
		<div class="flex flex-col justify-center items-center">
			<div class="mx-auto">
				<img src="/assets/images/heading.svg" alt="" width="300px">
			</div>
			<div class="relative w-full mt-6">
				<div class="absolute left-0 top-0 border-r border-b border-black py-1 px-4 text-sm inline-flex items-center space-x-1 cursor-pointer" onclick="showLeaderboard()">
					<div class="pb-0.5">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-3 h-3">
							<path fill-rule="evenodd" d="M10 1c-1.828 0-3.623.149-5.371.435a.75.75 0 00-.629.74v.387c-.827.157-1.642.345-2.445.564a.75.75 0 00-.552.698 5 5 0 004.503 5.152 6 6 0 002.946 1.822A6.451 6.451 0 017.768 13H7.5A1.5 1.5 0 006 14.5V17h-.75C4.56 17 4 17.56 4 18.25c0 .414.336.75.75.75h10.5a.75.75 0 00.75-.75c0-.69-.56-1.25-1.25-1.25H14v-2.5a1.5 1.5 0 00-1.5-1.5h-.268a6.453 6.453 0 01-.684-2.202 6 6 0 002.946-1.822 5 5 0 004.503-5.152.75.75 0 00-.552-.698A31.804 31.804 0 0016 2.562v-.387a.75.75 0 00-.629-.74A33.227 33.227 0 0010 1zM2.525 4.422C3.012 4.3 3.504 4.19 4 4.09V5c0 .74.134 1.448.38 2.103a3.503 3.503 0 01-1.855-2.68zm14.95 0a3.503 3.503 0 01-1.854 2.68C15.866 6.449 16 5.74 16 5v-.91c.496.099.988.21 1.475.332z" clip-rule="evenodd" />
						</svg>

					</div>
					<div>
						Score: <span id="score"> 0 </span>
					</div>
				</div>
				<div class="bg-white border border-black p-8 pt-10 min-h-full text-xl flex-wrap font-mono" id="text-box"></div>
				<div class="absolute -right-3 -bottom-3 rounded-full border border-black text-sm h-10 w-10 bg-white flex items-center justify-center" id="timer">
				</div>
			</div>

			<div id="keyboard" class="mt-8">
				<div class="flex flex-col justify-center items-center space-y-2">

					<?php
					$rows = [
						['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'],
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
	<div class="absolute inset-0 flex justify-center items-center bg-gray-400 bg-opacity-60" id="start-modal">
		<div class="bg-white rounded-md bg-opacity-100 z-50 px-28 py-16 flex justify-center flex-col items-center">
			<div class="text-xl font-semibold"> Ready to start? </div>
			<button class="bg-black py-1 px-6 text-white text-center mt-4 rounded-sm w-28" id="start-button">
				Start
			</button>
			<button class="border border-black py-1 px-6 text-black text-center mt-2 rounded-sm w-28" onclick="showLeaderboard()">
				Leaderboard
			</button>
		</div>
	</div>

	<div class="absolute inset-0 flex justify-center items-center bg-gray-400 bg-opacity-60 hidden" id="result-modal">
		<div class="bg-white rounded-md bg-opacity-100 z-50 px-28 py-16 flex justify-center flex-col items-center">
			<div class="text-xl font-semibold"> Your result </div>
			<div class="inline-flex mt-2 space-x-2">
				<div>
					Words per minute:
				</div>
				<div id="words-per-minute">
					0
				</div>
			</div>

			<button class="bg-black py-1 px-6 text-white text-center mt-4 rounded-sm w-28" id="tryagain-button">
				Try again
			</button>
			<button class="border border-black py-1 px-6 text-black text-center mt-2 rounded-sm w-28" onclick="showLeaderboard()">
				Leaderboard
			</button>
		</div>
	</div>

	<div class="absolute inset-0 flex justify-center items-center bg-gray-400 bg-opacity-60 hidden" id="leaderboard-modal">
		<div class="bg-white rounded-sm bg-opacity-100 z-50 px-16 pt-4 pb-16 flex flex-col justify-center items-center w-full max-w-md">
			<div class="text-xl font-semibold"> Leaderboard </div>
			<div class="px-4 py-1 text-center rounded-md flex justify-between w-full mt-6">
				<div>
					Username
				</div>
				<div>
					Words Per Minute
				</div>
			</div>
			<ul class="w-full space-y-2 text-center" id="leaderboard-list">
				<span class="animate-ping text-2xl">. . .</span>
			</ul>
			<div>
				<button class="bg-black py-1 px-6 text-white text-center mt-4 rounded-sm" onclick="document.location.reload()" id="start-button">
					Close
				</button>
			</div>

		</div>

	</div>

	<div class="absolute top-0 right-0 -z-50">
		<img src="/assets/images/overlay_1.png" alt="" width="200px">
	</div>
	<div class="absolute top-12 right-0 -z-50">
		<img src="/assets/images/overlay_4.png" alt="" width="200px">
	</div>
	<div class="absolute top-6 left-0 -z-50">
		<img src="/assets/images/overlay_3.png" alt="" width="200px">
	</div>
	<div class="absolute top-60 left-0 -z-50">
		<img src="/assets/images/overlay_5.png" alt="" width="130px">
	</div>
	<div class="absolute bottom-0 left-0 -z-50">
		<img src="/assets/images/overlay_2.png" alt="" width="200px">
	</div>
	<div class="absolute bottom-0 right-0 -z-50">
		<img src="/assets/images/overlay_6.png" alt="" width="200px">
	</div>

	<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
	<script src="/assets/js/practice.js"></script>
</body>

</html>