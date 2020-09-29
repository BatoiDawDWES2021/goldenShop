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
    try {
        return $product['format'] == 'Coin'?$valorMetal*$product['quantity']:($valorMetal/PES_ONZA)*$product['quantity'];
    } catch (ErrorException $e){
        return $product['format'] == 'Coin'?$valorMetal*$product['quantity']:0;
    }
}

function totalShopping(){
    include dirname(__FILE__) . '/../config/connection.php';
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


function guardarPedido(){
    include dirname(__FILE__) . '/../config/connection.php';
    $usuario = unserialize($_SESSION['usuario'])['id'];
    $ad = unserialize($_SESSION['address']);
    $address = $ad['address'].' '.$ad['postalCode'].' '.$ad['city'];
    $payment = 'T';
    $query = $conn->prepare("insert into orders(user,address,payment) values (:user,:address,:payment)");
    $query->bindParam(":user",$usuario);
    $query->bindParam(":address",$address);
    $query->bindParam(":payment",$payment);
    $query->execute();
    $last = $conn->query("select max(id) as id from orders");
    $idOrder = $last->fetch()['id'];
    $order = unserialize($_SESSION['order']);
    $query = $conn->prepare("insert into orders_line(idOrder,idProduct,quantity,preu) values (:idOrder,:idProduct,:quantity,:preu)");
    foreach ($order as $idProduct => $quantity){
        if (!empty($quantity)) {
            $last = $conn->query("select max(id) as id from orders");
            $idOrder = $last->fetch()['id'];
            $find = $conn->query("select * from products where codi='$idProduct'");
            $product = $find->fetch();
            $preu = valorTotal($quantity,$product);
            $query->bindParam(":idOrder",$idOrder);
            $query->bindParam(":idProduct",$idProduct);
            $query->bindParam(":quantity",$quantity);
            $query->bindParam(":preu",$preu);
            $query->execute();
        }
    }

}
