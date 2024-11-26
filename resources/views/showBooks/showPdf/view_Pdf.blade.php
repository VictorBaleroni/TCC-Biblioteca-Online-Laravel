<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script src="{{ asset('pdfjs-dist/build/pdf.min.js') }}"></script>
		
	<title>Biblioteca</title>

	@vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="p-0 m-0 dark:bg-zinc-800">
	
	<main class="flex justify-center items-center w-full min-h-[93vh]">
		<h3 class="text-center text-white text-2xl">Load...</h3>
		<canvas class="pdf-viewer hidden">
		</canvas>
	
	</main>
	<footer class="sticky object-cover inset-y-0 h-[5rem] dark:bg-gray-900">
		<ul class="flex justify-between items-center h-full">
			<input type="hidden" value="{{ asset( "storage/$book->livro" ) }}" name="showPdf">
			
			<div class="flex">
				<a href="{{ route('dashboard') }}" class="pl-4  pr-[2.5rem]">
					<img class="absolute rounded dark:hover:bg-gray-700 group -ml-2 h-9 w-9" src="{{ asset('img/icon_back_in.ico') }}" alt="button">
				  </a>
				<p class="text-lg text-white pl-3">{{ $book->nome }}</p>
			</div>
			
			<div class="pl-[5rem]">
				<li class="flex">
				
					<a id="previous" class="pr-[2.5rem]">
					<img class="absolute rounded-xl dark:hover:bg-gray-700 group cursor-pointer -ml-2 h-8 w-8" src="{{ asset('img/icon_back.ico') }}" alt="button">
				  	</a>
				
					<span class="text-lg text-white" id="current_page">0 de 0</span>

					<a id="next" class="pl-[1.5rem]">
					<img class="absolute rounded-xl dark:hover:bg-gray-700 group cursor-pointer -ml-2 h-8 w-8" src="{{ asset('img/icon_next.ico') }}" alt="button">
				  	</a>
				</li>
			</div>
			<li class="pr-5">
				<span class="pr-4 text-sm text-white align-middle" id="zoomValue">150%</span>
				<input class="h-2 align-middle bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" type="range" id="zoom" name="cowbell" min="100" max="300" value="150" step="25">
			</li>
		</ul>
	</footer>

<script src="{{ asset('scriptsPdf/index.js') }}"></script>
</body>
</html>
