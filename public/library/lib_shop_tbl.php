<?php
//add function
class shp_tbl{
    public $col_1;
    public $col_2;
    public $col_3;
    public $col_4;
    public $tbl_name; 

    function tbl_write($col_1, $col_2, $col_3, $tbl_name, $db)
{
    $mysql = sprintf(
        "INSERT INTO $tbl_name (item_name, item_qty, item_img) VALUES ('%s','%s','%s')",
        $db->real_escape_string($col_1),
        $db->real_escape_string($col_2),
        $db->real_escape_string($col_3)
    );
    $db->query($mysql);
}
//delete function
function tbl_delete($col_1, $tbl_name, $db)
{
    $mysql = sprintf(
        "DELETE FROM $tbl_name WHERE id='%s' ",
        $db->real_escape_string($col_1)
    );
    $db->query($mysql);
} 
//update function
function tbl_update($col_1, $col_2, $col_3, $col_4, $tbl_name, $db)
{
    $mysql = sprintf(
        "UPDATE $tbl_name SET item_name='%s', item_qty='%s', item_img='%s' WHERE id='%s' ",
        $db->real_escape_string($col_2),
        $db->real_escape_string($col_3),
        $db->real_escape_string($col_4),
        $db->real_escape_string($col_1)
    );
    $db->query($mysql);
}
function tbl_update_qty($col_1, $col_3, $tbl_name, $db)
{
    $mysql = sprintf(
        "UPDATE $tbl_name SET item_qty='%s' WHERE id='%s' ",
        $db->real_escape_string($col_3),
        $db->real_escape_string($col_1),

    );
    $db->query($mysql);
}
//display function
function tbl_display($tbl_name, $db)
{
    $result = $db->query("SELECT * FROM $tbl_name");
    $number = 0;
    foreach ($result as $row) {
        printf(
            "
            <div class='col-sm-3' style='margin-bottom:20px;'>
                <div class='card'>
                    <img src='../image/%s' class='card-img-top' style='height:25vh;' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>%s</h5>
                        <p class='card-text'>Motorcycle PH</p>
                    </div>
                    <form action='item.php' method='POST'>
                    <ul class='list-group list-group-flush'>
                    <li class='list-group-item'>Available : %s</li>
                    <li class='list-group-item'><label class='form-label'>Quantity</label> <input type='number' class='form-control' value=1 name='col_qty'></li>
                </ul>
                    <input type='hidden' value='%s' name='col_1'>
                    <input type='hidden' value='%s' name='col_2'>
                    <input type='hidden' value='%s' name='col_3'>
                    <input type='hidden' value='%s' name='col_4'>
                    <div class='card-body'>
                    <button type='button' class='btn btn-primary ' name='update_bttn'>View</button>
                    <button type='submit' class='btn btn-warning ' name='add_cart_bttn'>Add to Cart</button>
                    </div>
                    </form>
                </div>
            </div>
            ",
            //display item
            htmlspecialchars($row['item_img'], ENT_QUOTES),
            htmlspecialchars($row['item_name'], ENT_QUOTES),
            htmlspecialchars($row['item_qty'], ENT_QUOTES),
            //use as retrival data
            htmlspecialchars($row['id'], ENT_QUOTES),
            htmlspecialchars($row['item_name'], ENT_QUOTES),
            htmlspecialchars($row['item_qty'], ENT_QUOTES),
            htmlspecialchars($row['item_img'], ENT_QUOTES)
        );
    }
    $db->close();
}
//display with action bttns
function tbl_display_action($tbl_name, $db)
{
    $result = $db->query("SELECT * FROM $tbl_name");
    $number = 0;
    foreach ($result as $row) {
        $number++;
        printf(
            "
            <form action='item-update.php' method='POST'>
            <tr>
            <th scope='row'>$number</th>
            <td>%s</td>
            <td>%s</td>
            <td><img src='../image/%s' alt='' style='height:10vh;'></td>
            <td>
            <div class='d-grid gap-2 d-md-flex justify-content-md-end'>
            <input type='hidden' value='%s' name='col_1'>
            <input type='hidden' value='%s' name='col_2'>
            <input type='hidden' value='%s' name='col_3'>
            <input type='hidden' value='%s' name='col_4'>
            <button type='submit' class='btn btn-outline-warning btn-sm' name='update_bttn'>Update</button>
            
            <button type='submit' class='btn btn-outline-danger btn-sm' name='delete_bttn'>Delete</button>
            </div
            </td>
            </tr>
            </form>
            ",
            //display item
            htmlspecialchars($row['item_name'], ENT_QUOTES),
            htmlspecialchars($row['item_qty'], ENT_QUOTES),
            htmlspecialchars($row['item_img'], ENT_QUOTES),
            //use as retrival data
            htmlspecialchars($row['id'], ENT_QUOTES),
            htmlspecialchars($row['item_name'], ENT_QUOTES),
            htmlspecialchars($row['item_qty'], ENT_QUOTES),
            htmlspecialchars($row['item_img'], ENT_QUOTES)
        );
    }
    $db->close();
}
}
class crt_tbl
{
    public $col_1;
    public $col_2;
    public $col_3;
    public $col_4;
    public $tbl_name;
    function tbl_write($col_user, $col_1, $col_2, $col_3, $col_4, $tbl_name, $db)
    {
        $mysql = sprintf(
            "INSERT INTO $tbl_name (user_id, prod_id, cart_name, cart_qty, cart_img) VALUES ('%s','%s','%s','%s','%s')",
            $db->real_escape_string($col_user),
            $db->real_escape_string($col_1),
            $db->real_escape_string($col_2),
            $db->real_escape_string($col_3),
            $db->real_escape_string($col_4)
        );
        $db->query($mysql);
    }


