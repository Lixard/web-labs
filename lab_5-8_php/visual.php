<link href="resources/style.css" rel="stylesheet" type="text/css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<div>
    <form>
        <?php
        $surname = $_POST['surname'];
        $name = $_POST['name'];
        $secondName = $_POST['secondName'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];

        $hobbies = [];
        if (isset($_POST['sport'])) {
            array_push($hobbies, "Спорт");
        }
        if (isset($_POST['music'])) {
            array_push($hobbies, "Музыка");
        }
        if (isset($_POST['movie'])) {
            $movie_checkbox = $_POST['movie'];
            array_push($hobbies, "Кино");
        }

        $presence = $_POST['presence'];
        $description = $_POST['description'];

        $hobbies = implode(", ", $hobbies);
        echo "ФИО: $surname $name $secondName <br>";
        echo "Пол: $gender <br>";
        echo "Увлечения: $hobbies <br>";
        echo "Email: $email <br>";
        echo "Присутствие: $presence <br>";
        echo "Информация о себе: $description <br>";
        ?>
        <br>
        <br>
        <br>
        <?php
        $file = $_FILES['inputFile'];
        if ($file['name'] != "") {
            echo "Имя файла: " . $file['name'] . "<br>";
            echo "Тип файла: " . $file['type'] . "<br>";
            echo "Размер файла (в байтах):" . $file['size'] . "<br>";
        }
        ?>
    </form>
</div>
