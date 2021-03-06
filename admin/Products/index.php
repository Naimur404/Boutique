<?php

include_once ($_SERVER['DOCUMENT_ROOT']. "/Boutique/config.php");
//include_once ($_SERVER['DOCUMENT_ROOT']. "/crud/authentication.php");
use Naimur\Product;
$_product = new Product();
$products= $_product->index();
/*echo "<pre>";
print_r($products);
echo "</pre>";*/

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>List</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="fs-4 text-sucess">
                        <?php
echo $_SESSION['message'];
$_SESSION['message']="";

?>
                    </div>
                    <h1 class="text-center mb-4">List</h1>
                    <ul class="nav justify-content-center fs-3">
                        <li class="nav-item">
                            <a class="nav-link" href="create.php">Add an Item</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="trash_index.php">All Trash Item</a>
                        </li>
                    </ul>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($products) > 0) :
                                foreach ($products as $product) :
                            ?>
                            <tr>
                                <td><?= $product['title']; ?></td>
                                <td><?= $product['is_active']? 'Active': 'Deactvated'; ?></td>
                                <td><a href="show.php?id=<?= $product['id']; ?>"><button
                                            class="btn btn-dark">Show</button></a> | <a
                                        href="edit.php?id=<?= $product['id']; ?>">Edit</a> | <a
                                        href="trash.php?id=<?= $product['id']; ?>">Trash</a></td>
                            </tr>
                            <?php
                                endforeach;
                            else :
                                ?>
                            <tr>
                                <td colspan="2">No product is available<a href="create.php">click here to add one.</a>
                                </td>

                            </tr>
                            <?php
                            endif;
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>

</html>