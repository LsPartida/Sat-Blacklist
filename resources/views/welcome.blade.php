<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SAT Blacklist</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


    </head>
    <body>
        <div class="container">
            <div align="center">
            <img src="{{asset('logo_braxis.jpg')}}" />
            </div>
            <div class="form-group">
            <form method="post" action="{{route('consultar')}}"
                <label for="rfc">RFC:</label>
                <input type="text" class="form-control" id="rfc" name="rfc" placeholder="XAXX010101000">
                {{ csrf_field() }}
                <button type="submit"> Consultar</button>
                @IF(isset($response))
                <small id="responseHelp" class="form-text text-muted">El estatus del RFC Ingresado es: {{$response}}.</small>
                @ELSE
                <small id="responseHelp" class="form-text text-muted">No compartiremos la informacion con nadie.</small>
                @ENDIF
            </form>
              </div>
        </div>
    </body>
</html>