    function tbl_update($col_1, $col_2, $col_4, $tbl_name, $db)
    {
        $mysql = sprintf(
            "UPDATE $tbl_name SET cart_qty='%s' WHERE cart_id='%s' AND user_id='%s' ",
            $db->real_escape_string($col_4),
            $db->real_escape_string($col_1),
            $db->real_escape_string($col_2)
        );
        $db->query($mysql);
    }


    function tbl_delete($col_1, $col_2, $tbl_name, $db)
    {
        $mysql = sprintf(
            "DELETE FROM $tbl_name WHERE cart_id='%s' AND user_id='%s' ",
            $db->real_escape_string($col_1),
            $db->real_escape_string($col_2)
        );
        $db->query($mysql);
    } 
    function tbl_display($user_id,$tbl_name, $db)
    {
        $result = $db->query("SELECT * FROM $tbl_name WHERE user_id = $user_id ");
        $number = 0;
        foreach ($result as $row) {
            printf(
                "        
                <div class='card mb-12'  style='margin-bottom:20px;'>
                <div class='row g-0'> 
                    <div class='col-md-3'><form action='item-cart.php' method='POST'>
                        <img src='../image/%s' class='img-fluid rounded-start' alt='...'>
                    </div>
                    <div class='col'>
                        <div class='card-body'>
                            <h5 class='card-title'>%s</h5>
                            <p class='card-text'></p>
                        </div>
                        <input type='hidden' value='%s' name='col_1'>
                        <input type='hidden' value='%s' name='col_2'>
                        <input type='hidden' value='%s' name='col_3'>
                        <input type='hidden' value='%s' name='col_4'>
                        <input type='hidden' value='%s' name='col_5'>
                        <div class='row'>
                            <div class='col'>
                            </div>
                            <div class='col-6'>
                            </div>
                            <div class='col'>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col'>
                            </div>
                            <div class='col-5'>
                            Quantity:<small class='text-muted'><input type='number' value='%s' name='col_qty'></small>
                            </div>
                            <div class='col'>
                            <button type='submit' class='btn btn-warning ' name='update_cart_bttn'>Update</button>
                            <button type='submit' class='btn btn-danger ' name='remove_cart_bttn'>Remove</button>
                            </div>
                        </div>         
                        </form>
                    </div>
                </div>       
            </div>
            ",
                //display item
                htmlspecialchars($row['cart_img'], ENT_QUOTES),
                htmlspecialchars($row['cart_name'], ENT_QUOTES),
                //use as retrival data
                htmlspecialchars($row['cart_id'], ENT_QUOTES),
                htmlspecialchars($row['user_id'], ENT_QUOTES),
                htmlspecialchars($row['cart_img'], ENT_QUOTES),
                htmlspecialchars($row['cart_name'], ENT_QUOTES),
                htmlspecialchars($row['cart_qty'], ENT_QUOTES),
                htmlspecialchars($row['cart_qty'], ENT_QUOTES)
            );
        }
        $db->close();
    }
}

class noti_class
{
    public $alert_status;
    function display_alert($alert_status)
{
    switch ($alert_status) {
        case "success":
            echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Holy Crap!</strong> The user information has been successfully added.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            break;
        case "warning":
            echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            break;
        case "email":
            echo "
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Holy guacamole!</strong> The email you had entered is cannot be found in the system.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            break;
        case "pass":
            echo "
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Holy guacamole!</strong> Your password is not match.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                    ";
            break;
        case "login":
                echo "
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>Holy guacamole!</strong> Your login is successful.
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                        ";
                break;
        case "deleted":
            echo "
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong>Holy Crap!</strong> The selected user information has been successfully deleted.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            break;
        case "updated":
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>Holy Crap!</strong> The user information has been successfully Updated.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
            break;
        default:
            echo "
        <div class='alert alert-primary alert-dismissible fade show' role='alert'>
            <strong>Holy guacamole!</strong> Welcome to my Experimental Page in PHP.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
    }
}
    
}

class user_tbl{
    public $a, $b, $table, $db;
    function tbl_test_write($a, $b, $table, $db)
{
    $mysql = sprintf(
        "INSERT INTO $table (name_test, pass_test) VALUES ('%s','%s')",
        $db->real_escape_string($a),
        $db->real_escape_string($b)
    );
    $db->query($mysql);
}
function tbl_user_write($a, $b, $table, $db)
{
    $mysql = sprintf(
        "INSERT INTO $table (user_email, user_password) VALUES ('%s','%s')",
        $db->real_escape_string($a),
        $db->real_escape_string($b)
    );
    $db->query($mysql);
}
//delete function
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
}
$alert = new noti_class();
$user_class = new user_tbl();
$crt_tbl_class = new crt_tbl();
$shp_tbl_class = new shp_tbl();
?>