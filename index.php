<!--
     Данный код написан с целью демонстрации применения ООП для решения математических задач.
В текущем случае это подсчет общей суммы при использовании сложных процентов, например,
в банковском секторе, также можно подсчитать некоторые характеристики арифметической или 
геометрической прогрессии. Сам скрипт легко перестроить под любые формулы с тремя параметрами,
путем замены основной формулы в методе sumci или подключении новых классов, интерфейсов, трейтов
с доработкой условия в index.php.
-->
<?php
    require_once 'my_lib/cominter.php';
    require_once 'my_lib/arifprogr.php';
    require_once 'my_lib/geomprogr.php';

    if (isset($_POST['compinter'])) {
        $inisum = $_POST['inisum'] ?? false; //если сущ-ет, то делаем, если нет, то false
        $percent = $_POST['percent'] ?? false;
        $years = $_POST['years'] ?? false;
        $inisum = trim(strip_tags($inisum)); //удаляем пробелы и теги HTML, PHP - простая валидация 
        $percent = trim(strip_tags($percent));
        $years = trim(strip_tags($years));

        if (is_numeric($inisum) && is_numeric($percent) && is_numeric($years)) { //если передаются не числа, то выводим сообщение
            if ($_POST['formula'] == 'proz') {
                $calc = new CompoundInterest($inisum, $percent, $years);
                echo 'Результат подстчета сложных процентов: '.$calc->getSumci().'<br>';
            }
            elseif ($_POST['formula'] == 'arifp') {
                $calc = new  Arifprogr($inisum, $percent, $years);
                echo 'Результат подстчета n-го члена арифметической прогрессии: '.$calc->getNext().'<br>';
                echo 'Результат подстчета суммы арифметической прогрессии: '.$calc->getSum().'<br>';
            }
            elseif ($_POST['formula'] == 'geop') {
                $calc = new Geomprogr($inisum, $percent, $years);
                echo 'Результат подстчета n-го члена геометрической прогрессии: '.$calc->getNext().'<br>';
                echo 'Результат подстчета суммы геометрической прогрессии: '.$calc->getSum().'<br>';
            } else {
                echo 'Выберите какую формулу будите использовать!';
            }  
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
    <title>Compound interest and other formulas</title>
    <style type="text/css">
        form,p{width:500px; margin: 0 auto;}
        input{width: 400px;}
        input[type=radio]{width: 30px;}
    </style>
</head>
<body>
    <br>
    <form action='<?=$_SERVER['PHP_SELF']?>' method='POST' name='compinter'>
        <br><p>Подсчитать сложные проценты <input type='radio' name='formula' value='proz' checked></p>
        <p>Найти n-й член ариф. прогрессии и сумму <input type='radio' name='formula' value='arifp'></p>
        <p>Найти n-й член геом. прогрессии и сумму <input type='radio' name='formula' value='geop'></p><br>
        <input type='text' placeholder='Введите начальную сумму, например, 1000' name='inisum'><br><br>
        <input type='text' placeholder='Укажите годовой процент, например, 11' name='percent'><br><br>
        <input type='text' placeholder='На сколько лет будет вклад? Например, 5' name='years'><br><br>
        <input type='submit' name='compinter' value='Подсчитать общую сумму'>
    </form>
</body>
</html>
