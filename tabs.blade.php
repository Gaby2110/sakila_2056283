<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tab pelicula</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.css" integrity="sha256-0XAFLBbK7DgQ8t7mRWU5BF2OMm9tjtfH945Z7TTeNIo=" crossorigin="anonymous" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
</head>
<body>
 
<div id="tabs">
  <ul>
    <?php $i = 1; ?>
      @foreach ($categorias as $cat)
  <li><a href="#tabs-{{$i}}">{{$cat->name}}</a></li>
        <?php $i ++; ?>
      @endforeach
  </ul>
  <?php $x = 1; ?>
      @foreach ($categorias as $cat)
        <div id="tabs-{{$x}}">
            <p>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                        <th>Titulo</th>
                        <th>Clasificacion</th>
                        </tr>
                    </thead>
                    @foreach ($cat->peliculas as $cat)
                        <tr>
                            <td>{{$cat->title}}</td>
                            <td>{{$cat->rating}}</td>
                        <tr>
                    @endforeach
                </table>
            </p>
        </div>
        <?php $x ++; ?>
      @endforeach
  
</div>
 
 
</body>
</html>