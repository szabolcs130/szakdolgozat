import { EllenorizElsoResz,htmlEllenorrzo} from './Ellenorzo.js';
window.onload=function() {
    const aruk=document.querySelectorAll(".kosarMennyiseg");
    aruk.forEach(element=>{
        element.addEventListener("input",()=>{
            EllenorizElsoResz(false,element,false,/^[0-9]{0,7}$/,1,8,false);
        });
    });
    const kosarGomb=document.getElementById("kosarBekuldGomb");
    if (kosarGomb) {
        kosarGomb.addEventListener('submit',MennyisegValtoztat);
    }
    const fizetesMegnyom=document.getElementById("fizetesMegnyom");
    if (fizetesMegnyom) {
        fizetesMegnyom.addEventListener('click',FizetesMegkezd);
    }
}
function MennyisegValtoztat() {
    const aruk=document.querySelectorAll(".kosarMennyiseg");
    const mehet=true;
    aruk.forEach(element=>{
        element.addEventListener("input",()=>{
            mehet=EllenorizElsoResz(false,element,false,/^[0-9]{0,7}$/,1,8,true);
        });
    });
    if (mehet==false) {
        e.preventDefault();
    }
}
function FizetesMegkezd(e) {

    const aruk=document.querySelectorAll(".kosarMennyiseg");
    var mehet=true;
    aruk.forEach(element=>{
            mehet=EllenorizElsoResz(false,element,false,/^[1-9][0-9]{0,7}$/,1,8,true);
            if (mehet==false) {
                e.preventDefault();
                const megjegyzes=document.createElement('h3');
                megjegyzes.textContent='Megvásárolandó áru mennyisége nem lehet nulla!';
                document.getElementById("aruk").appendChild(megjegyzes);
            }

    });
}
