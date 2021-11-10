<?php
require_once("../library/lib_handler.php");
include("item-add-backend.php");
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
            <a class="navbar-brand" href="item.php">LaShopee</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="item.php">Home</a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Products
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item active" href="item-add.php">Add Products</a></li>
                            <li><a class="dropdown-item" href="item-update.php">Update Products</a></li>
                            
                            <!-- <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"></a></li> -->
                        </ul>
                        
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cart
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="item-cart.php">View Cart</a></li>
                        </ul>
                        
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled">Link</a>
                    </li> -->
                </ul>
                <form class="d-flex">
                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                    <button class="btn btn-outline-danger" type="button"><a class="nav-link" style="color:black;" href="../logout.php">Logout</a></button>
                </form>
            </div>
        </div>
    </nav>
    <!-- end of menu bar -->
    <div class="container" style="margin-top: 80px;">

        <h2>Add Products</h2>
        <div class="row">
            <div class='col-sm-6' style='margin-bottom:20px;'>
                <div class='card'>
                    <div class='card-body'>
                        <form method="POST" action="item-add.php" enctype="multipart/form-data">
                            <div class="mb-3 ">
                                <label for="exampleInputEmail1" class="form-label">Name of Products</label>
                                <input type="text" class="form-control" name="item_name">
                                <div class="form-text"></div>
                            </div>
                            <div class="mb-3 ">
                                <label for="exampleInputEmail1" class="form-label">Quantity</label>
                                <input type="number" class="form-control" name="item_qty">
                                <div class="form-text"> </div>
                            </div>
                            <div class="mb-3 ">
                                <label class="form-label">Product image</label>
                                <input class="form-control" type="file" name="uploadfile" accept="image/*" id="imgInp">
                                <div class="form-text"> </div>
                            </div>
                            <div class="mb-3 ">
                                <label class="form-label"> </label>
                                <button type="submit" class="btn btn-primary" name="btn_add">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class='col-sm-6' >
                <div class='card' style='height:39.2vh;'>
                    <img id="blah" class='card-img-top' src="#" alt="No Preview" style='height:39.2vh;' />
                    </form>
                </div>
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }else{
                blah.src = URL.createObjectURL("../image/nopreview.jpeg")
            }
        }
    </script>
</body>

</html>