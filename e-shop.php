<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php

//indico le caratteristiche del mio e-shop
class EShop {

     // proprietà
    public $name;        //null
    public $websit;        //null
    public $products;

    //definisco il costruttore per istanziare i miei valori, passo gli argomenti alle proprietà della classe
    public function __construct($nome, $sito) {
        $this->name = $nome;
        $this->websit = $sito;
        $this->products = [];
    }
      
    public function addProduct(Product $product) { //aggiungi un prodotto
        $this->products[] = $product;
    }

    public function getProducts() { 
        return $this->products;
    }
}

$eshop = new EShop("diamond", "shop.diamond.com");//passi i tuoi valori e segui le regole del costruttore
//var_dump($eshop);



// CLASSE GENERICA -product-, è il PARENT, le classi figlie ereditano tutte le proprietà e i metodi

class Product {

    protected $label;// protected = non può essere settato esternamente, può essere esteso e sovrascritta dalle classi figlie
    protected $price;    
    protected $weight;
    protected $brand;

    public function __construct($label, $price, $weight, $brand) {
        $this->label = $label;
        $this->price = $price;
        $this->weight = $weight;
        $this->brand = $brand;
    }

  /*  public function setLabel($newLabel) {
        $this->label = $newLabel;
    }*/

    public function getLabel(){
        return $this->label;
    }

   /* public function setPrice($newPrice) {
        if ($newPrice > 0) {
            $this->price = $newPrice;
        }
    } */

    public function getPrice(){
        return $this->price;
    }
    
    public function getWeight(){
        return $this->weight;
    }

    public function getBrand() {
        return $this->brand;
    }

   
}
/*
$p = new Product("Label", 3, 40, "Carpisa");

$p->setLabel("Label 2");
$p->setPrice(-10);
*/




class TechProduct extends Product {  //--CLASSE figlia che eredita tutte le proprietà del parent

    public $voltage;//----qui inserisco solo le proprietà relative a questo specifico settore e non ad altri
    
    public function __construct($label, $price, $weight, $brand, $voltage)
    {
        parent::__construct($label, $price, $weight, $brand);
        $this->voltage = $voltage;
    }
}

//var_dump($techProduct);


class WineProduct extends Product {
       
    public $color;

    public function __construct($label, $price, $weight, $brand, $color)
    {
        parent::__construct($label, $price, $weight, $brand);
        $this->color = $color;
    }
}


class BookProduct extends Product {
       
    public $author;

    public function __construct($label, $price, $weight, $brand, $author)
    {
        parent::__construct($label, $price, $weight, $brand);
        $this->author = $author;
    }
}




class User {
    protected $name;
    protected $surname;
    protected $subscription;
     private $card;
     public  $discount = 0;

     public function __construct($name, $surname, $subscription, $card) {
         $this->name = $name;
         $this->surname = $surname;
         $this->subscription = $subscription;
         $this->card = $card;
        
     }

     public function getUser() {
         return $this->name;
     }

     public function getSurname() {
         return $this->surname;
     }

     public function getSubscription(){
         return $this->subscription;
     }
     public function getCard()
     {
         return $this->card;
     }
}

class PremiumUser {    // qui dentro potrebbe avere la definizione di una percentuale di sconto per ogni prodotto.
    
    protected $name;
    protected $surname;
    protected $subscription;
    private $card;
    public $discount = 50;

    public function __construct($name, $surname, $subscription, $card) {
        $this->name = $name;
        $this->surname = $surname;
        $this->subscription = $subscription;
        $this->card = $card;    
    }

     public function getUser() {
         return $this->name;
     }

     public function getSurname() {
         return $this->surname;
     }

     public function getSubscription(){
         return $this->subscription;
     }
     public function getCard()
     {
         return $this->card;
     }
}


?>
    <div class="container" style="background-color:#D2B48C; width:400px;">
        <?php $techProduct = new TechProduct("Wine Case", "137.11 euro", "9 kg", "CASO DESIGN", "230 Volt") ?>
        <h1><?php echo $techProduct->getLabel() ?></h1>
        <span>Prezzo: <?php echo $techProduct->getPrice() ?></span><br>
        <span>Peso: <?php echo $techProduct->getWeight() ?></span><br>
        <span>Brand: <?php echo $techProduct->getBrand() ?></span> 
    </div>

    <div class="container" style="background-color:#F5DEB3; width:400px;">
        <?php $wineProduct = new WineProduct("Rosso del Conte Tenuta Regaleali - 2016 ", "42 euro", "300 g", "Tasca d'Almerita", "Rosso rubino brillante") ?>
        <h1><?php echo $wineProduct->getLabel() ?></h1>
        <span>Prezzo: <?php echo $wineProduct->getPrice() ?></span><br>
        <span>Peso: <?php echo $wineProduct->getWeight() ?></span><br>
        <span>Brand: <?php echo $wineProduct->getBrand() ?></span> 
    </div>

    <div class="container" style="background-color:#FFDAB9; width:400px;">
        <?php $bookProduct = new BookProduct("L'inverno dei leoni", "19 euro", "618 g", "NARRATIVA NORD", "Stefania Auci") ?>
        <h1><?php echo $bookProduct->getLabel() ?></h1>
        <span>Prezzo: <?php echo $bookProduct->getPrice() ?></span><br>
        <span>Peso: <?php echo $bookProduct->getWeight() ?></span><br>
        <span>Brand: <?php echo $bookProduct->getBrand() ?></span> 
    </div>

    <div class="container" style= "width:300px">
        
                <?php $user = new User("Noemi", "Patermo", "Prime", "5251888520887745"); ?>
                <h4> Nome: <?php echo $user->getUser(); ?></h4>
                <h4> Cognome: <?php echo $user->getSurname(); ?></h4>
                <span>Abbonamento: <?php echo $user->getSubscription(); ?></span><br>
                <span>Numero Carta: <?php  echo $user->getCard();?></span><br>
                <hr>
                
               <?php $anotherUser = new PremiumUser("Matteo", "Perdinci", "PrimeStudent", "78521420210887745"); ?>
                <h4> Nome: <?php echo $anotherUser->getUser(); ?></h4>
                <h4> Cognome: <?php echo $anotherUser->getSurname(); ?></h4>
                <span>Abbonamento: <?php echo $anotherUser->getSubscription(); ?></span><br>
                <span>Numero Carta: <?php  echo $anotherUser->getCard();?></span><br>
                      
    </div>

</body>
</html>

<?php
/*
1. creiamo l'eshop
2. creiamo diversi prodotti
3. aggiungiamoli all'eshop
4. creaiamo l'utente normale
5. creiamo un utente premium
6. inseriamo le carte di credito per ciascun utente
6. l'utente normale acquista un prodotto
7. l'utente premium acquista un altro prodotto (e riceve lo sconto)
*/ 
?>