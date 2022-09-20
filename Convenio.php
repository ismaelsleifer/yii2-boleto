<?php

namespace sleifer\boleto;

use common\components\Number;
use Picqer\Barcode\BarcodeGeneratorHTML;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Picqer\Barcode\BarcodeGeneratorSVG;

class Convenio{

    private $bar_code;

    public function setBarCode($barCode){
        $bar = str_replace(['.', '-', ' '], '', $barCode);
        $b1 = substr($bar,  0, 11);
        $b2 = substr($bar, 12, 11);
        $b3 = substr($bar, 24, 11);
        $b4 = substr($bar, 36, 11);
        $this->bar_code = $b1.$b2.$b3.$b4;
    }

    public function getValorDocumento(){
        $value = ltrim(substr($this->bar_code, 4, 11), '0'); 
        return Number::numberFormat(substr_replace($value, '.', -2, 0));
    }

    public function desenhaBarras(){
        $barCode = new BarcodeGeneratorSVG();
        return $barCode->getBarcode($this->bar_code, $barCode::TYPE_INTERLEAVED_2_5, 1, 50);;
    }

    public function getDtVencimento(){
        return;
    }
    
}
