<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @vite('resources/js/app.js')
        @vite('resources/css/app.css')
    </head>
    <body>
       <div id="app">
        <app/>
       </div>
    </body>
</html>
