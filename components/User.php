<?php

class User
{
    private $cash = 100;

    public function getCash()
    {
        return $this->cash;
    }

    public function setCash($cash){
        $this->cash = $cash;
    }

}