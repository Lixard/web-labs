<style>
    body {
        background-color: #f5deb3;
        color: black;
    }

    h1 {
        text-align: center;
    }
</style>
<h1>Привет, меня зовут Максим Борисов</h1>
<?php
$count = implode("", file("resources/counter.txt"));
$count++;
$file = fopen("resources/counter.txt", "w");
fputs($file, $count);
fclose($file);
$load_time = date('Y-m-d H:i:s');
?>
<br>
<h1>Количество входов : <?= $count ?> </h1>

<?php
if ($count % 10 == 0)
    echo "<h1> $count посетил эту страницу</h1>";
?>
<h1><?= $load_time ?></h1>
