<link href="resources/style.css" rel="stylesheet" type="text/css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<div>
    <form action="database.php" method="post">
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
        if (isset($_POST['save'])) {
            $hobbies = implode(", ", $hobbies);
            echo "ФИО: $surname $name $secondName <br>";
            echo "Пол: $gender <br>";
            echo "Увлечения: $hobbies <br>";
            echo "Email: $email <br>";
            echo "Присутствие: $presence <br>";
            echo "Информация о себе: $description <br>";


            $saved = fopen("resources/last_request.txt", "w+");
            fwrite($saved, $surname . PHP_EOL);
            fwrite($saved, $name . PHP_EOL);
            fwrite($saved, $secondName . PHP_EOL);
            fwrite($saved, $hobbies . PHP_EOL);
            fwrite($saved, $presence . PHP_EOL);
            fwrite($saved, $gender . PHP_EOL);
            fwrite($saved, $email . PHP_EOL);
            fwrite($saved, $description . PHP_EOL);

            $file = $_FILES['inputFile'];
            if ($file['name'] != "") {
                echo "Имя файла: " . $file['name'] . "<br>";
                echo "Тип файла: " . $file['type'] . "<br>";
                echo "Размер файла (в байтах):" . $file['size'] . "<br>";
                fwrite($saved, $file['name'] . PHP_EOL);
            } else {
                fwrite($saved, "" . PHP_EOL);
            }
            fclose($saved);
        }
        ?>
        <br>
        <br>
        <br>
        <?php

        ?>
        <button style="margin-bottom: 1px" type="submit" class="btn btn-primary" name="showAll">
            Показать все зарегистрированные анкеты
        </button>
        <button type="submit" name="save" class="btn btn-primary">Сохранить анкету в базу данных</button>
    </form>

</div>
