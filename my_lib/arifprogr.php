<?php
require_once 'iprogression.php';
/* Формулы
    an=a1+(n−1)*d //n-й член арифметической прогрессии
    Sn=(a1+an)/2 *n //cумма арифметической прогрессии для определенного числа членов
*/
    class Arifprogr implements Iprogression //класс для подсчета некоторых характеристих арифметической прогрессии
    {
        private $a1;
        private $dq = 0;
        private $nbnext1;

        public function __construct($a1, $dq, $nbnext1){
            $this->a1 = $a1;
            $this->dq = $dq;
            $this->nbnext1 = $nbnext1; 
        }

        public function getNext() {
            $an = $this->a1 + ($this->nbnext1 - 1) * $this->dq;
            return $an;
        }

        public function getSum() {
            $Sn = (($this->a1 + $this->getNext())/2) * $this->nbnext1;
            return $Sn;
        }
    }
/*  $test = new  Arifprogr(0, 2, 5); //для модульной проверки
    echo $test->getNext();
    echo '<br>';
    echo $test->getSum();*/