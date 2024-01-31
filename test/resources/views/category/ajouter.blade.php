<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>crud category</title>
</head>

<body>

    <div class="container">

        <div class="row">

            <div class="col s12">
                <h1>Ajouter category</h1>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
                <form action="/ajouter/traitement" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="Nom" class="form-label">Nom</label>
                      <input type="text" class="form-control" id="nom" name="name">
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                    <a  href="/category" type="button" class="btn btn-outline-primary">Cancel</a>

                  </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>
