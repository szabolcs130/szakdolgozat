<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // echo az visszateres ertek nelkuli.gyorsabb
    //print() visszateresi erteke van.lassabb
    $proba=5;
    print("1. Integer a proba: ".$proba." tipusa: ".gettype($proba)."<br>");
    settype($proba,"string"); //ez volt a tipus atalalkitas. Ez hatassal van a !== operatorra
    print("2. Stringre alakitotta a felso resz: ".gettype($proba));
    print("<br> 3. masfajta kasztolas: ");$proba=(double) $proba;print(gettype($proba));
    print("<br>");
    print("<br>");
    print(" 4. Operatorok");
    $tiz=10;print("<br>5. \$tiz=".$tiz);
    $tiz+=10;print("<br>6. \$tiz+=".$tiz);
    $tiz-=10;print("<br>7. \$tiz-=".$tiz);
    $tiz/=10;print("<br>8. \$tiz/=".$tiz);
    $tiz%=10;print("<br>9. \$tiz%=".$tiz);
    $tiz.="10. valami szoveg";print("<br> \$tiz.=".$tiz);
    print("<br>");
    $egy=1;$ketto=2;
    print("11. \$egy erteke ".$egy." \$ketto erteke ".$ketto."<br>");
    print(" <br>12.Ertek adas: = \$egy=1");$egy=1;
    print(" <br>13.Ertekek egyenloek: ==".'$egy==$ketto '); if($egy==$ketto){echo "igaz";}else{echo "hamis";}
    print(" <br>14.Ertekek es tipusok egyenloek: === "); if($egy===$ketto){echo "igaz";}else{echo "hamis";}
    print(" <br>15.Ertekek nem egyenloek: != "); if($egy!=$ketto){echo "igaz";}else{echo "hamis";}
    print(" <br>16.Ertekek es tipusok nem egyenloek: !== "); if($egy!==$ketto){echo "igaz";}else{echo "hamis";}
    print("17. tovabbi: > < >= <= || && !");
    print("<br>18. a erteke true b erteke true eredmeny: ");$a=true;$b=false;
    if($a and $b){
        print("AND: mindketto igaz, ");
    }else{
        print("AND: az egyik tuti hamis,");
    }

    if($a or $b){
        print(" OR: mindketto vagy egy igaz,");
    }else{
        print(" OR: az egyik tuti igaz,");
    }
    if($a xor $b){
        print(" XOR: egyik igaz");
    }else{
        print(" XOR: egyik se vagy mindegyik igaz");
    }
    print("<br> 19. valtozo ertek valtoztatasa: ");
    $x=0;
    echo $x++ >= 1; //elsonek megnezi, hogy nagyobb vagy egyenlo, utanan noveli
    echo "<br>erteke ".$x." <br>";
    echo ++$x >=1; //elsonek noveli x erteket, majd megnezi nagyobb e
    echo "<br> erteke: ".$x." <br>";
    echo +$x."<br>" ; //egyel novelem
    echo $x;

    echo "<br> 20. Muveletek sorrendje!! fontos!! 53. oldal";
    echo "<br>21. allando valtozo: ";
    define( "ALLANDO_VALTOZO",10);
    echo ALLANDO_VALTOZO." <br>";
    echo "--------------------------VEZERLESI SZERKEZETEK--------------------";
    echo "22. ?: muveletjel hazsnalata: <br>";
    $szoveg=(ALLANDO_VALTOZO==10) ? "Allando_valtozo erteke a 10" : "Allando_valtozo erteke nem 10";
    echo $szoveg;

    //66. oldal
    echo "<br>-------------------FUGGVENYEK--------------<br>";
    function koszonFV(){
        print("Jo napot!");
    }
    $fuggvenyTarolo="koszonFV";
    $fuggvenyTarolo();
    echo "<br>globalis valtozo, amit fuggvenyen kivul hozunk letre es erunk el a fuggvenyben<br>";
    $kintiValtozo=10;
    function nemEremElFV(){
        print("<br> HIbauzenet ez felett van. Nem erem el ezt a valtozot: kintivaltozo, amelynek erteke nem latsziik: ".$kintiValtozo."<br>");
    }
    nemEremElFV();
    function EremElFV(){
        global $kintiValtozo;
        print("Erem el ezt a valtozot: kintivaltozo, amelynek erteke  latsziik: ".$kintiValtozo."<br>");
    }
    EremElFV();

    echo "<br>Staticus valtozo a fuggvenyben. Peldaul szamolhatjuk vele, hogy hanyszor hivtuk meg a fuggvenyet.";

    function statikusValtozoFV(){
        static $kintiValtozo=0;
        $kintiValtozo++;
        print("<br>Ennyiszer hívtuk meg ezt a függvényt: ".$kintiValtozo."<br>"); 
    }
    statikusValtozoFV();
    statikusValtozoFV();
    $kintiValtozo=10303;// nem lehet elerni kivulrol. A fentebb emlitett global kulcsszoval ellatott valtozot, barki atirhatja a tudtunk nelkul. Ezt csak a fuggveny irja felul.
    statikusValtozoFV();
