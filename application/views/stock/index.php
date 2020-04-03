<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock</title>
    <link rel="stylesheet" href="<?php echo css_url("stock/style.css") ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
</head>

<body>
    <div class="main-container">
        <h1 class="main-h1">Raktár</h1>
        <hr class="main-hr">
        <div class="container ">
            <div class="table-wrapper table-div">
                <div class="table-title ">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Employee Details</h2>
                        </div>
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                        </div>
                    </div>
                </div>
                <div >
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Phone</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Subhash</td>
                                <td>Administration</td>
                                <td>88***88***</td>

                                <td>
                                    <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons"></i></a>
                                    <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"></i></a>
                                    <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Subhash</td>
                                <td>Administration</td>
                                <td>88***88***</td>


                                <td>
                                    <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons"></i></a>
                                    <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"></i></a>
                                    <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Subhash</td>
                                <td>Administration</td>
                                <td>88***88***</td>


                                <td>
                                    <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons"></i></a>
                                    <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"></i></a>
                                    <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
   
</body>

</html>