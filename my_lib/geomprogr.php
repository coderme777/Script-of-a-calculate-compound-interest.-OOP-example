<?php
require_once 'iprogression.php';
/* Формулы:
    bn =b1*q^(n-1) //n-й член геометрической прогрессии
    Sn=(bn*q−b1)/(q−1) // cумма первых членом геометрической прогрессии
*/
    class Geomprogr implements Iprogression //класс для подсчета некоторых характеристих геометрической прогрессии
    {
        private $a1;
        private $dq;
        private $nbnext1;

        public function __construct($a1, $dq, $nbnext1) {
            $this->a1 = $a1;
            $this->dq = $dq;
            $this->nbnext1 = $nbnext1; 
        }

        public function getNext() {
            $bn = $this->a1 * $this->dq ** ($this->nbnext1 - 1);
            return $bn;
        }

        public function getSum() {
            $Sn = ($this->getNext() * $this->dq - $this->a1)/($this->dq - 1);
            return $Sn;
        }
    }
/*  $test = new Geomprogr(1, 5, 5); //для модульной проверки
    echo $test->getNext();
    echo '<br>';
    echo $test->getSum();*/