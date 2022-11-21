<?php
include('database.php');
include('scripts.php');
//session_start();
?>

<!DOCTYPE html>
<html lang="en">

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
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid d-flex justify-content-between">
            <?php
            if (isset($_SESSION['profil'])) {
                //var_dump($_SESSION['profil']);
                echo "<a class='navbar-brand text-light' href='#'><strong>" . $_SESSION['profil'] . "</strong></a>";
            } else {
                echo "<script>window.location.replace('login.php')</script>";
            }
            ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <form class="d-flex" action="scripts.php" method="POST">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button type="submit" class="btn btn-warning text-nowrap logout" name="logout">Log out</button>
            </form>
        </div>
    </nav>

    <div class="container pt-3">
        <a href="#modal-instrument" data-bs-toggle="modal" class="btn btn-outline-primary btn-rounded px-4 rounded-pill" onclick="emtyModal()"><i class="fa fa-plus fa-lg me-2 ms-n2 text-success-900"></i> Add instrument</a>
        <?php
        if (isset($_SESSION['successful-adding'])) {
            echo "<div class='alert alert-primary mt-3' role='alert'><strong>" . $_SESSION['successful-adding'] . "</strong></div>";
            unset($_SESSION['successful-adding']);
        }
        ?>

        <style>
            .product-table td {
                cursor: pointer;
            }
        </style>
        <div class="table-responsive">
            <table class="table table-success product-table table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col"><?php echo "N:";
                                        countInstruments() ?></th>
                        <th scope="col">instruments</th>
                        <th scope="col">category</th>
                        <th scope="col">quantity</th>
                        <th scope="col">price</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr href="#modal-instrument" data-bs-toggle="modal">
                        <th scope="row">1</th>
                        <td>Mark </td>
                        <td>Otto </td>
                        <td>@mdo </td>
                        <td>@mdo </td>
                    </tr> -->
                    <?php
                    getInstrument();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Instrument MODAL -->
    <div class="modal fade" id="modal-instrument">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="scripts.php" method="POST" id="form-instrument" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Instrument</h5>
                        <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                    </div>
                    <div class="modal-body">
                        <!-- This Input Allows Storing instrument Index  -->
                        <input type="hidden" id="instrument-id" name="instrument_id">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" id="instrument-name" name="name" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select" id="instrument-category" name="category_id">
                                <option value="">Please select</option>
                                <option value="1">Idiophones</option>
                                <option value="2">Membranophones</option>
                                <option value="3">Chodophones</option>
                                <option value="4">Aerophones</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="text" class="form-control" id="instrument-quantity" name="quantity" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="text" class="form-control" id="instrument-price" name="price" />
                        </div>
                        <!-- <div class="mb-3">
                            <label for="formFile" class="form-label">Add image</label>
                            <input class="form-control" type="file" id="formFile" name="image">
                        </div> -->
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                        <button type="submit" name="delete" class="btn btn-danger task-action-btn" id="instrument-delete-btn">Delete</button>
                        <button type="submit" name="update" class="btn btn-warning task-action-btn" id="instrument-update-btn">Update</button>
                        <button type="submit" name="save" class="btn btn-primary task-action-btn" id="instrument-save-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="scripts.js"></script>

</html>
