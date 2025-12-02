import { EllenorizElsoResz} from './Ellenorzo.js';
window.onload=function () {
    const email=document.getElementById("email");
    const p=document.getElementById("p");

    const emailMin=11;
    const emailMax=254;
    const emailPattern=/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;
    email.minLength=emailMin;
    email.maxLength=emailMax;
    email.required=true;
    email.pattern=emailPattern.source;


    const pMin=12;
    const pMax=64;
    const pPattern=/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^A-Za-z0-9]).{12,64}$/;
    p.minLength=pMin;
    p.maxLength=pMax;
    p.required=true;
    p.pattern=pPattern.source;

    const erroremailP=document.getElementById("errorEmailP");
    const errorPasswordP=document.getElementById("errorPasswordP");

    erroremailP.style.display="none";
    errorPasswordP.style.display="none";

    const bejelentkezesBekuldGomb=document.getElementById("bejelentkezesBekuldGomb");
    
    email.addEventListener("input",(e)=>{
        EllenorizElsoResz(bejelentkezesBekuldGomb,erroremailP,email,false,emailPattern,emailMin,emailMax);
    });

    p.addEventListener("input",(e)=>{
        EllenorizElsoResz(bejelentkezesBekuldGomb,errorPasswordP,p,false,pPattern,pMin,pMax);
    });
}