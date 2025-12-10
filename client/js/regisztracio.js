import { EllenorizElsoResz,htmlEllenorrzo} from './Ellenorzo.js';
window.onload=function () {
    const username=document.getElementById("username");
    const email=document.getElementById("email");
    const p=document.getElementById("p");

    const usernameMin=2;
    const usernameMax=254;
    const usernamePattern=/^[A-Za-zÁÉÍÓÖŐÚÜŰáéíóöőúüű ]+$/;
    htmlEllenorrzo(username,usernamePattern,usernameMin,usernameMax,true);

    const emailMin=11;
    const emailMax=254;
    const emailPattern=/^[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,3}$/;
    htmlEllenorrzo(email,emailPattern,emailMin,emailMax,true);

    const pMin=12;
    const pMax=64;
    const pPattern=/^(?=.*[A-ZÁÉÍÓÖŐÚÜŰ])(?=.*[a-záéíóöőúüű])(?=.*\d)(?=.*[^A-Za-z0-9áéíóöőúüűÁÉÍÓÖŐÚÜŰ]).{12,64}$/;
    htmlEllenorrzo(p,pPattern,pMin,pMax,true);

    const errorUsernameP=document.getElementById("errorUsernameP");
    const erroremailP=document.getElementById("errorEmailP");
    const errorPasswordP=document.getElementById("errorPasswordP");

    errorUsernameP.style.display="none";
    erroremailP.style.display="none";
    errorPasswordP.style.display="none";

    const regisztracioBekuldGomb=document.getElementById("regisztracioBekuldGomb");
    
    regisztracioBekuldGomb.addEventListener("click",(e)=>{
        const emailReturn=EllenorizElsoResz(erroremailP,email,false,emailPattern,emailMin,emailMax,true);
        const pReturn=EllenorizElsoResz(errorPasswordP,p,false,pPattern,pMin,pMax,true);
        const usernameReturn=EllenorizElsoResz(errorUsernameP,username,false,usernamePattern,usernameMin,usernameMax,true);
        if (!emailReturn || !pReturn || !usernameReturn) {
            e.preventDefault();
        }
    });

    username.addEventListener("input",()=>{
        EllenorizElsoResz(errorUsernameP,username,false,usernamePattern,usernameMin,usernameMax,false);
    });

    email.addEventListener("input",()=>{
        EllenorizElsoResz(erroremailP,email,false,emailPattern,emailMin,emailMax,false);
    });

    p.addEventListener("input",()=>{
        EllenorizElsoResz(errorPasswordP,p,false,pPattern,pMin,pMax,false);
    });
}