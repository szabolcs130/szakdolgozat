<?php
class menu{
    private $id_menu;
    private $nev_menu;
    private $rang;
    private static $menuk=[];
    public function __construct($id=-1,$nev_menu="",$rang=""){
        if ($id!=-1) {
            $this->id_menu=$id;
            $this->nev_menu=$nev_menu; 
            $this->rang=$rang;
            self::$menuk[]=$this;
       } 
    }
    public function getId(){
        return $this->id_menu;
        }
    public function getNev(){
        return $this->nev_menu;
    }
    public function getRang(){
        return $this->rang;
    }
    public static function getMenuk(){
        return self::$menuk;
    }
    public function __toString(){
        return $this->getId()." ".$this->getNev()." ".$this->getRang()."<br>";
    }
    public static function jogosult($rang){// 1__ , _1_ , __1 minel nagyobb indexu annal nagyobb rang. Magasabb indexu latja az alacsonyabb indexut.
        //majd itt kell megnezni, hogy adott felhasznalo melyik menuket eri el, es azokat return kent visszaadni egy tombben es azokat kiiratni neki, 
        // illetve csak azokat erje el.
        foreach (self::$menuk as $key => $value) {
            if ($value->getRang()==$rang) {
                return 1;
            }
        }
    }
}
?>