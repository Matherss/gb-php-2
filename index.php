<?php
/**
 * Класс Good - основной для всех товаров, содержащий необходимые поля и методы для описания каждого товара
 */
class Good {
    protected $title;
    protected $price;
    protected $img;

    public function __construct($title, $price, $img) {
        $this->title = $title;
        $this->price = $price;
        $this->img = $img;
    }
    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }
    public function getGood()
    {
        return "Товар: $this->title стоит $this->price руб.";
    }

    
}
/**
 * Класс монитор только для мониторов, имеющий базовую информацию о товаре + марку монитора
 */
class Monitor extends Good {
    protected $mark;
    public function __construct($title, $price, $img, $mark) {
        parent::__construct($title, $price, $img);
        $this->mark = $mark;
    }
    
    
    public function getGood(){
        return parent::getGood() . 'Марка: ' . $this->mark;
    }


}
/**
 * Класс Мышь имеет информацию о товаре и дополнительную информацию о конкретной мышки
 */
class Mouse extends Good {
    protected $mark;
    protected $type;
    public function __construct($title, $price, $img, $mark, $type) {
        parent::__construct($title, $price, $img);
        $this->mark = $mark;
        $this->type = $type;
    }

    public function getGood(){
        return parent::getGood() . ' Марка: ' . $this->mark . ' Тип: ' .$this->type;
    }
}

$firstGood = new Mouse('Мышка', 5000, null, 'Razer', 'Lazer');


echo $firstGood->getGood();


// Задания 5-7:

//5
class A {
    public function foo() {
    static $x = 0; // Статическая переменная принадлежит классу, а не его экземплярам
    echo ++$x; // префикс.инкр. (увеличиваем на 1 и выводим)
    }
    }
    $a1 = new A(); //Создаем экземпляр класса
    $a2 = new A(); //Создаем экземпляр класса
    $a1->foo(); // выводится 1(так как при создании класса $x = 0, а выводим префикс)
    $a2->foo(); // выводится 2 (в x лежит 3). Так как переменная статическая - она принадлежит классу, значит, грубо говоря, она общая для всех экземпляров
    $a1->foo(); // 3
    $a2->foo(); // 4
//6
    class A {
        public function foo() {
        static $x = 0;
        echo ++$x;
        }
        }
        class B extends A { // Мы копируем содержимое класса A в класс B, при этом переменная $x принадлежит и классу A и классу B (в разных участках памяти)
        }
        $a1 = new A(); // экземпляр класса A в одном участке памяти
        $b1 = new B();// экземпляр класса B в одном участке памяти
        $a1->foo(); // выводится префиксная форма $x в классе A (1)
        $b1->foo(); // выводится префиксная форма $x в классе B (1)
        $a1->foo(); // выводится префиксная форма $x в классе A (2)
        $b1->foo(); // выводится префиксная форма $x в классе B (2)
//7
/**
 * Создание экземпляра класса без скобок. Если в конструктор не передаются параметры - так можно делать
 */
        class A {
            public function foo() {
            static $x = 0;
            echo ++$x;
            }
            }
            class B extends A {
            }
            $a1 = new A;
            $b1 = new B;
            $a1->foo();
            $b1->foo();
            $a1->foo();
            $b1->foo();
            
        