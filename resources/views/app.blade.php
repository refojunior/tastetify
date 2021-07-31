<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <title>{{ $page['props']['title'] ?? 'Hello World' }} - Tastetify</title>
    <script src="{{ mix('/js/app.js') }}" defer></script>

    <!-- GOOGLE META-->
    <meta name="robots" content="index,follow">
    <meta name="description" content="Generate a cool card with several templates or get to know your most played songs or artists in Spotify! Visit Tastetify now." />

    <!-- TWITTER META -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@tastetify">
    <meta name="twitter:creator" content="@styles77">
    <meta name="twitter:title" content="Welcome - Tastetify">
    <meta name="twitter:description" content="Generate a cool card with several templates or get to know your most played songs or artists in Spotify! Visit Tastetify now.">
    <meta name="twitter:image" content="https://tastetify.herokuapp.com/img/banner-meta.jpg">

    <!-- FACEBOOK META -->
    <meta property="og:url" content="https://tastetify.herokuapp.com" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Welcome - Tastetify" />
    <meta property="og:description" content="Generate a cool card with several templates or get to know your most played songs or artists in Spotify! Visit Tastetify now." />
    <meta property="og:image" content="https://tastetify.herokuapp.com/img/banner-meta.jpg" />
  
  </head>
  <body>
      @inertia
  </body>
</html>