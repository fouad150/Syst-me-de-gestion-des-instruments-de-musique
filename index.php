<?php
    include('scripts.php');
?>

<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8" />
        <title></title>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- ================== css ================== -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <!-- ================== css ================== -->
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid d-flex justify-content-between">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            
            <form class="d-flex ">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button type="button" class="btn btn-warning text-nowrap" >log out</button>
            </form>
        </div>
      </nav>    

        <div class="container pt-3">
        <a href="" data-bs-toggle="" class="btn btn-outline-primary btn-rounded px-4 rounded-pill"><i class="fa fa-plus fa-lg me-2 ms-n2 text-success-900"></i> Add instrument</a>
            <table class="table table-success table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">instruments</th>
                        <th scope="col">category</th>
                        <th scope="col">quantity</th>
                        <th scope="col">price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>    
    </body>
</html>