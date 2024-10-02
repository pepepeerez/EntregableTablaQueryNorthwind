<?php

function connection(){
    $host = "localhost:3306";
    $user = "root";
    $pass = "root";

    $bd = "northwind";

    $connect=mysqli_connect($host, $user, $pass);

    mysqli_select_db($connect, $bd);

    return $connect;

}

$con = connection();

$sql = "SELECT productID, productName, unitsInStock from products";
$query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso a datos</title>
    <style>
        table {
            border: 1px solid;
            border-collapse: collapse;
        }

        td, th {
            border: 1px solid;
            text-align: left;
            padding: 10px;
        }
    </style>
</head>
<body>
    <table class="container d-flex justify-content-center .align-items-center gap-3">
        <tr>
            <td>ID</td>
            <td>ProductName</td>
            <td>UnitsInStock</td>
        </tr>
        <?php while ($row = mysqli_fetch_array($query)): ?>
        <tr>
            <td><?= $row['productID'] ?></td>
            <td><?= $row['productName'] ?></td>
            <td><?= $row['unitsInStock'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>