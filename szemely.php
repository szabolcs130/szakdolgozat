<?php
require_once("kosar.php");
require_once("aruoop.php");

class szemely{
    private $id_szemely;
    private $nev_szemely;
    private $email;
    private $jelszo;
    private $rang;
    public $kosar;
   /* public function __construct(){//$id,$nev,$email,$jelszo,$rang
       // $this->id=$id;
       // $this->nev=$nev;
       // $this->email=$email;
        //$this->jelszo=$jelszo;
       // $this->rang=$rang;
    }*/
    public function __construct($id=-1,$nev="",$email="",$jelszo="",$rang=""){

        if ($id!=-1) {
            $this->id_szemely=$id;
            $this->nev_szemely=$nev;
            $this->email=$email;
            $this->jelszo=$jelszo;
            $this->rang=$rang;
            $this->kosar=new kosar();
        }
     }
    
    public function getId(){
        return $this->id_szemely;
    }
    public function getNev(){
        return $this->nev_szemely;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getJelszo(){
        return $this->jelszo;
    }
    public function getRang(){
        return $this->rang;
    }
    public function belepett(){
        echo "Sikeresen belepett: ".$this->nev_szemely;
    }
    public function kilepett(){
        echo "Sikeresen kilepett: ".$this->nev_szemely;
    }
    public function Kiir(){
        echo $this->getId()." ".$this->getNev()." ".$this->getEmail()." ".$this->getJelszo()." ".$this->getRang();
    }
    public static function valaszto(){
        echo "<br>";
    }
    public function __toString(){
        return $this->id_szemely." ".$this->nev_szemely." ".$this->email." ".$this->jelszo." ".$this->rang."<br>";
    }
    public function __destruct(){
        if(!empty($this->getNev())){
        echo "<br>".$this->getNev()." torlesre kerult";
        }else{
            echo "<br> torlesre kerult";
        }
    }
}
/*
$szemely=new szemely(1,"Szabolcs","alma@alkma.hu","valamiJelszi","__1");
$alma=new aru(1,"alma",100,"Nagy szemu alma");
$korte=new aru(2,"korte",200,"birsKorte");
*/
/*
$szabi=new szemely(1,"Szabolcs","szabolcs@gmail.com","jelszo","__1");
echo $szabi->kilepett();*/
 
?>
