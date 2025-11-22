window.onload = async function() {
    const responseAruOsszOldalSzam= await fetch("?oldal=Apitermekek/AruOsszSor");
    const AruOsszOldalSzam = await responseAruOsszOldalSzam.json();
    const ellenorzottOsszAru=AruOsszOldalSzam?.[0]?.osszes || 0;
    const oldalSzamok=Math.floor(ellenorzottOsszAru/10);
    const elozoLapozo=document.getElementById("elozo");
    const kovetkezoLapozo=document.getElementById("kovetkezo");
    const oldalValaszto=document.getElementById("oldalValaszto");
    oldalValaszto.addEventListener("change",e=>Lapoz(e.target.value));
    if (oldalValaszto.childElementCount==0) {
        for (let i = 0; i < oldalSzamok; i++) {
            const option=this.document.createElement('option');
            option.value=(i*10);
            option.textContent=(i+1)+". oldal";
            oldalValaszto.appendChild(option);
        }
        Lapoz(0);
    }
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
async function Lapoz(oldalSzama) {
    let response= await fetch("?oldal=Apitermekek/lekerdezAruLapozo&oldalSzam="+oldalSzama);
    let data = await response.json();
    const aruk=document.getElementById('aruk');
    aruk.innerHTML="";
    data.forEach(element => {

        const aru=document.createElement('div');
        aru.classList.add('aru');

        const aru_nev=document.createElement('div');
        aru_nev.classList.add('aru_nev');
        aru_nev.textContent=element.nev_aru;

        const aru_ar=document.createElement('div');
        aru_ar.classList.add('aru_ar');
        aru_ar.textContent=element.ar;

        const aru_leiras=document.createElement('div');
        aru_leiras.classList.add('aru_leiras');
        aru_leiras.textContent=element.leiras;
        
        const liTag=document.createElement('li');

        const aTag=document.createElement('a');
        aTag.href='?oldal=Termek/Main/'+element.id_aru;
        aTag.textContent="Megnéz";

        liTag.appendChild(aTag);
        
        aru.appendChild(aru_nev);
        aru.appendChild(aru_ar);
        aru.appendChild(aru_leiras);
        aru.appendChild(liTag);

        aruk.appendChild(aru);

    });
    window.scrollTo(0,0);
    ElozoKovetkezoLapozoMegjelenitese();
}
