<?php

class aru{
    private $id_aru;
    private $nev_aru;
    private $ar;
    private $leiras;
    public static $osszes=[];
    public function __construct($id=-1,$nev="",$ar="",$leiras=""){
       if ($id!=-1) {
        $this->id=$id;
        $this->nev=$nev;
        $this->ar=$ar;
        $this->leiras=$leiras;
        self::$osszes[]=$this;
       }
    }
    public function getId(){
    return $this->id_aru;
    }
    public function getNev(){
        return $this->nev_aru;
    }
    public function getAr(){
        return $this->ar;
    }
    public function getLeiras(){
        return $this->leiras;
    }
    public function __toString(){
        return $this->id_aru." ".$this->nev_aru." ".$this->ar." ".$this->leiras."<br>";
    }
    
}
?>