<x-app-layout>

<html>  
    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>@import url('https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap');</style>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-100">
        <div class="container">
            <div class="row pr-8 pl-8">

                <!-- profile info -->
                
                <div class="col">
                    <div class="container mx-auto p-5">
                        <div class="flex items-center space-x-6 mb-4">
                            <img alt="Profile picture" class="h-28 w-28 object-cover rounded-full" height="150" src="{{ asset('images/123.jpg') }}" width="150"/>
                                <div>
                                    <h1 class="text-2xl font-bold text-gray-900">{{ auth()->user()->name }}</h1>
                                    <!-- <p class="text-gray-600">@ {{ auth()->user()->profile->username }}</p> -->
                                </div>
                        </div>

                        <div class="mb-4">
                            <h2 class="text-xl font-semibold text-gray-800">About Me</h2>
                            <p class="text-gray-600">{{ auth()->user()->profile->description }}</p>
                        </div>

                        <div class="mb-4">
                            <h2 class="text-xl font-semibold text-gray-800">Camera information</h2>
                            <p class="text-gray-600">{{ auth()->user()->profile->camera_info }}</p>
                        </div>

                        @if(auth()->check() && auth()->user()->profile && auth()->user())

                        <div class="mb-4">
                            <h2 class="text-xl font-semibold text-gray-800">Contact</h2>
                               
                                <div class="flex items-center text-gray-600">
                                    <i class="fab fa-instagram mr-2"></i>
                                    <span>{{ auth()->user()->profile->instagram }}</span>
                                </div>

                                <div class="flex items-center text-gray-600 mt-2">
                                    <i class="fab fa-facebook mr-2"></i>
                                    <span>{{ auth()->user()->profile->facebook }}</span>
                                </div>

                                <div class="flex items-center text-gray-600 mt-2">
                                    <i class="fas fa-envelope mr-2"></i>
                                    <span>{{ auth()->user()->email }}</span>
                                </div>

                                @else
                                    <div class="column">
                                        <p></p>
                                    </div>
                                @endif

                        </div>
                    </div>
                </div>

                <!-- profile info ^^ -->

                <div class="col">
    <div class="pictures">
        <h2 class="text-xl font-semibold text-gray-800 ml-10 mt-4">My Pictures!</h2>
        <div class="picture_card scroll ml-10">
            <div class="row">

            <div class="columns-3 gap-2 px-52">
                @if($posts && count($posts) > 0)
                    <div class="flex flex-wrap justify-between">
                        @foreach($posts as $post)
                        <div class="mb-2">
                        <button onclick="openPopup('{{ addslashes($post->image) }}', '{{ addslashes($post->name) }}', '{{ addslashes($post->description) }}', '{{ addslashes($post->camera) }}', '{{ addslashes($post->ISO) }}', '{{ addslashes($post->aperture) }}', '{{ addslashes($post->shutterspeed) }}', '{{ addslashes($post->zoom) }}')">
                        <img src="{{ $post->image }}" alt="Post Image" class="w-full h-auto object-cover"> 
                            </button>
                        </div>
                        @endforeach
                    </div>
                @else
                    <p>No posts available.</p> <!-- This will help you see if the posts are empty -->
                @endif


            </div>
        </div>
    </div>
</div>

<!-- Pop-up -->
<div id="popup-modal" class="fixed m-16 inset-4 backdrop-blur-sm flex items-center justify-center hidden">
    <div class="bg-white p-6 border shadow-lg flex flex-col m-80 w-[40rem] h-[25rem]">
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

</body>
</html>


<style>
/* Picture gr */
a {
    text-decoration: none;
    color: black;
}
.custom-button {
    padding: 0;
    margin: 0;
    border: none; /* Remove border if necessary */
    background: transparent; /* Make background transparent if needed */
}
.picture_card {
    width: 470px;
    height: 470px;
    display: inline-block;
  }
    
/* picture foto's  */
.scroll {
    padding-left: 6.7px; 
    max-height: 500px; 
    overflow-x: hidden;
}

#popup-image {
    margin: 0; /* Remove any default margin */
}

</style>