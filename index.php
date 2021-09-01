<!--
    Данный код написан с целью демонстрации применения ООП для решения математических задач.
В текущем случае это подсчет общей суммы при использовании сложных процентов, например,
в банковском секторе. Сам скрипт легко перестроить под любые формулы с тремя параметрами,
путем замены основной формулы в методе sumci. Например, это может быть нахождение n-го члена 
арфиметической или геометрической прогрессии, сумма первых n-членов прогрессии и тому подобное,
но при этом каждый placeholder в форме передачи данных должен быть заменен на подходящий,
чтобы логическое оформление не нарушалось.
-->
<?php
    require_once 'my_lib/cominter.php';

    if (isset($_POST['compinter'])) {
        $inisum = $_POST['inisum'] ?? false; //если сущ-ет, то делаем, если нет, то false
        $percent = $_POST['percent'] ?? false;
        $years = $_POST['years'] ?? false;
        $inisum = trim(strip_tags($inisum)); //удаляем пробелы и теги HTML, PHP - простая валидация 
        $percent = trim(strip_tags($percent));
        $years = trim(strip_tags($years));

        if (is_numeric($inisum) && is_numeric($percent) && is_numeric($years)) { //если передаются не числа, то выводим сообщение
            $calc = new CompoundInterest($inisum, $percent, $years);
            echo $calc->getSumci(); 
        } else {
            echo '<p>Введите пожалуйста ТОЛЬКО ЧИСЛА</p>';
        }
    }    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compound interest</title>
    <style type="text/css">
        form,p{width:500px; margin: 0 auto;}
        input{width: 400px;}
    </style>
</head>
<body>
    <br>
    <form action='<?=$_SERVER['PHP_SELF']?>' method='POST' name='compinter'> <!--$_SERVER['PHP_SELF'] обработка будет в этом же файле-->
        <input type='text' placeholder='Введите начальную сумму, например, 1000' name='inisum'><br><br>
        <input type='text' placeholder='Укажите годовой процент, например, 11' name='percent'><br><br>
        <input type='text' placeholder='На сколько лет будет вклад? Например, 5' name='years'><br><br>
        <input type='submit' name='compinter' value='Подсчитать общую сумму'>
    </form>
</body>
</html>