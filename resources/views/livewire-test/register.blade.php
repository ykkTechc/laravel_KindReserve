<html>
  <head>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
    livewireテスト <span class="text-blue-600">register</span>
    @livewire('register')
    @livewireScripts
  </body>
</html>