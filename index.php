<?php
abstract class Good{
    protected $name;
    protected $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

        /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    abstract function getFinalPrice();
    // ниже метод рассчета дохода. (Представим, что мы тратим на закупку товара 10%)
    public function getIncome(){
        return $this->getFinalPrice() * 0.9;
    }
}


class WeightGood extends Good {
    protected $weight;

    public function __construct($name, $price, $weight)
    {
        $this->weight = $weight;

        parent::__construct($name, $price);
    }

    public function getFinalPrice(){
        return $this->price * $this->weight;
    }
}

class DigitalGood extends Good {
    public function getFinalPrice(){
        return $this->price;
    }
}

class PieceGood extends Good {
    protected $count;

    public function __construct($name, $price, $count)
    {
        parent::__construct($name, $price);
        $this->count = $count;
    }

    public function getFinalPrice() {
        return $this->price * $this->count;
    }


}

$good_digit = new DigitalGood('Цифровой товар', 100);
$good_piece = new PieceGood('Числовой', 1000, 2);
$good_wei = new WeightGood('Весовой товар', 15, 0.5);

echo "<h1>Стоимость:</h1>";
echo $good_digit->getName()." ".$good_digit->getFinalPrice()."<br>";
echo $good_wei->getName()." ".$good_wei->getFinalPrice()."<br>";
echo $good_piece->getName()." ".$good_piece->getFinalPrice()."<hr><h1>Доход:</h1>";
echo $good_digit->getName()." ".$good_digit->getIncome()."<br>";
echo $good_wei->getName()." ".$good_wei->getIncome()."<br>";
echo $good_piece->getName()." ".$good_piece->getIncome();
