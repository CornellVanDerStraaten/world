<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"  id="background" style="background-size: contain">

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var images = [
                    "{{ asset('images/img1.png') }}",
                    "{{ asset('images/img2.png') }}",
                    "{{ asset('images/img3.png') }}",
                    "{{ asset('images/img4.png') }}",
                    "{{ asset('images/img5.png') }}",
                    "{{ asset('images/img6.png') }}",
                    "{{ asset('images/img7.png') }}",
                    "{{ asset('images/img8.png') }}",
                    "{{ asset('images/img9.png') }}",
                    "{{ asset('images/img10.png') }}",
                    // Add more image URLs as needed
                ];

                var background = document.getElementById('background');

                function rotateBackground() {
                    var randomIndex = Math.floor(Math.random() * images.length);

                    background.style.backgroundImage = 'url(' + images[randomIndex] + ')';
                }

                // Initial rotation
                rotateBackground();

                // Rotate background every 5 seconds
                setInterval(rotateBackground, 5000);
            });
        </script>
    </body>
</html>
