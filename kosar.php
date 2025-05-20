<?php
class kosar{
    private $kosar=[];
    public function kosarTolt($termek){
        $this->kosar[]=$termek;
    }
    public function kosarKiir(){
        foreach ($this->kosar as $value) {
            echo $value;
        }
    }
    public function vegOsszeg(){
        $osszeg=0;
        foreach ($this->kosar as $value) {
           $osszeg+=$value->getAr();
        }
        return $osszeg;
    }
    public function kosarEgyTermekTorol($id){
        foreach ($this->kosar as $key=>$value) {
          if($value->getId()==$id){
            unset($this->kosar[$key]);
          }
        }
    }
}
/*$kosar=new kosar();
$kosar->kosarTolt($alma);
$kosar->kosarTolt($korte);
$kosar->kosarKiir();
echo $kosar->vegOsszeg();
echo $kosar->kosarEgyTermekTorol(1);
echo "---------<br>";
$kosar->kosarKiir();
*/

?>