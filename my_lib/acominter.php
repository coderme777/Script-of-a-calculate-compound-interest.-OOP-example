<?php
    //declare(strict_types=1);

    abstract class ACompoundInterest
    {
        protected $inisum;
        protected $percent;
        protected $years;

        protected abstract function sumci();
    }
?>
