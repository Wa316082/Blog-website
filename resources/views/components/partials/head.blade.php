<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- Facebook meta --}}
<meta property= "og:url" content = "{{ url ()->current() }}"/>
<meta property= "og:image" content = "{{ config ('app.url') }}/@yield('og:image')"/>
<meta property = "og:title" content = "@yield('og:title')"/>


<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

<!-- Scripts -->

@vite(
[
    'resources/css/app.css', 
    'resources/js/app.js',
    'resources/js/main.js',
    'resources/js/drop-down.js',

    
])
<title>@yield('title','Blog')</title>

<livewire:Styles />
@bukStyles(true)