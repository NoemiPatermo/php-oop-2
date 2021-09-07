<?php

//indico le caratteristiche del mio e-shop
class EShop {

      public $nome;        
      public $indirizzo;
      public $partitaIva;
      public $prodotti = [];

      
    public function addProduct(Product $nomeProdotto) {
        $this->prodotti[] = $nomeProdotto;
    }

    public function getProducts() {
        return $this->prodotti;
    }
}

// da questa classe generica, nascono tanti oggetti 
// protected = non può essere settato esternamente, può essere sovrascritta dalle classi figlie
class Product {

    protected $label = "prodotto generico";
    protected $price;    
    protected $weight;
    protected $brand;

    public function getLabel(){
        return $this->label;
    }
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



//----qui inserisco solo le proprietà relative a questo specifico settore e non ad altri
Class TechProduct extends Product {
   
    public $warranty = 2;
    
    public function __construct()
    {
        $this->label = 'cuffie';
        $this->price = 30;
        $this->weight = 10;
        $this->brand = 'Sony';
    }

}

Class BeautyProduct extends Product {
     
    public $comfy = "lorem";

    public function __construct()
    {
        $this->label = 'maschera per capelli';
        $this->price = 50;
        $this->weight = 20;
        $this->brand = 'Kerastase';
    }
}

Class SportProduct extends Product {
       
    public $healthy = "lorem";

    public function __construct()
    {
        $this->label = 'tappetino yoga';
        $this->price = 60;
        $this->weight = 2;
        $this->brand = 'Domyos';
    }
}

// ---------------------------------------------

class User {

    public $sconto = 0;
    private $id;
    public $nome;
    public $cognome;

}

class PremiumUser {

    // qui dentro potrebbe avere la definizione di una percentuale di 
    // sconto per ogni prodotto.
    public $sconto = 50;


}


// ----------------------------------------------


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