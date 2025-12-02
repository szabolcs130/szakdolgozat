import { EllenorizElsoResz, htmlEllenorrzo} from './Ellenorzo.js';
export async function SzuroFelepit(param,maximumAr,callback) {
    const szuroTarolo=document.getElementById("szuroTarolo");
    const minArLabel=document.createElement("label");
    minArLabel.textContent="Min: ";

    const maxArLabel=document.createElement("label");
    maxArLabel.textContent="Max: ";

    const minArInput=document.createElement("input");
    minArInput.type="range";
    minArInput.id="minAr";
    minArInput.min=0;
    minArInput.value=0;
    minArInput.max=maximumAr?.[0]?.max;
    minArInput.type="range";
    minArInput.disabled=true;

    const errorMinArP=document.createElement("p");
    errorMinArP.style.display="none";
    const MinArErtekeP=document.createElement("p");
    //MinArErtekeP.style.display="none";
    MinArErtekeP.textContent=0+" Forint";
    const maxArInput=document.createElement("input");
    maxArInput.type="range";
    maxArInput.id="maxAr";
    maxArInput.type="range";
    maxArInput.min=0;
    maxArInput.max=maximumAr?.[0]?.max;
    maxArInput.value=maximumAr?.[0]?.max;
    maxArInput.disabled=true;

    const errorMaxArP=document.createElement("p");
    errorMaxArP.style.display="none";
    const MaxArErtekeP=document.createElement("p");
    //MaxArErtekeP.style.display="none";
    MaxArErtekeP.textContent=+maximumAr?.[0]?.max+" Forint";

    const maxArDiv=document.createElement("div");
    maxArDiv.id="maxArDiv";
    maxArDiv.appendChild(maxArLabel);
    maxArDiv.appendChild(maxArInput);
    maxArDiv.appendChild(MaxArErtekeP);
    maxArDiv.appendChild(errorMaxArP);

    const minArDiv=document.createElement("div");
    minArDiv.id="minArDiv";
    minArDiv.appendChild(minArLabel);
    minArDiv.appendChild(minArInput);
    minArDiv.appendChild(MinArErtekeP);
    minArDiv.appendChild(errorMinArP);
    
    const minSzoveg=0;
    const maxSzoveg=50;
    const patternSzoveg=/^[A-Za-z ]+$/;
    const nevKeresInput=document.createElement("input");
    nevKeresInput.type="text";
    nevKeresInput.placeholder="Kulcsszo";
    nevKeresInput.id="nevKeres";
    nevKeresInput.addEventListener("input",(e)=>{
        EllenorizElsoResz(szuresBekuldGomb,errorP,nevKeresInput,true,patternSzoveg,minSzoveg,maxSzoveg,false);
    });
    htmlEllenorrzo(nevKeresInput,patternSzoveg,minSzoveg,maxSzoveg,true);
    const errorP=document.createElement("p");
    errorP.style.display="none";
    const nevErrorDiv=document.createElement("div");
    nevErrorDiv.id="nevErrorDiv";
    nevErrorDiv.appendChild(nevKeresInput);
    nevErrorDiv.appendChild(errorP);

    const szuresBekuldGomb=document.createElement('button');
    szuresBekuldGomb.type="submit";
    szuresBekuldGomb.textContent="Keres";

    minArInput.addEventListener("input",(e)=>{
        MinArErtekeP.textContent=e.target.value+" Forint";
        if (parseInt(e.target.value)>=parseInt(maxArInput.value)) {
            maxArInput.value=(parseInt(e.target.value)+100);
            MaxArErtekeP.textContent=maxArInput.value+" Forint";
        }
    });
    maxArInput.addEventListener("input",(e)=>{
        MaxArErtekeP.textContent=e.target.value+" Forint";
        if (parseInt(e.target.value)<=parseInt(minArInput.value)) {
            minArInput.value=(parseInt(e.target.value)-100);
            MinArErtekeP.textContent=minArInput.value+" Forint";
        }
    });
    szuresBekuldGomb.addEventListener("click",async function(){
        var nevResult=EllenorizElsoResz(szuresBekuldGomb,errorP,nevKeresInput,true,patternSzoveg,minSzoveg,maxSzoveg,true);
        var minArResult=EllenorizElsoResz(szuresBekuldGomb,errorMinArP,minArInput,true,/^[0-9]{0,8}$/,0,9,true);
        var maxArResult=EllenorizElsoResz(szuresBekuldGomb,errorMaxArP,maxArInput,true,/^[0-9]{0,8}$/,0,9,true);
        if (nevResult && minArResult && maxArResult) {
            const data1=await FetchMeghiv(param,0,null,nevKeresInput.value || null,minArInput.value || null,maxArInput.value || null);
            callback(data1);
            const data2=await FetchMeghiv(param,null,true,nevKeresInput.value || null,minArInput.value || null, maxArInput.value || null);
            LapozashozLegorduloMenu(data2);
        }
    });
    nevKeresInput.addEventListener("input",(e)=>{
        if (e.target.value.length==0) {
            maxArInput.disabled=true;
            minArInput.disabled=true;
        }else{
            maxArInput.disabled=false;
            minArInput.disabled=false;
        }
    });
    //szuroTarolo.appendChild(nevKeresInput);
    //szuroTarolo.appendChild(errorP);
    szuroTarolo.appendChild(nevErrorDiv);
    szuroTarolo.appendChild(minArDiv);
    szuroTarolo.appendChild(maxArDiv);
    szuroTarolo.appendChild(szuresBekuldGomb);
}
export async function FetchMeghiv(param,oldalSzam=null,osszesDarab=null,nev=null,minAr=null,maxAr=null){
    let url=param+"&oldalSzam="+oldalSzam;
    if (osszesDarab) {
        url=url+"&osszesDarab="+osszesDarab;
    }
    if (nev) {
        url=url+"&nev="+nev;
        if (minAr) {
        url=url+"&minAr="+minAr;
        }
        if (maxAr) {
            url=url+"&maxAr="+maxAr;
        }
    }
    const response= await fetch(url);
    const data = await response.json();
    return data;
}
export function LapozashozSelectEsemeny(url,callback) {
    const oldalValaszto=document.getElementById("oldalValaszto");
    oldalValaszto.addEventListener("change",async function(e){
        const minArInput=document.getElementById("minAr");
        const maxArInput=document.getElementById("maxAr");
        const nevKeresInput=document.getElementById("nevKeres");
        const data1=await FetchMeghiv(url,e.target.value,null,nevKeresInput?.value || null,minArInput?.value || null,maxArInput?.value || null);
        callback(data1);
    });
}
export function LapozashozElozoKovekezoEsemenyek(){
const elozoLapozo=document.getElementById("elozo");
    const kovetkezoLapozo=document.getElementById("kovetkezo");
    const oldalValaszto=document.getElementById("oldalValaszto");
    
    kovetkezoLapozo.addEventListener("click",()=>{
        if ((oldalValaszto.childElementCount-1)>=(oldalValaszto.selectedIndex+1)) {
            oldalValaszto.selectedIndex=(oldalValaszto.selectedIndex+1);
            oldalValaszto.dispatchEvent(new Event("change"));
        }
    });
    elozoLapozo.addEventListener("click",()=>{
        if ((oldalValaszto.selectedIndex-1)>=0) {
            oldalValaszto.selectedIndex=(oldalValaszto.selectedIndex-1);
            oldalValaszto.dispatchEvent(new Event("change"));
        }
        
    });
}
export async function LapozashozLegorduloMenu(param){
    const AruOsszOldalSzam=param; 
    const ellenorzottOsszAru=AruOsszOldalSzam?.[0]?.osszes || 0;
    const oldalSzamok=Math.ceil(ellenorzottOsszAru/10)==0 ? 1 : (Math.ceil(ellenorzottOsszAru/10));
    oldalValaszto.innerHTML="";
    if (oldalValaszto.childElementCount==0) {
        for (let i = 0; i < oldalSzamok; i++) {
            const option=document.createElement('option');
            option.value=(i*10);
            option.textContent=(i+1)+". oldal";
            oldalValaszto.appendChild(option);
        }
        oldalValaszto.selectedIndex=0;
        oldalValaszto.dispatchEvent(new Event("change"));
    }
}
export function ElozoKovetkezoLapozoMegjelenitese() {
    const elozoLapozo=document.getElementById("elozo");
    const kovetkezoLapozo=document.getElementById("kovetkezo");
    if (oldalValaszto.selectedIndex==0) {
        elozoLapozo.style.visibility="hidden";
    }else{
        elozoLapozo.style.visibility="visible";
    }
    if ((oldalValaszto.selectedIndex+1)==(oldalValaszto.childElementCount)) {
        kovetkezoLapozo.style.visibility="hidden";
    }else{
        kovetkezoLapozo.style.visibility="visible";
    }
}