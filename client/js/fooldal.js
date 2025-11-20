window.onload = async function() {
    let responseAruOsszOldalSzam= await fetch("?oldal=Apitermekek/AruOsszSor");
    let AruOsszOldalSzam = await responseAruOsszOldalSzam.json();

    const oldalValaszto=document.getElementById("oldalValaszto");
    oldalValaszto.addEventListener("change",e=>Lapoz(e.target.value));
    if (oldalValaszto.childElementCount==0) {
        const ellenorzottOsszAru=AruOsszOldalSzam?.[0]?.osszes || 0;
        const oldalSzamok=Math.floor(ellenorzottOsszAru/10);
        for (let i = 0; i < oldalSzamok; i++) {
            const option=this.document.createElement('option');
            option.value=(i*10);
            option.textContent=(i+1)+". oldal";
            oldalValaszto.appendChild(option);
        }
        Lapoz(0);
    }
}
async function Lapoz(oldalSzama) {
    console.log("oldal: "+oldalSzama)
    let response= await fetch("?oldal=Apitermekek/lekerdezAruLapozo&oldalSzam="+oldalSzama);
    let data = await response.json();
    console.log(data);
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
    document.body.appendChild(aruk);
}
