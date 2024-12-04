<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="{{asset('epubjs/jszip.min.js')}}"></script>
        <script src="{{asset('epubjs/epub.min.js')}}"></script>
        
        <title>Biblioteca</title>
</head>
<body class="dark:bg-zinc-800">
      <div class="py-5">
        <main class="flex justify-center items-center w-full min-h-[93vh]">
          <div class="max-w-xl mx-auto bg-white shadow-xl">
            <div id="showEpub"></div>
          </div>
        </main>
      </div>
      
   <footer class="sticky object-cover inset-y-0 h-[5rem] dark:bg-gray-900">
     <ul class="flex justify-between items-center h-full">
       <input type="hidden" value="teste" name="showPdf">
       
       <div class="flex">
         <a href="{{route('dashboard')}}" class="pl-4  pr-[2.5rem]">
           <img class="absolute rounded dark:hover:bg-gray-700 group -ml-2 h-9 w-9" src="{{ asset('img/icon_back_in.ico') }}" alt="button">
           </a>
         <p class="text-lg text-white pl-3">teste</p>
       </div>
       
       <div class="pl-[5rem]">
         <li class="flex">
         
           <a id="prev" class="pr-[2.5rem]">
           <img class="absolute rounded-xl dark:hover:bg-gray-700 group cursor-pointer -ml-2 h-8 w-8" src="{{ asset('img/icon_back.ico') }}" alt="button">
             </a>
         
           <span id="page-info" class="text-lg text-white">Página 1 de 1</span>
   
           <a id="next" class="pl-[1.5rem]">
           <img class="absolute rounded-xl dark:hover:bg-gray-700 group cursor-pointer -ml-2 h-8 w-8" src="{{ asset('img/icon_next.ico') }}" alt="button">
             </a>
         </li>
       </div>
       <li class="pr-5">
         <span class="pr-4 text-sm text-white align-middle" id="zoom-value">120%</span>
         <input id="zoom" type="range" min="80" max="200" step="10" value="120" class="h-2 align-middle bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700"/>
       </li>
     </ul>
   </footer>

<script>
  var book = ePub('{{asset("storage/$book->livro")}}');
  var rendition = book.renderTo("showEpub", {width: 600, height: 850});
  var displayed = rendition.display();

  const updatePageInfo = () => {
  const displayed = rendition.location.start.displayed;
  const currentPage = displayed.page;
  const totalPages = displayed.total;

  document.getElementById("page-info").textContent = `Página ${currentPage} de ${totalPages}`;
  };

  rendition.on("relocated", () => {
    updatePageInfo();
  });
  
  document.getElementById("prev").addEventListener("click", () => {
    rendition.prev();
  });

  document.getElementById("next").addEventListener("click", () => {
    rendition.next();
  });

  const zoomInput = document.getElementById("zoom");
  const zoomValue = document.getElementById("zoom-value");

  zoomInput.addEventListener("input", (event) => {
    const zoom = event.target.value;

    zoomValue.textContent = `${zoom}%`;

    rendition.themes.fontSize(`${zoom}%`);
  });
</script>
</body>
</html>