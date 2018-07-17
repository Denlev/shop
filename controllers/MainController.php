<?php

class MainController
{
    function actionIndex():bool
    {

        $db = new Db();
        $db->getConnection();
        $products = new Product();
        
        //set Cash for current session
        if(!isset($_SESSION['cash'])){
            $addCash = new User();
            $_SESSION['cash'] = $addCash->getCash();
        }


        $arrOfProducts = $products->getProducts();




        $view = new Template();
        $view->layout("main", $arrOfProducts);

        return true;
    }

 
    //Add current product to cart
     function actionAddToCart(string $product):bool
    {
        $products = new ProductsPay();
        $products->addProductToCart($product);
        echo $product;
        return true;
    }

    //save product rating
    function actionRate(string $nameOfProduct, int $rateCount):bool
    {
        $setRate = new Rate();
        $setRate = $setRate->saveRating($nameOfProduct,$rateCount);
        echo $setRate;

        $rate = new Rate();
        $rate = $rate->getRating();
        $_SESSION['rate'.$nameOfProduct] = round($rate[$nameOfProduct]['currentAverageRating'], 1);

        return true;
    }

}