function osszead($szam,$szam2){
$eredmeny=$szam+$szam2;
return $eredmeny;//return ($szam+$szam2); avgy return (valamiMasikFuggveny($szam));
}
function meretez($szoveg,$meret){
print "<font size=\"$meret\" face=\"Helvetica,Ariel,Sans-Serif\">$szoveg <br></font>";
}
meretez("alma",5);
meretez("alma",6);
meretez("alma",7);
//fuggvenynek parametert adunk es csak az erteket masolja le, vagy pedig hivatkozast, azaz a kapott parameter memoria cimet kapjuk meg, igy at irjukhatjuk a kapott parametert!

function csakMasolatotKapFV($szam){
$szam+=5;
}
$a=1;
csakMasolatotKapFV($a);echo "<br>$a";
function hivatkozastKapFV(&$szam){
    $szam+=5;
    }
    $a=1;
    hivatkozastKapFV($a);echo "<br>$a";
    

echo "<br>ket eredmeny erteke: ".osszead(8,2)."<br>";
    //89. oldal tetejenel jarok.
    print("<br> break continue <br>");
    for ($i=5; $i>-2; $i--) { 
        if($i==0){
        break;//kilep es hiaba menne a ciklus -1 -ig, amikor $i az 0, akkor itt kilep es mar a print nem valosul meg.
        }
        print($i.": ".(10/$i)." <br>");
    }
    print("<br>");
    for ($i=5; $i>-2; $i--) { 
        if($i==0){
        continue; //amiikor a $i erteke 0, akkor ez alatti dolgok mar nem valosul meg, viszont nem lep ki a ciklusbol, hanem folytatja tovabb, amíg a ciklus feltétel engedi, azaz a $i nel lesz -2, itt már ki lép és csak a $i -1 nél fog kiiratni.
        }
        print($i.": ".(10/$i)." <br>");
    }
    echo "<br>-------------------------------------Tombok-------------------------------------<br>";
    echo "Egy dimenzios <br>";
    $tomb=array("a","b");
    $tomb[]="c";
    $tomb[3]="d";
    for ($i=0; $i < count($tomb); $i++) {//sizeof() 
        echo "$i.elem: $tomb[$i] <br>";
    }
    echo "Utolso eleme(csak azert mukodika  count() mert a tomben az indexek szamokkal vannak es a count is szamot ad vissza): ".$tomb[count($tomb)-1]."<br>";
    
    //foreach

    foreach ($tomb as $key => $value) {
        echo "$key $value <br>";
    }
    
    foreach ($tomb as $value) {
     echo "$key  valtozok erteket nem torni automatikusan, igy megmaradnak benne az ertekek mmintha definialva lenne itt is a $key <br>"; 
    }
    unset($key);
    echo "most mar nem lesze rteke es hibat ad: ";
    foreach ($tomb as $value) {
        echo "$key  valtozok erteket nem torni automatikusan, igy megmaradnak benne az ertekek mmintha definialva lenne itt is a key valtozo <br>"; 
       }
echo "csak az kulcsok kiiratasa: <br>";

