<html class="h-full bg-white">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
</head>

<body class="h-full overflow-x-hidden">

    <div class="min-h-full">
        <x-header class="fixed top-0 left-0 w-full z-50 bg-white shadow">okeh</x-header>

        <x-navbar2 class="fixed top-[64px] left-0 w-full z-40 bg-blue-900 shadow"></x-navbar2>

        <main class="bg-white pt-[150px]"> 
            {{ $slot }}
        </main>

    </div>

</body>
</html>
