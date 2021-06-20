<link href="resources/style.css" rel="stylesheet" type="text/css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<style>
    table, th, tr, td {
        border: 1px solid black;
    }

    table {
        border-collapse: collapse;
    }
</style>
<title>Таблица</title>
<?php
$table = $_POST['selection'];
$conn = mysqli_connect('localhost', 'root', '', 'labs', '24064');
$sql = "SELECT * FROM `$table`";
$result = $conn->query($sql);
echo "<div id='main'>
<table class='table'>";
$num = mysqli_num_fields($result);

if ($result->num_rows === 0) {
    echo "<h1>Таблица пуста</h1>";
    die();
}

$row = $result->fetch_assoc();
echo "<tr>";
foreach ($row as $key => $value) {
    echo "<th>$key</th>";
}
echo "</tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<td>$value</td>";
    }
    echo "</tr>";
}
echo "</table>";
