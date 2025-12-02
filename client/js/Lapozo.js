import { EllenorizElsoResz, htmlEllenorrzo} from './Ellenorzo.js';
export async function SzuroFelepit(param,maximumAr,callback) {
    const szuroTarolo=document.getElementById("szuroTarolo");
    const minArLabel=document.createElement("label");
    minArLabel.textContent="Min: 0";

    const maxArLabel=document.createElement("label");
    maxArLabel.textContent="Max: "+maximumAr?.[0]?.max;

    const minArInput=document.createElement("input");
    minArInput.type="range";
    minArInput.id="minAr";
    minArInput.min=0;
    minArInput.value=0;
    minArInput.max=maximumAr?.[0]?.max;
    minArInput.type="range";
    minArInput.disabled=true;

    let maxArInput=document.createElement("input");
    maxArInput.type="range";
    maxArInput.id="maxAr";
    maxArInput.type="range";
    maxArInput.min=0;
    maxArInput.max=maximumAr?.[0]?.max;
    maxArInput.value=maximumAr?.[0]?.max;
    maxArInput.disabled=true;

    const maxArDiv=document.createElement("div");
    maxArDiv.id="maxArDiv";
    maxArDiv.appendChild(maxArLabel);
    maxArDiv.appendChild(maxArInput);

    const minArDiv=document.createElement("div");
    minArDiv.id="minArDiv";
    minArDiv.appendChild(minArLabel);
    minArDiv.appendChild(minArInput);
    
    const minSzoveg=0;
    const maxSzoveg=50;
    const patternSzoveg=/^[A-Za-z ]+$/;
    let nevKeresInput=document.createElement("input");
    nevKeresInput.type="text";
    nevKeresInput.placeholder="Kulcsszo";
    nevKeresInput.id="nevKeres";
    nevKeresInput.addEventListener("input",(e)=>{
        EllenorizElsoResz(szuresBekuldGomb,errorP,nevKeresInput,true,patternSzoveg,minSzoveg,maxSzoveg);
    });
    htmlEllenorrzo(nevKeresInput,patternSzoveg,minSzoveg,maxSzoveg,false);
    const errorP=document.createElement("p");
    errorP.style.display="none";
    const nevErrorDiv=document.createElement("div");
    nevErrorDiv.id="nevErrorDiv";
    nevErrorDiv.appendChild(nevKeresInput);
    nevErrorDiv.appendChild(errorP);

    let szuresBekuldGomb=document.createElement('button');
    szuresBekuldGomb.type="submit";
    szuresBekuldGomb.textContent="Keres";

    minArInput.addEventListener("input",(e)=>{
        minArLabel.textContent="Min: "+e.target.value;
        if (parseInt(e.target.value)>=parseInt(maxArInput.value)) {
            maxArInput.value=(parseInt(e.target.value)+100);
            maxArLabel.textContent="Max: "+maxArInput.value;
        }
    });
    maxArInput.addEventListener("input",(e)=>{
        maxArLabel.textContent="Max: "+e.target.value;
        if (parseInt(e.target.value)<=parseInt(minArInput.value)) {
            minArInput.value=(parseInt(e.target.value)-100);
            minArLabel.textContent="Max: "+minArInput.value;
        }
    });
    szuresBekuldGomb.addEventListener("click",async function(){
        const data1=await FetchMeghiv(param,0,null,nevKeresInput.value || null,minArInput.value || null,maxArInput.value || null);
        callback(data1);
        const data2=await FetchMeghiv(param,null,true,nevKeresInput.value || null,minArInput.value || null, maxArInput.value || null);
        LapozashozLegorduloMenu(data2);
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