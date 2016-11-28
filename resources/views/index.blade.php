<html>
<head>
  <title>Index</title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body class="container">
  <?php
  // initiate Helpers
  $helper = new \app\Helpers\DateTimeHelper;
  $song = new \app\Helpers\SongHelper;
  ?>
    <div class="jumbotron">
      <h3> <a href="/listen.m3u">NOW PLAYING:</a> </h3>
      <h1>
        @foreach($np as $p)
          {{ $p->artist }} - {{ $p->title }}
        @endforeach
      </h1>
    </div>
    <h3>History:</h3>
    <ul>
    @foreach($history as $h)
      <li>[{{ $helper->convertTime($h->duration) }}] {{ $h->artist }} - {{ $h->title }}
    @endforeach
    </ul>
    <h3>Upcoming</h3>
    <ul>
      @foreach($upcoming as $u)
        @foreach($song->getSongByID($u->songID)->get() as $track)
          <li>[{{ $helper->convertTime($track->duration) }}] {{ $track->artist }} - {{ $track->title }}</li>
        @endforeach
      @endforeach
    </ul>
</body>
</html>
