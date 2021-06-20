<html>
<head>
    <meta charset="UTF-8">
    <title>Манипуляции с таблицами</title>
    <link href="resources/style.css" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<form action="show-table.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="selection">Таблицы</label>
        <select class="form-control" name="selection">
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'labs', '24064');
            $sql = "SHOW TABLES FROM labs";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_row($result)) {
                echo "<option>$row[0]</option><br>";
            }
            $conn->close();
            ?>
        </select>
    </div>

    <input type="submit" value="Показать таблицу" name="action" class="btn btn-primary"/>
</form
</body>
</html>
