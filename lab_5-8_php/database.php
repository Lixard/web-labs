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

<?php
if (isset($_POST['showAll'])) {
    $connection = mysqli_connect('localhost', 'root', '', 'labs', '41064');

    $sql = "SELECT * FROM requests";
    $result = $connection->query($sql);

    echo "
<div>
    <table>
        <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Хобби</th>
            <th>Присутствие</th>
            <th>Пол</th>
            <th>Адрес электронной почты</th>
            <th>Описание</th>
            <th>Файл</th>
        </tr>
";
    while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
            <td>" . $row['surname'] . "</td>
            <td>" . $row['name'] . "</td>
            <td>" . $row['second_name'] . "</td>
            <td>" . $row['hobbies'] . "</td>
            <td>" . $row['presence'] . "</td>
            <td>" . $row['gender'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['description'] . "</td>
            <td>" . $row['file'] . "</td>
        </tr>
        ";
    }
    echo "
    <table></table>
    <div></div>
    ";
} else if (isset($_POST['save'])) {
    $lines = file("resources/last_request.txt");
    $connection = mysqli_connect('localhost', 'root', '', 'labs', '41064');
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    $statement = $connection->prepare("INSERT INTO requests (surname, name, second_name, hobbies, presence, gender, email, description, file) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $statement->bind_param("sssssssss", $lines[0], $lines[1], $lines[2], $lines[3], $lines[4],
        $lines[5], $lines[6], $lines[7], $lines[8]);
    $state = $statement->execute();
    if ($state) {
        echo "<div align='center'><h1>Заявка успешно сохранена</h1>";
        echo "<form method='get' action='main.html'/><button type='submit'>Вернуться на страницу регистрации</button></form></div>";
    }
}
