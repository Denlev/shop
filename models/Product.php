<?php

class Product
{
    public function getProducts():array
    {
        $db = new Db();
        $db = $db->getConnection();

        $result = $db->query("SELECT * FROM products");

        $products = array();
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['photo'] = $row['photo'];
            $i++;
        }
        return $products;
    }


}
