import { EllenorizElsoResz} from './Ellenorzo.js';
window.onload=function () {
    const username=document.getElementById("username");
    const email=document.getElementById("email");
    const p=document.getElementById("p");

    const usernameMin=5;
    const usernameMax=20;
    const usernamePattern=/^[A-Za-z0-9]+$/;
    username.minLength=usernameMin;
    username.maxLength=usernameMax;
    username.required=true;
    username.pattern=usernamePattern.source;

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

    const errorUsernameP=document.getElementById("errorUsernameP");
    const erroremailP=document.getElementById("errorEmailP");
    const errorPasswordP=document.getElementById("errorPasswordP");

    errorUsernameP.style.display="none";
    erroremailP.style.display="none";
    errorPasswordP.style.display="none";

    const regisztracioBekuldGomb=document.getElementById("regisztracioBekuldGomb");
    
    username.addEventListener("input",(e)=>{
        EllenorizElsoResz(regisztracioBekuldGomb,errorUsernameP,username,false,usernamePattern,usernameMin,usernameMax);
    });

    email.addEventListener("input",(e)=>{
        EllenorizElsoResz(regisztracioBekuldGomb,erroremailP,email,false,emailPattern,emailMin,usernameMax);
    });

    p.addEventListener("input",(e)=>{
        EllenorizElsoResz(regisztracioBekuldGomb,errorPasswordP,p,false,pPattern,pMin,pMax);
    });
}