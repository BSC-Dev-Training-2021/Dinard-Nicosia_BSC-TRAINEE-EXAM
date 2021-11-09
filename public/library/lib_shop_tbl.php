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
        $db->real_escape_string($col_1),
        $db->real_escape_string($col_2),
        $db->real_escape_string($col_3),
        $db->real_escape_string($col_4)
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
                        <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <ul class='list-group list-group-flush'>
                        <li class='list-group-item'>Quantity :%s</li>
                    </ul>
                    <form action='item.php' method='POST'>
                    <input type='hidden' value='%s' name='col_1'>
                    </form>
                    <div class='card-body'>
                        <a href='#' class='card-link'>View</a>
                        <a href='#' class='card-link'>Update</a>
                    </div>
                </div>
            </div>
            ",
            //display item
            htmlspecialchars($row['item_img'], ENT_QUOTES),
            htmlspecialchars($row['item_name'], ENT_QUOTES),
            htmlspecialchars($row['item_qty'], ENT_QUOTES),
            //use as retrival data
            htmlspecialchars($row['id'], ENT_QUOTES)
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
            <form action='item.php' method='POST'>
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
            
            <button type='button' class='btn btn-outline-danger btn-sm' data-toggle='modal' data-target='#exampleModalCenter'>Delete</button>
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
$shp_tbl_class = new shp_tbl();
?>