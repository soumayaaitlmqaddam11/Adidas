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

    <div class="container text-center">

        <div class="row">

            <div class="col s12">
                <h1>crud category</h1>
                <a href="/ajouter" class="btn btn-primary">add category</a>
                <table class="table">
                     <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                            <td>1</td>
                            <td>soumaya</td>
                            <td>
                               <a href="" class="btn btn-info">Update</a> 
                               <a href="" class="btn btn-danger">Delete</a> 
                            </td>
                        </tr>
                     </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>
