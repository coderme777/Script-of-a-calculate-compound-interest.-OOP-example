<?php
    require_once 'acominter.php';

    final class CompoundInterest extends ACompoundInterest
    {
        private $data;

        public function __construct($sum, $pcent, $years) {

            $this->inisum = (int) $sum;
            $this->percent = (int) $pcent; 
            $this->years = (int) $years;/*Делаем приведение типов, чтобы при получении разных типов данных в формуле не происходила ошибка TypeError*/
            $this->data = $_REQUEST;
        }

        protected function sumci() { 
            $total_summ = $this->inisum * (1 + $this->percent/100)**$this->years;
            return $total_summ;
        }

        public function getSumci() {
           return $this->sumci();
        }

        public function __get($ex) {
            if (isset($this->data[$ex])) return $this->data[$ex];
            return '<br>Свойство не существует или доступ к нему ограничен: '.$ex;
        }

        public function __set($ex, $value) {
            return $this->data[$ex] = $value;
        }

        public function __call($name, $arg) {
            return "Метод $name и его параметры ".implode(', ', $arg).' не существуют или не доступны<br>';
        }

        public static function __callStatic($name, $arg) { 
            return "Статический метод $name и его параметры ".implode(', ', $arg).' не существуют или не доступны<br>';
        }

        public function __debuginfo() {
            return [
                'data' => $this->data,
            ];
        }

        public function __destruct() {
            print 'Уничтожается ' . __CLASS__.'<br>';
        }
    }      
?>
