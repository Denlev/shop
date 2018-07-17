<?php


class Rate
{
    //Save rating to Db
    public function saveRating(string $product, int $rating):string
    {
        $db = new Db();
        $db = $db->getConnection();

        $db->query("UPDATE rating SET `countOfAllVotes` = `countOfAllVotes`+1 WHERE `product`= '$product'");

        $db->query("UPDATE rating
            SET `currentAverageRating` = (`currentAverageRating` * (`countOfAllVotes`-1) + $rating ) / `countOfAllVotes` 
            WHERE `product`='$product'");


        $avg= $db->query("SELECT `currentAverageRating` FROM `rating` WHERE `product`='$product'");
        $avgRating = $avg->fetch_assoc();
        $db->close();
        return $avgRating['currentAverageRating'];
    }
    //Get rating from Db
    public function getRating():array
    {
        $db = new Db();
        $db = $db->getConnection();

        $result = $db->query("SELECT `product`, `currentAverageRating` FROM `rating`");

        $rating = [];
        $i = 0;
        $products = ['Apple', 'Beer', 'Water', 'Cheese'];
        while ($row = $result->fetch_assoc()) {
            $rating[$products[$i]]['currentAverageRating'] = $row['currentAverageRating'];
            $i++;
        }
        return $rating;
    }
}