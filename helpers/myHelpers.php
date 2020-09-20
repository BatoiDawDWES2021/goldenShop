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
function totalShopping(){
    include dirname(__FILE__) . '/../config/products.php';
    $total = 0;
    $items = unserialize($_SESSION['order']);
    foreach ($products as $product) {
        $amount = $items[id($product)];
        if (is_numeric($amount)) {
            $preuLinea = valorTotal($amount, $product);
            $total += $preuLinea;
        }
    }
    return $total;
}

function showError($arrayErrors,$field){
    if (array_key_exists($field,$arrayErrors)) {
        return "<div id='nameFeedback' class='invalid-feedback'>".$arrayErrors[$field]."</div>";
    }
    return "";
}
function classError($arrayErrors,$field){
    return array_key_exists($field,$arrayErrors)?'is-invalid':'is-valid';
}

