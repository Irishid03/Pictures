<html>
<head>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-200">
    <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded" onclick="document.getElementById('popup-modal').classList.remove('hidden')">
        Open Popup
    </button>

    <div id="popup-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 shadow-lg flex">
            <div class="w-1/2">
                <img alt="A tall, ornate building with a blue sky background" class="w-full h-auto" height="600" src="https://storage.googleapis.com/a1aa/image/tqOjg7Aqzz5kBdfYEG4G7UE7hrBtYy0l0MIy7GpxMk1wxt0JA.jpg" width="400"/>
            </div>

            <div class="w-1/2 pl-6">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Username</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" placeholder="Username" type="text"/>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Discription</label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" placeholder="Discription"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="camera-info">Camera - lens information</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="camera-info" placeholder="Camera - lens information" type="text"/>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="iso">ISO</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="iso" placeholder="200" type="text"/>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="aperture">Aperture</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="aperture" placeholder="5/6" type="text"/>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="shutterspeed">Shutterspeed</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="shutterspeed" placeholder="1/250s" type="text"/>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="zoom">Zoom</label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="zoom" placeholder="35mm" type="text"/>
                    </div>
                </div>

                <div>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text"/>
                </div>

                <div class="mt-4">
                    <button class="bg-red-500 text-white font-bold py-2 px-4 rounded" onclick="document.getElementById('popup-modal').classList.add('hidden')">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>