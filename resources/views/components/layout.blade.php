<html class="h-full bg-white">

<head>
    <link href="/src/style.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
</head>

<body class="h-full">
    <!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script> -->
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-900">
  <body class="h-full">
  ```
-->
    <div class="min-h-full">
        <x-header1>okeh</x-header1>
        <x-navbar></x-navbar>
        <main class="bg-white">
            @if (request()->is('/'))
            {{ $slot }}
            @else
            <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
            @endif
        </main>

    </div>

</body>

</html>