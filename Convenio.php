<?php

namespace sleifer\boleto;

use yii\helpers\VarDumper;

class Convenio{

    private $bar_code;

    public function setBarCode($barCode){

        $this->bar_code = $barCode;
    }

    public function getValue(){

        VarDumper::dump($this->bar_code, 10, true); die(__FILE__ . ' - ' . __LINE__);

    }
    
}
