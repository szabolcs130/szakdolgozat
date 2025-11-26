import { SzuroFelepit,FetchMeghiv,LapozashozSelectEsemeny,LapozashozElozoKovekezoEsemenyek,LapozashozLegorduloMenu,ElozoKovetkezoLapozoMegjelenitese } from './Lapozo.js';
window.onload = async function() {
    const data2=await FetchMeghiv("?oldal=Apitermekek/lekerdezAruMaxAr");
    SzuroFelepit(data2,(eredmeny)=>{
        Lapoz(eredmeny);
    });
    LapozashozElozoKovekezoEsemenyek();
    const a=await LapozashozSelectEsemeny("?oldal=Apitermekek/lekerdezAruSzures",(eredmeny)=>{
        Lapoz(eredmeny)
    });
    const data=await FetchMeghiv("?oldal=Apitermekek/lekerdezAruSzures",null,true);
    LapozashozLegorduloMenu(data);;
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