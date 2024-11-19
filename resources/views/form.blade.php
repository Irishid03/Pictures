<x-app-layout class="bg-white-100">
<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="grid justify-center">
	<!-- Header -->
	<div class="card mt-2" style="align-content: center; width: 700px; height: auto;">
		<div class="card-header text-center font-weight-bold">
			Upload your picture
		</div>
		<!-- Posts -->
		<div class="card-body">
		<form method="POST" action="{{ route('form.store') }}" enctype="multipart/form-data">
		@csrf
				<!-- image + image button -->
				<div class="flex ml-4">
					<div class="w-1/2">
						<p><img id="output" class="w-2/3 h-48 object-cover" style="width: 300px; height:200;"></p>
					</div>
					<!-- Name picture -->
					<div class="w-1/2 flex flex-col space-y-2 ml-5">
						<div class="w-36 h-8 cursor-pointer bg-slate-900 decoration-white text-center rounded-md bg-gray-800 uppercase">
							<p><label for="file" class="text-white text-sm pt-1.5 cursor-pointer">Upload Image</label></p>
							<p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;"></p>
						</div>
						
						<div class="pr-4">
							<x-input-label for="name" :value="__('Name picture')" />
							<x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
							<x-input-error :messages="$errors->get('name')" class="mt-2" />
						</div>
						<!-- Location -->
						<div class="pr-4">
							<x-input-label for="location" :value="__('Location')" />
							<x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required autofocus autocomplete="location" />
							<x-input-error :messages="$errors->get('location')" class="mt-2" />
						</div>
					</div>
				</div>
				<!-- Script Show Image -->
				<script>
					var loadFile = function(event) {
						var image = document.getElementById('output');
						image.src = URL.createObjectURL(event.target.files[0]);
					};
				</script>
				<!-- Description -->
				<div class="pl-4 pr-4">
					<x-input-label for="description" :value="__('Picture description')" />
					<x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
					<x-input-error :messages="$errors->get('description')" class="mt-2" />
				</div>
				<!-- Camera Information -->
				<div class="pl-4 pr-4 pt-2">
					<x-input-label for="camera" :value="__('Camera Information')" />
					<x-text-input id="camera" class="block mt-1 w-full" type="text" name="camera" :value="old('camera')" required autofocus autocomplete="camera" />
					<x-input-error :messages="$errors->get('camera')" class="mt-2" />
				</div>
				<!-- Picture settings -->
				<div class="pl-4 pr-4 pt-2">
					<div class="grid grid-cols-2 gap-2">
						<!-- ISO -->
						<div>
							<x-input-label for="iso" :value="__('ISO')" />
							<x-text-input id="iso" class="block w-full" type="text" name="ISO" :value="old('ISO')" required autofocus autocomplete="ISO" placeholder="400" />
							<x-input-error :messages="$errors->get('ISO')" class="mt-2" />
						</div>
						<!-- Aperture -->
						<div>
							<x-input-label for="aperture" :value="__('Aperture')" />
							<x-text-input id="aperture" class="block w-full" type="text" name="aperture" :value="old('aperture')" required autofocus autocomplete="aperture" placeholder="5'6" />
							<x-input-error :messages="$errors->get('aperture')" class="mt-2" />
						</div>
						<!-- Shutterspeed -->
						<div>
							<x-input-label for="shutterspeed" :value="__('Shutterspeed')" />
							<x-text-input id="shutterspeed" class="block w-full" type="text" name="shutterspeed" :value="old('shutterspeed')" required autocomplete="shutterspeed" placeholder="1/250" />
							<x-input-error :messages="$errors->get('shutterspeed')" class="mt-2" />
						</div>
						<!-- Zoom -->
						<div>
							<x-input-label for="zoom" :value="__('Zoom')" />
							<x-text-input id="zoom" class="block w-full" type="text" name="zoom" :value="old('zoom')" required autofocus autocomplete="zoom" placeholder="20mm" />
							<x-input-error :messages="$errors->get('zoom')" class="mt-2" />
						</div>
					</div>
				</div>
				<!-- Submit button -->
				<x-primary-button class="ml-6 w-26 mt-2">{{ __('Upload') }}</x-primary-button>
			</form>
		</div>
	</div>
</div>

</body>
</html>
</x-app-layout>
