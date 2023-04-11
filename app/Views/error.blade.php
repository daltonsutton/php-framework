<!doctype html>
<html lang="{{ $language }}">
<head>
  <meta charset="{{ $charset }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title }}</title>
  {!! styles($styles) !!}
</head>
<body class="flex flex-col h-screen w-full items-center justify-center bg-bunker-950">
  
  <span class="text-4xl md:text-7xl font-bold text-bunker-100">{{ $title }}</span>
  <span class="text-lg md:text-2xl text-bunker-200">{!! $content !!}</span>

  {!! scripts($scripts) !!}
</body>
</html>