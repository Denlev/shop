<?php

class CartController
{
    function actionIndex():bool
    {

        if(!isset($_SESSION['cash'])){
            $addCash = new User();
            $_SESSION['cash'] = $addCash->getCash();
        }

        //get all products
        $productModel = new Product();
        $products = $productModel->getProducts();

        $productsPay = new ProductsPay();
        
        $products['sumOfAll'] = $productsPay->sumOfAllProducts();
        
        //Remove money from cash
        $productsPay->payForProducts($products['sumOfAll']);

        $view = new Template();
        $view->layout("cart", $products);

        return true;
    }

    //Remove count current product(ajax) 
      function actionRemove(string $idProduct, int $count):bool
    {
        $product= new ProductsPay();
        $product->removeProduct($idProduct, $count);
        echo $_SESSION[$idProduct];

        return true;
    }

    //Add product in any quantity
    function actionAddAny(string $idProduct, int $count):bool
    {

        $product= new ProductsPay();
        $product->addAnyQuantity($idProduct, $count);
        echo $_SESSION[$idProduct];

        return true;
    }
}			