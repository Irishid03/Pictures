<html>
<head>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<x-app-layout class='bg-white-100'>

<div class='py-4'>
    <div class='max-w-7xl mx-auto sm:px-4 lg:px-2'> 
        <div class='bg-white overflow-hidden shadow-sm sm:rounded-lg'>
            <div class='pictures'>
                <div class='columns-5 gap-4 px-52'>
                    @if($randomPost && count($randomPost) > 0)
                        @foreach($randomPost as $post)

                        <div class="mb-2">
                        <button onclick="openPopup('{{ addslashes($post->image) }}', '{{ addslashes($post->name) }}', '{{ addslashes($post->description) }}', '{{ addslashes($post->camera) }}', '{{ addslashes($post->ISO) }}', '{{ addslashes($post->aperture) }}', '{{ addslashes($post->shutterspeed) }}', '{{ addslashes($post->zoom) }}')">
                        <img src="{{ $post->image }}" alt="Post Image" class="w-full h-auto object-cover"> 
                            </button>
                        </div>

                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pop-up -->
<div id="popup-modal" class="fixed m-16 top-0 backdrop-blur-sm flex items-center justify-center hidden">
    <div class="bg-white p-6 mt-20 border shadow-lg flex flex-col m-80 w-[40rem] h-[25rem]">
        <div class="flex">
            <div class="w-1/2">
            <img id="popup-image" alt="Selected Post" class="w-56 h-full pt-0 object-contain" src="" />
            </div>

            <div class="w-1/2 pl-6">

                <div class="mb-2">
                    <label class="block text-gray-700 text-base font-bold " for="name">Name Picture</label>
                    <label id="name"></label>
                </div>

                <div class="mb-2">
                    <label class="block text-gray-700 text-base font-bold " for="description">Description</label>
                    <label id="description"></label>
                </div>

                <div class="mb-2">
                    <label class="block text-gray-700 text-base font-bold" for="camera">Camera Information</label>
                    <label id="camera"></label>
                </div>

                <div class="w-1/2 grid grid-cols-2 mr-4 gap-2 ">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold" for="ISO">ISO</label>
                        <label id="ISO"></label>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-bold" for="aperture">Aperture</label>
                        <label id="aperture"></label>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-bold" for="zoom">Zoom</label>
                        <label id="zoom"></label>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-bold" for="shutterspeed">Shutterspeed</label>
                        <label id="shutterspeed"></label>
                    </div>
                </div>

                <div class="mt-4 text-center">
                    <button class="bg-slate-800 text-white font-bold float-start py-2 px-4 rounded" onclick="closePopup()">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

function openPopup(imageSrc, name, description, camera, ISO, aperture, shutterspeed, zoom) {
    console.log("Opening popup for:", name); // Log name for debugging
    document.getElementById('popup-image').src = imageSrc; // Set the image source to the clicked image
    document.getElementById('name').innerHTML = name; // Set the name
    document.getElementById('description').innerHTML = description; // Set the description
    document.getElementById('camera').innerHTML = camera; // Set the camera information
    document.getElementById('ISO').innerHTML = ISO; // Set the ISO
    document.getElementById('aperture').innerHTML = aperture; // Set the aperture
    document.getElementById('shutterspeed').innerHTML = shutterspeed; // Set the shutterspeed
    document.getElementById('zoom').innerHTML = zoom; // Set the zoom
    document.getElementById('popup-modal').classList.remove('hidden'); // Show the popup}
}

    function closePopup() {
        document.getElementById('popup-modal').classList.add('hidden'); // Hide the popup
    }
</script>



</x-app-layout>
