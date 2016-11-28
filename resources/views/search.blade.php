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
      <h3> SEARCHING FOR:  </h3>
      <h1>
        {{ $query }}
      </h1>
    </div>
    <h3>tracks</h3>
    <table class="table table-striped">
      <tr>
        <th>ID</th>
        <th>Duration</th>
        <th>Artist</th>
        <th>Title</th>
      </tr>
      <tbody>
        @foreach($songs as $u)
          <tr>
            <td>
              <b>
                <form id="form" action="/api/v1/request/{{ $u->ID }}" method="POST">
                  <button type="submit" >{{ $u->ID }}</button>
                </form>
              </b>
            </td>
            <td>
              {{ $helper->convertTime($u->duration) }}
            </td>
            <td>
              {{ $u->artist }}
            </td>
            <td>
              {{ $u->title }}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
</body>
</html>
