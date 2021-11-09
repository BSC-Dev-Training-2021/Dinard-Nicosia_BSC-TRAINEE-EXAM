<?php
require_once("../library/lib_handler.php");
require_once("item_add.php");
$item_name2 = "";

if (isset($_POST["update_bttn"])) {
    echo $_POST['id'];
    $id = $_POST['id'];
    $item_name2 = $_POST['item_name2'];
    $item_qty2 = $_POST['item_qty2'];
    $shp_tbl_class->tbl_user_update();
    $mysql = sprintf(
        "UPDATE shop_tbl SET item_name='%s', item_qty='%s' WHERE id='%s' ",
        $db->real_escape_string($item_name2),
        $db->real_escape_string($item_qty2),
        $db->real_escape_string($id)
    );
    $db->query($mysql);
}
if (isset($_POST["delete_bttn"])) {
    echo "delete";
}
function tbl_user_delete($a, $table, $db)
{
    $mysql = sprintf(
        "DELETE FROM $table WHERE id_test='%s' ",
        $db->real_escape_string($a)
    );
    $db->query($mysql);
} //update function
function tbl_user_update($a, $b, $c, $table, $db)
{
    $mysql = sprintf(
        "UPDATE $table SET name_test='%s', pass_test='%s' WHERE id_test='%s' ",
        $db->real_escape_string($a),
        $db->real_escape_string($b),
        $db->real_escape_string($c)
    );
    $db->query($mysql);
}


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Hello, PHP!</title>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar scroll</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="#">View Products</a></li>
                            <li><a class="dropdown-item" href="#"></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Link</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>



    <div class="container" style="margin-top: 80px;">

        <div class="row">
            <?php $shp_tbl_class->tbl_display($table_shop, $db);?>
        </div>



        <form method="POST" action="item.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name of item</label>
                <input type="text" class="form-control" name="item_name" value="<?php echo $item_name2; ?>">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="uploadfile">
                <input type="number" class="form-control" name="item_qty">
            </div>

            <button type="submit" class="btn btn-primary" name="btn_add">Submit</button>
        </form>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Quantity</th>
                    <th scope="col">Image</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $shp_tbl_class->tbl_display_action($table_shop, $db);
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>