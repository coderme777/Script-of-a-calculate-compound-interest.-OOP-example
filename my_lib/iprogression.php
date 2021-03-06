<?php //интерфейс для некоторых функций арифметической и геомтерической прогрессии
    interface Iprogression
    {
        public function getNext();
            /* a1 - первый член арифметической или геометрической прогрессии
               dq - d разность соседних членов или q - знаменатель для геометрической прогрессии
               nbnext1 - n-й член арифметической прогрессии или bnext1 предыдущий член геом-й прогрессии
               S - сумма первых членов прогрессии  
            */

        public function getSum();
    }