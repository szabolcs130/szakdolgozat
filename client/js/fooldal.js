window.onload = async function() {
    const data=await FetchMeghiv("lekerdezAruSzures",null,true);
    const data2=await FetchMeghiv("lekerdezAruMaxAr");
    SzuroFelepit(data2);
    LapozashozElozoKovekezoEsemenyek();
    LapozashozSelectEsemeny();
    LapozashozLegorduloMenu(data);
}
async function SzuroFelepit(maximumAr) {
    let szuroTarolo=document.getElementById("szuroTarolo");

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

    let maxArInput=document.createElement("input");
    maxArInput.type="range";
    maxArInput.id="maxAr";
    maxArInput.type="range";
    maxArInput.min=0;
    maxArInput.max=maximumAr?.[0]?.max;
    maxArInput.value=maximumAr?.[0]?.max;

    const maxArDiv=document.createElement("div");
    maxArDiv.id="maxArDiv";
    maxArDiv.appendChild(maxArLabel);
    maxArDiv.appendChild(maxArInput);

    const minArDiv=document.createElement("div");
    minArDiv.id="maxArDiv";
    minArDiv.appendChild(minArLabel);
    minArDiv.appendChild(minArInput);

    let nevKeresInput=document.createElement("input");
    nevKeresInput.type="text";
    nevKeresInput.placeholder="Kulcsszo"
    nevKeresInput.id="nevKeres"
    let szuresBekuldGomb=document.createElement('button');
    szuresBekuldGomb.type="submit";
    szuresBekuldGomb.textContent="Keres";
    minArInput.addEventListener("input",(e)=>{
        minArLabel.textContent="Min: "+e.target.value;
    });
    maxArInput.addEventListener("input",(e)=>{
        maxArLabel.textContent="Max: "+e.target.value;
    });
    szuresBekuldGomb.addEventListener("click",async function(){
        const data1=await FetchMeghiv("lekerdezAruSzures",0,null,nevKeresInput.value || null,minArInput.value || null,maxArInput.value || null);
        Lapoz(data1);
        const data2=await FetchMeghiv("lekerdezAruSzures",null,true,nevKeresInput.value || null,minArInput.value || null, maxArInput.value || null);
        LapozashozLegorduloMenu(data2);
    });

    szuroTarolo.appendChild(nevKeresInput);
    //szuroTarolo.appendChild(minArLabel);
    //szuroTarolo.appendChild(minArInput);
    //szuroTarolo.appendChild(maxArLabel);
    //szuroTarolo.appendChild(maxArInput);
    szuroTarolo.appendChild(minArDiv);
    szuroTarolo.appendChild(maxArDiv);
    szuroTarolo.appendChild(szuresBekuldGomb);
}
async function FetchMeghiv(param,oldalSzam=null,osszesDarab=null,nev=null,minAr=null,maxAr=null){
    let url="?oldal=Apitermekek/"+param+"&oldalSzam="+oldalSzam;
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
function LapozashozSelectEsemeny() {
    const oldalValaszto=document.getElementById("oldalValaszto");
    oldalValaszto.addEventListener("change",async function(e){
        const minArInput=document.getElementById("minAr");
        const maxArInput=document.getElementById("maxAr");
        const nevKeresInput=document.getElementById("nevKeres");
        const data1=await FetchMeghiv("lekerdezAruSzures",e.target.value,null,nevKeresInput.value || null,minArInput.value || null,maxArInput.value || null);
        Lapoz(data1);
    });
}
function LapozashozElozoKovekezoEsemenyek(){
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
async function LapozashozLegorduloMenu(param){
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
    return;
}
function ElozoKovetkezoLapozoMegjelenitese() {
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
async function Lapoz(data) {
    const aruk=document.getElementById('aruk');
    aruk.innerHTML="";
    data.forEach(element => {

        const aru=document.createElement('div');
        aru.classList.add('aru');

        const aru_nev=document.createElement('div');
        aru_nev.classList.add('aru_nev');
        aru_nev.textContent=element.nev_aru;

        const aru_kep=document.createElement('img');
        aru_kep.classList.add('aru_kep');
        const kepUrl=new URL('../image/'+element.kep+'.png', import.meta.url).href;
        aru_kep.src=kepUrl;
        aru_kep.alt="Nem sikerult a kep betoltes!";

        const aru_ar=document.createElement('div');
        aru_ar.classList.add('aru_ar');
        aru_ar.textContent=element.ar+" Forint";

        const aru_mennyiseg=document.createElement('div');
        aru_mennyiseg.classList.add('aru_mennyiseg');
        aru_mennyiseg.textContent=element.mennyiseg ? "Raktáron: "+element.mennyiseg+"db" : "Elfogyott";

        const aru_leiras=document.createElement('div');
        aru_leiras.classList.add('aru_leiras');
        aru_leiras.textContent=element.leiras;
        
        const liTag=document.createElement('li');

        const aTag=document.createElement('a');
        aTag.href='?oldal=Termek/Main/'+element.id_aru;
        aTag.textContent="Megnéz";

        liTag.appendChild(aTag);
        
        aru.appendChild(aru_nev);
        aru.appendChild(aru_kep);
        aru.appendChild(aru_ar);
        aru.appendChild(aru_leiras);
        aru.appendChild(aru_mennyiseg);
        aru.appendChild(liTag);

        aruk.appendChild(aru);

    });
    window.scrollTo(0,0);
    ElozoKovetkezoLapozoMegjelenitese();
}