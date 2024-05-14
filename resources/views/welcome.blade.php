<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @vite('resources/js/app.js')
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-100">
       <div id="app">
        <app/>
       </div>
    </body>
</html>
