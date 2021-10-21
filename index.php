<?php
require 'include/database.php';
?>

<html>

<head>
    <title>Sale Online</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <table border="1">
        <?php
        $s = "select * from category";
        echo getData($s);
        ?>
        <tr>
            <button type="submit" name="add" value="add"></button><br>
    </table>

</body>

</html>
