import { EllenorizElsoResz,htmlEllenorrzo} from './Ellenorzo.js';
window.onload=function() {
    const aruk=document.querySelectorAll(".kosarMennyiseg");
    aruk.forEach(element=>{
        element.addEventListener("input",()=>{
            EllenorizElsoResz(false,element,false,/^(0|[1-9][0-9]{0,7})$/,1,8,false);
        });
    });
    const kosarGomb=document.querySelectorAll(".mennyisegValtoztatForm");
    if (kosarGomb) {
        kosarGomb.forEach(element => {
        element.addEventListener('submit',MennyisegValtoztat);
        });
    }
    const fizetesMegnyom=document.getElementById("fizetesMegnyom");
    if (fizetesMegnyom) {
        fizetesMegnyom.addEventListener('click',FizetesMegkezd);
    }
}
function MennyisegValtoztat(e) {
    const aruk=document.querySelectorAll(".kosarMennyiseg");
    var mehet=true;
    aruk.forEach(element=>{
        mehet=EllenorizElsoResz(false,element,false,/^(0|[1-9][0-9]{0,7})$/,1,8,true);
        if (mehet==false) {
            alert("Érvénytelen szám!")
            e.preventDefault();
            return;
        }
    });
}
function FizetesMegkezd(e) {

    const aruk=document.querySelectorAll(".kosarMennyiseg");
    var mehet=true;
    aruk.forEach(element=>{
            mehet=EllenorizElsoResz(false,element,false,/^[1-9][0-9]{0,7}$/,1,8,true);
            if (mehet==false) {
                e.preventDefault();
                var megjegyzes=document.getElementById("megjegyzesh3");
                if (!megjegyzes) {
                    megjegyzes=document.createElement('h3');
                    megjegyzes.id="megjegyzesh3";
                    megjegyzes.textContent='Megvásárolandó áru mennyisége csak érvényes szám lehet nem lehet nulla!';
                    document.getElementById("aruk").appendChild(megjegyzes);
                }
            }

    });
}
