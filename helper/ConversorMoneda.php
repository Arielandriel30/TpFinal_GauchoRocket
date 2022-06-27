<?php

class ConversorMoneda
{
    public function __construct()
    {
    }
    public function convertirCreditoAMoneda($valor){
        $valorOficalDelDia=2.59;
        $total=$valor*$valorOficalDelDia;
        return $total;
    }
}