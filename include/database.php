<?php
function getData($s)
{
    $con = new mysqli('localhost', 'root', '', 'testing_1');
    $q = $con->query($s);
    $xau = '';
    while ($r = $q->fetch_array()) {
        $xau .= '
        <div class="container p-5 my-5 bg-primary text-white">
        <h1>' . $r['category_name'] . '</h1>
        </div>
        ';

        $q1 = $con->query("select * from product where category_id ='" .
            $r['category_id'] . "'");
        $xau .= ' <div class="row">';
        while ($r1 = $q1->fetch_array()) {
            $xau .= '
            <div class="col-sm-3">' . '<img src = "images/' . $r1['product_image'] . '"width="120px" height="120px">'
                . '<h4>' . $r1['product_name'] . '</h4></div>';

            $xau .= "----------------" . $r1['product_name'] . '
                <img src = "images/' . $r1['product_image'] . '"width="20px" height="20px">' . '<br>';
        }
    }
    return $xau;
}
// function loadDatatoTable($s)
// {
//     $con = new mysqli('localhost', 'root', '', 'testing_1');
//     $q = $con->query($s);
//     $xau = '<table class="table table-striped" style="width: 350px;"><tr><th>Ord</th><th>Category Name</th><th></th></tr>';
//     $i = 1;
//     if ($_SESSION['tf1']) $tmp = 'abled';
//     else $tmp = 'disabled';
//     while ($r = $q->fetch_array()) {
//         $xau .= '<tr><td>' . $i++ . '</td><td>' . $r['category_name'] . '</td><td>' .
//             '<button type="submit" name="choose" value="' . $r['category_id'] . '" ' . $tmp . '>...</button>'
//             . '</td></tr>';
//     }
//     $xau .= '</table>';
//     return $xau;
// }

// function readOneRecord($s)
// {
//     $con = new mysqli('localhost', 'root', '', 'testing_1');
//     $q = $con->query($s);
//     $xau = '';
//     if ($r = $q->fetch_array()) {
//         $xau = $r['category_name'];
//     }
//     return $xau;
// }
// function doSQL($s)
// {
//     $con = new mysqli('localhost', 'root', '', 'testing_1');
//     $q = $con->query($s);
// }
