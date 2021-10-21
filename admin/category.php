<?php
require('../include/database.php');
session_start();
if (!isset($_SESSION['tf'])) $_SESSION['tf'] = true; //Sử dụng cho việu add mới
if (!isset($_SESSION['tf1'])) $_SESSION['tf1'] = true; //Sử dụng cho việu update and delete

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['new'])) {
        $_SESSION['tf'] = !$_SESSION['tf'];
    }
    if (isset($_POST['add'])) {
        $s = "insert into category(category_name) values ('" . $_POST['category_name'] . "')";
        doSQL($s);
        echo '<script type="text/javascript">alert("Insert successful!!");</script>';
        $_SESSION['tf'] = !$_SESSION['tf'];
    }
    if (isset($_POST['cancel'])) {
        session_destroy();
        if ($_SESSION['tf']) unset($_SESSION['tf']);
        if ($_SESSION['tf1']) unset($_SESSION['tf1']);

        if (!isset($_SESSION['tf'])) $_SESSION['tf'] = true; //Sử dụng cho việu add mới
        if (!isset($_SESSION['tf1'])) $_SESSION['tf1'] = true; //Sử dụng cho việu update and delete

        $_SESSION['tf'] = !$_SESSION['tf'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <form action="" method="post">
        <div class="form-group" style="margin-left: 30px">
            <div class="mb-3">
                Category name: <br>
                <input type="text" name="category_name" placeholder="Nhập Category Name" <?php if (!$_SESSION['tf']) echo 'disabled';
                                                                                            else echo 'abled'; ?> autofocus>
                <button type="submit" class="btn btn-primary" name="new" <?php if ($_SESSION['tf']) echo 'disabled';
                                                                            else echo 'abled'; ?>>...</button>
            </div>
            <div class="mb-3">
                <?php
                $s = "select * from category";
                echo loadDatatoTable($s);
                ?>
                <div class="form-group">
                    <button type="submit" name="add" <?php if ($_SESSION['tf']) echo 'abled';
                                                        else echo 'disabled'; ?>>Add</button>
                    <button type="submit" name="update" <?php if ($_SESSION['tf1']) echo 'disabled';
                                                        else echo 'abled'; ?>>Update</button>
                    <button type="submit" name="delete" <?php if ($_SESSION['tf1']) echo 'disabled';
                                                        else echo 'abled'; ?>>Delete</button>
                    <button type="submit" name="cancel">Cancel</button>
                    <button type="submit" name="back">Back</button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>