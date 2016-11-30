<html>
<head>
  <title>Index</title>
  <!-- Latest compiled and minified CSS
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  -->
  <link rel="stylesheet" href="https://bootswatch.com/darkly/bootstrap.css" >
  <link rel="stylesheet" href="https://bootswatch.com/darkly/bootstrap.min.css" >
  <link rel="stylesheet" href="/css/audio-stream-player.css">
  <link rel="stylesheet" href="//cdn.plyr.io/1.8.2/plyr.css">



  <style>
    .table tbody>tr>td.vert-align{
      vertical-align: middle;
    }
  </style>
</head>

<body>
  <?php
  // initiate Helpers
  $helper = new \app\Helpers\DateTimeHelper;
  $song = new \app\Helpers\SongHelper;
  ?>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">BriFM</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="/">
          @if(!empty($np))
            @foreach($np as $p)
              {{ $p->artist }} - {{ $p->title }}
            @endforeach
          @endif
          </a></li>
        </ul>
        <form class="navbar-form navbar-right" method="POST" action="/search">
          <div class="form-group">
            <input type="text" name="song" placeholder="Song" class="form-control">
          </div>
          <button type="submit" class="btn btn-success">Search</button>
        </form>
      </div><!--/.navbar-collapse -->
    </div>
  </nav>
    <div class="jumbotron">
      <div class="container">
        <h3 class="text-success"> NOW PLAYING  </h3>
        <h1>
          @if(!empty($np))
            @foreach($np as $p)
              {{ $p->artist }} - {{ $p->title }}
            @endforeach
          @endif
        </h1>
      </div>
    </div>
  <div class="container">
      <script src="https://cdn.plyr.io/2.0.11/plyr.js"></script>

    <audio controls>
			<source src="http://server.diamant.vet:8000/listen" type="audio/ogg"><a href="/listen.m3u">Download</a>
		</audio>

    <script type="text/javascript">
		  var player = plyr.setup();
    </script>

  </div>
</body>

  <!-- Rangetouch to fix <input type="range"> on touch devices (see https://rangetouch.com) -->
  <script src="https://cdn.rangetouch.com/0.0.9/rangetouch.js" async></script>

</html>
