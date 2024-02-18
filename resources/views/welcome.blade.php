<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Luna's World</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased" id="background" style="background-size: contain">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center  dark:bg-dots-lighter selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif

            <div class="max-w-7xl mx-auto p-6 lg:p-8">


            </div>
        </div>
    </body>
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

        var currentIndex = 0;
        var background = document.getElementById('background');

        function rotateBackground() {
            background.style.backgroundImage = 'url(' + images[currentIndex] + ')';
            currentIndex = (currentIndex + 1) % images.length;
        }

        // Initial rotation
        rotateBackground();

        // Rotate background every 5 seconds
        setInterval(rotateBackground, 5000);
    });
</script>
</html>
