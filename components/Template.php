<?php


class template
{
    //Execute the required template
    public function layout(string $page, array $arrOfProducts): void{
        $products = $arrOfProducts;
        $main = file_get_contents(ROOT.'/views/layout/template.php');
        $content = file_get_contents(ROOT.'/views/'.$page.'.php');
        $main = str_replace('{content}', $content, $main);
        eval($main);
    }
}