<?php

function dd($param){
    var_dump($param);
    exit();
}

function loadWhoops(){
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
    return $whoops;
}

function id($product){
    return str_replace('.','_',$product['quantity']).$product['format'].$product['metal'];
};

function description($product){
     return $product['quantity'].' '.$product['format'].' '. $product['metal'];
};

function valorTotal($amount,$product){
    return $amount * preu($product);
}

function preu($product){
    global $preu;

    $valorMetal = $preu[$product['metal']];
    return $product['format'] == 'Coin'?$valorMetal*$product['quantity']:($valorMetal/PES_ONZA)*$product['quantity'];
}