foreach ($tomb as $key) {
    echo "$key<br>"; 
   }
  
    $tomb2=array(
        "A"=>64,
        "B"=>66
    );
    
    $tomb2["C"]=67;
    $tomb2["A"]=64;
    for ($i=0; $i < count($tomb2); $i++) {//sizeof() 
        //hibara fut, mert nincsenek ilyen indexei: echo "$i.elem: $tomb2[$i] <br>";
    }
    foreach ($tomb2 as $key => $value) {
        echo "$key : $value <br>";
    }
    //102 tobbdimenzios tomboket kell olvasnom

    echo "<br> Tobb dimenzios <br>"; 
    $tobbDimenzio=array(
       "kisbetu" => array(
           "a"=>65,
           "b"=>66 
       ),
        "nagybetu" => array(
           "A"=>65,
           "B"=>66 
        )
    );
    echo "<br>kiiratni az egeszet<br>";
    $szamol=0;
    foreach($tobbDimenzio as $kisArrayek){
        print_r($kisArrayek);// mivel tombot iratnank ki, vagyis a kisbetu es nagybetu tombot, tehat a tobbDimenzio indexeit, amelyek tombok, igy az echo es a print hibat ad ki.
        echo " Sor ".$szamol."<br>";
        $szamol++;
    }
    $szamol=0;
    echo "<br> a tomb indexek es az ertekeik elerese  <br>";

    foreach ($tobbDimenzio as $kisArrayek) {
        foreach($kisArrayek as $kisArrayekIndexei => $ertek){
            echo "Index: ".$kisArrayekIndexei." Erteke: ".$ertek;
            echo " Sor: ".$szamol."<br>";
            $szamol++;
        }
    }
    $szamol=0;
   echo "is_array() megadja hogy az adott valtozo egy tomb-e azaz true vagy false pl amikor ket foreach van, akkor meg lehet gyozodni, hogy a kapott parameter peldaul a amsodik forachnal az tomb e, mert ha nem , akkoor hibat adna <br>";
   echo "A tobbDimenzio egy tomb: ". is_array($tobbDimenzio)." De a szamol valtozo nem tomb: "; if(!is_array($szamol)){ echo "nem tomb";}
   //16. oraban foreach segitsegevel tomb ertekek megvaltoztatasa
    echo " <br>array_merge() hasznalata <br>";
    $elsoTomb=array(1,2,3);
    $masodikTomb=array(10,20,30);
    $harmadikTomb=array_merge($elsoTomb,$masodikTomb);
    foreach ($harmadikTomb as $value) {
        echo "$value <br>";
    }
    echo "<br> array_push() <br>";
    $elsoTombbenLevoOsszesElem=array_push($elsoTomb,4,5,6);
    echo "<br> Osszesen ennyi elem lett az elsoTomb ben $elsoTombbenLevoOsszesElem <br>";
    foreach ($elsoTomb as $value) {
        echo "$value <br>";
    }
    echo "Ha egy valtozo nevet akarunk kiirnii dollarjellel akkor a  \ kell hazsnalni, hogy ne forditsa le a program pl: \$elsoTomb <br>";
    echo "Ha az array_push() mindket parametere egy tomb, akkor ket dimenzios tomb jon letre!!! Ha csak ossze akarjuk rakni egy dimenziosba akkor kell az array_merge() <br>";
    echo "<br> array_shift() parameterben kapott tomb elso elemet eltavolitja es visszatérési éréke az elem értéke lesz. <br>";
    echo array_shift($elsoTomb);
echo "<br> Maradek elem a \$elsoTomb ben <br>";
foreach ($elsoTomb as $value) {
    echo "$value <br>";
}
echo "<br> array_silence() parameterek: 3,2, elso parameter egy tomb, a masodik parameter az az, hogy a parameterkent kapott tomb nel melyik indexnel kezdje, es ha nem kap harmadik parametert, akkor a tomb vegeig, ha kap, akkor adott parameterig megy.  <br>";
$kiszedTomb=array_slice($elsoTomb,1,3);// 0. 1. 2. indexu elemeket kapjuk meg tombkent;
print_r($kiszedTomb); echo "<br>";
unset($kiszedTomb);
$kiszedTomb=array_slice($elsoTomb,2);// 2. indexu elemtol a vegeig
print_r($kiszedTomb);
echo "<br> <br>";
$ujTomb=array(1,2,3,4,5,6);
$kiszedTomb=array_slice($ujTomb,-3,-1); //a tomb vegerol leszamitunk visszafele 3 elemet, es onnastol kezdve iratja ki, ugy, hogy 3-1=2 tehat a 3. elemet(1 elem) es a 2. elemet(2 elem) es itt teljesul a 3-1=2, igy az utolso elem mar enm lesz kiiratva.
print_r($kiszedTomb);
echo "<br> <br>";
$kiszedTomb=array_slice($ujTomb,(-1*count($ujTomb))); //ennek az erteke -7, tehat az osszes elemet belerakja, de a tomb vegetol kezdi, es a tomb elejeig megy.
print_r($kiszedTomb);
echo "<br> <br>";
echo "<br> Tombok rendezese <br>";
$rendezetlenTomb=array(10,1,2,300,50,3);
echo "<br> Rendezetlen tomb:  <br>";
foreach ($rendezetlenTomb as $value) {
    echo $value ." ";
}
echo "<br> Rendezett tomb:  <br>";
sort($rendezetlenTomb);
foreach ($rendezetlenTomb as $value) {
    echo $value ." ";
}
echo "<br> <br>";
echo "<br> Rendezett tomb:  <br>";
rsort($rendezetlenTomb);
foreach ($rendezetlenTomb as $value) {
    echo $value ." ";
}
echo "<br> <br>";
$rendezetlenTomb=array("korte","eper","Zseni","Szilva");
echo "<br> Rendezetlen tomb:  <br>";
foreach ($rendezetlenTomb as $value) {
    echo $value ." ";
}
echo "<br> Rendezett tomb:  <br>";
sort($rendezetlenTomb);//az elso betu alapjan rendezi ascii kod alapjan. CSAK ANGOL BETUK LEHETNEK!!
foreach ($rendezetlenTomb as $value) {
    echo $value ." ";
}
echo "<br> FONTOS, HOGY ASSZOCIATIV, TEHAT AMELYIK TOMBNEL AZ INDEXEK NEM SZAMMAL VANNAK JELOLVE, OTT NEM SZABAD A SORTOT HASZNALNI, MERT
AZ KARAKTERLANCOKBOL SZAMOK LESZNEK!!!!pl harmadik=>10 ebbol a sort() miatt 0=>10 lenne. Erre van az asort() <br>";
$karakterLancIndexuTomb=array("elso"=>5,"masodik"=>1,"harmadik"=>10);
echo "<br> Rendezetlen tomb:  <br>";
foreach ($karakterLancIndexuTomb as $key => $value) {
    echo $key." ".$value ." <br> ";
}
echo "<br> Rendezett tomb:  <br>";
asort($karakterLancIndexuTomb);
foreach ($karakterLancIndexuTomb as $key => $value) {
    echo $key." ".$value ." <br> ";
}

