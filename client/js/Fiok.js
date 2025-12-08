import { SzuroFelepit,FetchMeghiv,LapozashozSelectEsemeny,LapozashozElozoKovekezoEsemenyek,LapozashozLegorduloMenu,ElozoKovetkezoLapozoMegjelenitese } from './Lapozo.js';
import { EllenorizElsoResz,htmlEllenorrzo} from './Ellenorzo.js';
window.onload=async function() {
    /*const response= await fetch("?oldal=Apifiok/GetMegvasaroltak&oldalSzam=0");
    const data = await response.json();
    if (data) {
        FizetesekKilistaz(data);    
    }*/
    LapozashozElozoKovekezoEsemenyek("elozo","kovetkezo","oldalValaszto");
    KepLapozashozSelectEsemeny("oldalValaszto");
    const response2= await fetch("?oldal=Apifiok/GetMegvasaroltakOsszes");
    const data2 = await response2.json();
    LapozashozLegorduloMenu(data2,"oldalValaszto");
}
async function KepLapozashozSelectEsemeny(oldalvalaszto) {//atirni
        const oldalValaszto=document.getElementById(oldalvalaszto);
        oldalValaszto.addEventListener("change",async function(e){
            var oldalValasztoReturn=EllenorizElsoResz(false,oldalValaszto,true,/^[0-9]{1,8}$/,1,8,true);
            if (oldalValasztoReturn) {
                const response= await fetch("?oldal=Apifiok/GetMegvasaroltak&oldalSzam="+oldalValaszto.value);
                const data = await response.json();
                FizetesekKilistaz(data);
            }
        });
}
function FizetesekKilistaz(data) {
    const tablazatTarolo=document.getElementById("tablazatTarolo");
    tablazatTarolo.innerHTML="";
    
    if (data.length) {
        const aruTablazat=document.createElement('div');
        aruTablazat.id="aruTablazat";

        const aruTable=document.createElement('table');
        aruTable.id='tablazat';
            
        const thead=document.createElement('thead');
            
        const thR=document.createElement('tr');
        
        const thHId=document.createElement('th');
        thHId.textContent="Id";
        thR.appendChild(thHId);
        
        const thHDatum=document.createElement('th');
        thHDatum.textContent="Datum";
        thR.appendChild(thHDatum);

        const thHNev=document.createElement('th');
        thHNev.textContent="Név";
        thR.appendChild(thHNev);

        const thHAr=document.createElement('th');
        thHAr.textContent="Ár";
        thR.appendChild(thHAr);

        const thHMennyiseg=document.createElement('th');
        thHMennyiseg.textContent="Mennyiség";
        thR.appendChild(thHMennyiseg);


        const thHEgyben=document.createElement('th');
        thHEgyben.textContent="(Ár*Mennyiség)";
        thR.appendChild(thHEgyben);

        const thHOsszeg=document.createElement('th');
        thHOsszeg.textContent="Összesen";
        thR.appendChild(thHOsszeg);

        thead.appendChild(thR);
        aruTable.appendChild(thead);

        const tbody=document.createElement('tbody');

        const lapozo=document.getElementById("lapozo");
        if (lapozo) {
            lapozo.style.display="flex";
        }
        var uj=null;
        var osszeg=0;
        var b=false;
        data.forEach(element => {
            if (uj!=element.id_fizetes) {
                uj=element.id_fizetes;
                b=true;
                console.log("uj "+element.id_fizetes);
            }else{
                console.log("regi");
                b=false;
            }
            const tbRId=document.createElement('tr');
            
            const tbDId=document.createElement('td');
            tbDId.classList.add('id_aru');
            if (b) {
                tbDId.textContent=element.id_fizetes;
            }

            const tbDDatum=document.createElement('td');
            tbDDatum.classList.add('datum');
            if (b) {
                tbDDatum.textContent=element.fizetesdatum;
            }

            const tbDNev=document.createElement('td');
            tbDNev.classList.add('nev');
            tbDNev.textContent=element.nev_aru;

            const tbDAr=document.createElement('td');
            tbDAr.classList.add('ar');
            tbDAr.textContent=element.ar;

            const tbDMe=document.createElement('td');
            tbDMe.classList.add('me');
            tbDMe.textContent=element.me;

            const tbDEgyben=document.createElement('td');
            tbDEgyben.classList.add('egyben');
            tbDEgyben.textContent=((parseInt(element.me)*parseInt(element.ar)));
            
            const tbDOsszeg=document.createElement('td');
            tbDOsszeg.classList.add('osszeg');
            if (b) {
                tbDOsszeg.textContent=element.osszeg;
            }
            tbRId.appendChild(tbDId);
            tbRId.appendChild(tbDDatum);
            tbRId.appendChild(tbDNev);
            tbRId.appendChild(tbDAr);
            tbRId.appendChild(tbDMe);
            tbRId.appendChild(tbDEgyben);
            tbRId.appendChild(tbDOsszeg);
            tbody.appendChild(tbRId);
        });
        aruTable.append(tbody);
        aruTablazat.appendChild(aruTable);
        tablazatTarolo.appendChild(aruTablazat);
       
    }else{
        const keresesEredmenyNincsh3=document.createElement("h3");
        keresesEredmenyNincsh3.textContent="Nincs talalat! ";
        tablazatTarolo.appendChild(keresesEredmenyNincsh3);
        const lapozo=document.getElementById("lapozo");
        if (lapozo) {
            lapozo.style.display="none";
        }
    }
    window.scrollTo(0,0);
    ElozoKovetkezoLapozoMegjelenitese("elozo","kovetkezo","oldalValaszto");
}