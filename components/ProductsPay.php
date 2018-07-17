<?php

class ProductsPay
{

    public function sumOfAllProducts():float
    {
        $productsModel = new Product();
        $products = $productsModel->getProducts();
        $sum = 0;
        foreach ($products as $product) {
            if (isset($_SESSION[$product['name']])) {
                $sum += doubleval($product['price']) * $_SESSION[$product['name']];
            }

        }
        return $sum;
    }

   
    public function addProductToCart(string $name)
    {
        if (!isset($_SESSION[$name])) {
            $_SESSION[$name] = 1;
        } else {
            $_SESSION[$name] += 1;
        }
    }

    public function addAnyQuantity(string $name, int $count)
    {
        $_SESSION[$name] += $count;
    }

    public function removeProduct(string $name, int $count)
    {
        $_SESSION[$name] -= $count;
    }


   //pay for all products and deduct the amount from the money
    public function payForProducts(float $sum)
    {
        if($_SERVER['REQUEST_METHOD']==='POST') {
            if (isset($_POST["transport"]) AND isset($_SESSION['cash'])) {
                $sum += intval($_POST["transport"]);
                if($sum <= $_SESSION['cash']){
                    if(isset ($_SESSION['Apple']) AND $_SESSION['Apple'] > 0 OR
                        isset ($_SESSION['Beer']) AND $_SESSION['Beer'] > 0 OR
                        isset ($_SESSION['Water']) AND  $_SESSION['Water'] >0 OR
                        isset ($_SESSION['Cheese']) AND $_SESSION['Cheese'] > 0)
                         $_SESSION['cash'] -= $sum;
                         if(isset ($_SESSION['Apple'])){$_SESSION['Apple'] = 0;}
                         if(isset ($_SESSION['Beer'])){$_SESSION['Beer'] = 0;}
                         if(isset ($_SESSION['Water'])){$_SESSION['Water'] = 0;}
                         if(isset ($_SESSION['Cheese'])){$_SESSION['Cheese'] = 0;}
                    header("Location: ../" );
                }else{
                    echo "Your amount is not enough to pay";
                }
            } else {
                echo "Please select transport";
            }
        }}

}