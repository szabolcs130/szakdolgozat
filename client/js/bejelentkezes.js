import { EllenorizElsoResz,htmlEllenorrzo} from './Ellenorzo.js';
window.onload=function () {
    const email=document.getElementById("email");
    const p=document.getElementById("p");

    const emailMin=11;
    const emailMax=254;
    const emailPattern=/^[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,3}$/;
    htmlEllenorrzo(email,emailPattern,emailMin,emailMax,true);

    const pMin=12;
    const pMax=64;
    const pPattern=/^(?=.*[A-ZÁÉÍÓÖŐÚÜŰ])(?=.*[a-záéíóöőúüű])(?=.*\d)(?=.*[^A-Za-z0-9áéíóöőúüűÁÉÍÓÖŐÚÜŰ]).{12,64}$/;
    htmlEllenorrzo(p,pPattern,pMin,pMax,true);

    const erroremailP=document.getElementById("errorEmailP");
    const errorPasswordP=document.getElementById("errorPasswordP");

    erroremailP.style.display="none";
    errorPasswordP.style.display="none";

    const bejelentkezesBekuldGomb=document.getElementById("bejelentkezesBekuldGomb");
    bejelentkezesBekuldGomb.addEventListener("click",(e)=>{
        const emailReturn=EllenorizElsoResz(erroremailP,email,false,emailPattern,emailMin,emailMax,true);
        const pReturn=EllenorizElsoResz(errorPasswordP,p,false,pPattern,pMin,pMax,true);
        if (!emailReturn || !pReturn) {
            e.preventDefault();
        }
    });
    email.addEventListener("input",()=>{
        EllenorizElsoResz(erroremailP,email,false,emailPattern,emailMin,emailMax,false);
    });

    p.addEventListener("input",()=>{
        EllenorizElsoResz(errorPasswordP,p,false,pPattern,pMin,pMax,false);
    });
}