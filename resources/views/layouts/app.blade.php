<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
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

        <style>
            /* Chrome, Safari, Edge, Opera */
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            /* Firefox */
            input[type=number] {
                -moz-appearance: textfield;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
    <livewire:toasts />

    <div class="min-h-screen bg-gray-100" id="background" style="background-size: contain">
            <livewire:layout.navigation />

            <!-- Page Content -->
            <main>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="background-color: rgba(255, 255,255, .95)">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    @livewireScriptConfig
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
