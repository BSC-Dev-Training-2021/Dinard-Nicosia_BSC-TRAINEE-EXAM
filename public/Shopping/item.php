<?php
define("HOST", "localhost");
define("USER", "Dnicosia10");
define("PASSWORD", "414243444546");
define("DB", "db_test");
$db = new mysqli(HOST, USER, PASSWORD, DB);
$item_name2 = "";
if (isset($_POST['btn_add'])) {
    $item_name = $_POST['item_name'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "../image/".$filename;
    $item_qty = $_POST['item_qty'];

    $db = new mysqli(HOST, USER, PASSWORD, DB);
    
        $mysql = sprintf(
            "INSERT INTO shop_tbl (item_name, item_qty, item_img) VALUES ('%s','%s','%s')",
            $db->real_escape_string($item_name),
            $db->real_escape_string($item_qty),
            $db->real_escape_string($filename)
        );
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
        $db->query($mysql);

}
if(isset($_POST["update_bttn"])){
    echo "update";
    $id = $_POST['id'];
    $item_name2 = $_POST['item_name2'];
    $item_qty2 = $_POST['item_qty2'];
    $mysql = sprintf(
        "UPDATE shop_tbl SET item_name='%s', item_qty='%s' WHERE id='%s' ",
        $db->real_escape_string($item_name2),
        $db->real_escape_string($item_qty2),
        $db->real_escape_string($id)
    );
    $db->query($mysql);
}
if(isset($_POST["delete_bttn"])){
    echo "delete";
}
function tbl_test_display($db)
{
    $result = $db->query("SELECT * FROM shop_tbl");
    $number = 0;
    foreach ($result as $row) {
        $number++;
        printf(
            "
            <tr>
            <th scope='row'>$number</th>
            <td>%s</td>
            <td>%s</td>
            <td>
            <div class='d-grid gap-2 d-md-flex justify-content-md-end'>
            <input type='hidden' value='%s' name='id'>
            <input type='hidden' value='%s' name='item_name2'>
            <input type='hidden' value='%s' name='item_qty2'>
            <button type='submit' class='btn btn-outline-warning btn-sm' name='update_bttn'>Update</button>
            
            <button type='submit' class='btn btn-outline-danger btn-sm' name='delete_bttn'>Delete</button>
            </div
            </td>
            </tr>
            <div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLongTitle'>Delete Information</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body warning'>
                    Are you sure you want to proceed the deletion?
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                    <button type='submit' class='btn btn-outline-danger' name='delete_bttn'>Delete</button>
                </div>
                </div>
            </div>
            </div>
            ",
            htmlspecialchars($row['item_name'], ENT_QUOTES),
            htmlspecialchars($row['item_qty'], ENT_QUOTES),
            htmlspecialchars($row['id'], ENT_QUOTES),
            htmlspecialchars($row['item_name'], ENT_QUOTES),
            htmlspecialchars($row['item_qty'], ENT_QUOTES)
        );
    }
    $db->close();
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

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>
    <form method="POST" action="item.php" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name of item</label>
    <input type="text" class="form-control" name="item_name" value="<?php echo $item_name2;?>">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" name="uploadfile" >
    <input type="number" class="form-control" name="item_qty" >
  </div>

  <button type="submit" class="btn btn-primary" name="btn_add">Submit</button>
    </form>
  <div class="container-sm">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Quantity</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            <form method='POST' action='item.php'>
  <?php
    tbl_test_display($db);
  ?>
 </form>
            </tbody>
        </table>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>