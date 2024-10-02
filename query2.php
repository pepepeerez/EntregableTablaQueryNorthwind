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

$sql = "SELECT p.ProductName, c.CategoryName, p.UnitPrice FROM Products p
        JOIN Categories c ON p.CategoryID = c.CategoryID
        WHERE p.UnitPrice > (SELECT AVG(p2.UnitPrice) FROM Products p2 WHERE p2.CategoryID = p.CategoryID)
        ORDER BY c.CategoryName, p.ProductName;";
$query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea Query2 Entregable</title>
    <style>
        table {
            border: 1px solid;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
<table class="container d-flex justify-content-center .align-items-center gap-3">
        <tr>
            <td>ProductName</td>
            <td>CategoryName</td>
            <td>UnitPrice</td>
        </tr>
        <?php while ($row = mysqli_fetch_array($query)): ?>
        <tr>
            <td><?= $row['ProductName'] ?></td>
            <td><?= $row['CategoryName'] ?></td>
            <td><?= $row['UnitPrice'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>