<?php
class ShoppingCart
{
    private $products;

    /**
     * ShoppingCart constructor.
     * @param $products
     */
    public function __construct()
    {
        if (isset($_SESSION['order'])) {
            $this->products = unserialize($_SESSION['order']);
        }
        else {
            $this->products = [];
        }
    }

    public function addProduct($codi,$quantity)
    {
        if (is_numeric($quantity)) $this->products[$codi] += $quantity;

    }

    public function delProduct($codi)
    {
        unset($this->products[$codi]);

    }
    public function save(){
        $_SESSION['order'] = serialize($this->products);
    }

    public function addProducts($products){
        foreach ($products as $codi => $quantity){
            {
                $this->addProduct($codi,$quantity);
            }
        }
        $this->save();
    }



    public function totalShopping()
    {
        include dirname(__FILE__) . '/../config/connection.php';
        $total = 0;

        foreach ($this->products as $codi => $quantity) {
            $product = Product::select($conn,$codi);
            $amount = $product->preu();
            $preuLinea = $quantity * $amount;
            $total += $preuLinea;
        }
        return $total;
    }

    public function count()
    {
        return count($this->products);
    }

    public function guardarPedido($conn){
        $usuario = unserialize($_SESSION['usuario'])['id'];
        $ad = unserialize($_SESSION['address']);
        $address = $ad['address'].' '.$ad['postalCode'].' '.$ad['city'];
        $payment = 'T';
        try {
            $conn->beginTransaction();
            $query = $conn->prepare("insert into orders(user,address,payment) values (:user,:address,:payment)");
            $query->bindParam(":user",$usuario);
            $query->bindParam(":address",$address);
            $query->bindParam(":payment",$payment);
            $result = $query->execute();
            if (!$result) throw new Exception();
            $last = $conn->query("select max(id) as id from orders");
            $idOrder = $last->fetch()['id'];
            $query = $conn->prepare("insert into orders_line(idOrder,idProduct,quantity,preu) values (:idOrder,:idProduct,:quantity,:preu)");
            foreach ($this->products as $idProduct => $quantity){
                    $product = Product::select($conn,$idProduct);
                    $preu = $quantity*$product->preu();
                    $query->bindParam(":idOrder",$idOrder);
                    $query->bindParam(":idProduct",$product->getCodi());
                    $query->bindParam(":quantity",$quantity);
                    $query->bindParam(":preu",$preu);
                    $result = $query->execute();
                    if (!$result) throw new Exception();
            }
            $conn->commit();
            $this->products = [];
            $this->save();
        } catch (Exception $ex) {
            $conn->rollback();
            echo "No s'han pogut guardar en la BD :".$ex->getMessage();
        }
    }
}