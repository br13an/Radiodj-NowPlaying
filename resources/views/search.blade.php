<html>
<head>
  <title>Index</title>
  <!-- Latest compiled and minified CSS
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  -->
  <link rel="stylesheet" href="https://bootswatch.com/darkly/bootstrap.css" >
  <link rel="stylesheet" href="https://bootswatch.com/darkly/bootstrap.min.css" >
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
        <h3 class="text-success"> SEARCHING FOR:  </h3>
        <h1>
          {{ $query }}
        </h1>
      </div>
    </div>
  <div class="container">
    <h3>tracks</h3>
    <table class="table table-striped">
      <tr>
        <th>ID</th>
        <th>Duration</th>
        <th>Artist</th>
        <th>Title</th>
        <th>Album</th>
      </tr>
      <tbody>
        @foreach($songs as $u)
          <tr>
            <form id="form" action="/api/v1/request/{{ $u->ID }}" method="POST">
              <td class="vert-align">
                    <button class="btn btn-sm btn-success" type="submit" >Request: {{ $u->ID }}</button>
              </td>
            </form>
            <td class="vert-align">
              {{ $helper->convertTime($u->duration) }}
            </td>
            <td class="vert-align">
              {{ $u->artist }}
            </td>
            <td class="vert-align">
              {{ $u->title }}
            </td>
            <td class="vert-align">
              {{ $u->album }}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>