echo "<br> Lehet rendezni kulcs szerint is, nem csak ertek szerint, mint a fentieknel. <br>";

$karakterLancIndexuTomb=array("harmadik"=>5,"masodik"=>1,"elso"=>10);
echo "<br> Rendezetlen tomb:  <br>";
foreach ($karakterLancIndexuTomb as $key => $value) {
    echo $key." ".$value ." <br> ";
}
echo "<br> Rendezett tomb:  <br>";
ksort($karakterLancIndexuTomb);
foreach ($karakterLancIndexuTomb as $key => $value) {
    echo $key." ".$value ." <br> ";
}


echo "<br> Objektumok <br>";
class elso_osztaly{
var $nev;//="Alma";
function __construct($kapott="Nincs nev megadva"){
$this->nev=$kapott;
}
function koszon(){
    return "Ez egy tagfuggveny! Sajat adattagjat meghivom az objektumnak:".$this->nev."<br>";
}
function nevAtir($kapott){
    $this->nev=$kapott;
}
function nevKiir(){
    return "<br>A nevem: ".$this->nev;
}
}
$obj1=new elso_osztaly();
echo "\$obj1 nek az típusa: ".gettype($obj1);
echo "<br>\$nev erteke: ".$obj1->nev." <br>";
$obj1->nev="Korte";
echo "<br>\$nev erteke: ".$obj1->nev." <br>";
$obj1->koszon();
$obj1->nevAtir("Szilva");
echo "<br>\$nev erteke: ".$obj1->nev." <br>";

echo "<br> <br>";
$obj2=new elso_osztaly("Valami");

echo "<br>\$nev erteke: ".$obj2->nevKiir()." <br>";

$obj1 = new elso_osztaly();
echo "\$obj1 nek az típusa: ".gettype($obj1);
echo "<br>\$nev erteke: ".$obj1->nev." <br>";
$obj1->nev = "Korte";
echo "<br>\$nev erteke: ".$obj1->nev." <br>";
$obj1->koszon();
$obj1->nevAtir("Szilva");
echo "<br>\$nev ertekel: ".$obj1->nev." <br>";

echo "<br> <br>";

$obj2 = new elso_osztaly("Valami");
echo "<br>\$nev ertekeé: ".$obj2->nevKiir()." <br>";

class osztaly {
    var $alma;

    function __construct($param="NaN") {
        $this->alma = $param;
    }

    function nevKiir() {
        print "<br>\masodik osztaly neve: ".$this->alma." <br>";
    }
}

$obj3 = new osztaly();
$obj3->nevKiir();
echo "<br> <br>";


echo "az 1 ertek  kisebb azaz ". (1<=>2)." a 2 ertekenel";
echo " <br>az 2 ertek  nagyobb azaz ". (2<=>1)." a 1 ertekenel";

?>
</body>
</html>