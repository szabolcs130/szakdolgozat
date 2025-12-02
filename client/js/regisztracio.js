import { EllenorizElsoResz,htmlEllenorrzo} from './Ellenorzo.js';
window.onload=function () {
    const username=document.getElementById("username");
    const email=document.getElementById("email");
    const p=document.getElementById("p");

    const usernameMin=5;
    const usernameMax=20;
    const usernamePattern=/^[A-Za-z0-9]+$/;
    htmlEllenorrzo(username,usernamePattern,usernameMin,usernameMax,true);

    const emailMin=11;
    const emailMax=254;
    const emailPattern=/^[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,3}$/;
    htmlEllenorrzo(email,emailPattern,emailMin,emailMax,true);

    const pMin=12;
    const pMax=64;
    const pPattern=/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^A-Za-z0-9]).{12,64}$/;
    htmlEllenorrzo(p,pPattern,pMin,pMax,true);

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
        EllenorizElsoResz(regisztracioBekuldGomb,erroremailP,email,false,emailPattern,emailMin,emailMax);
    });

    p.addEventListener("input",(e)=>{
        EllenorizElsoResz(regisztracioBekuldGomb,errorPasswordP,p,false,pPattern,pMin,pMax);
    });
}