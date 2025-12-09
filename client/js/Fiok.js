import { SzuroFelepit,FetchMeghiv,LapozashozSelectEsemeny,LapozashozElozoKovekezoEsemenyek,LapozashozLegorduloMenu,ElozoKovetkezoLapozoMegjelenitese } from './Lapozo.js';
import { EllenorizElsoResz,htmlEllenorrzo} from './Ellenorzo.js';
window.onload=async function() {
    const lapozo=document.getElementById("lapozo");
    if (lapozo) {
        LapozashozElozoKovekezoEsemenyek("elozo","kovetkezo","oldalValaszto");
        KepLapozashozSelectEsemeny("oldalValaszto");
        const response2= await fetch("?oldal=Apifiok/GetMegvasaroltakOsszes");
        const data2 = await response2.json();
        LapozashozLegorduloMenu(data2,"oldalValaszto");
    }
    const szallitasicimFormTarolo=document.getElementById("szallitasicimFormTarolo");
    if (szallitasicimFormTarolo) {
        FormEllenoriz();
        const szallitasicimForm=document.getElementById("szallitasicimForm");
        szallitasicimForm.addEventListener("submit",FormBekuldEllenoriz);
    }
}
function FormBekuldEllenoriz(e){
    const iranyitoszamInput=document.getElementById("iranyitoszam");
    const iranyitoszamInputResult=EllenorizElsoResz(false,iranyitoszamInput,false,/^[1-9][0-9]{3}$/,4,4,true);;

    const varosInput=document.getElementById("varos");
    const varosInputResult=EllenorizElsoResz(false,varosInput,false,/^[A-Za-záéíóöőúüűÁÉÍÓÖŐÚÜŰ][A-Za-záéíóöőúüűÁÉÍÓÖŐÚÜŰ \-]+$/,3,50,true);;

    const utcaInput=document.getElementById("utca");
    const utcaInputResult=EllenorizElsoResz(false,utcaInput,false,/^[A-Za-záéíóöőúüűÁÉÍÓÖŐÚÜŰ0-9][A-Za-záéíóöőúüűÁÉÍÓÖŐÚÜŰ0-9 \-\.]+$/,2,100,true);;

    const hazszamInput=document.getElementById("hazszam");
    const hazSzamInputResult=EllenorizElsoResz(false,hazszamInput,false,/^[0-9][\-\/A-Za-z0-9]{0,9}$/,1,3,true);
    
    const emeletInput=document.getElementById("emelet");
    var emeletInputResult=true;
    if (emeletInput.value.length!=0) {
        emeletInputResult=EllenorizElsoResz(false,emeletInput,false,/^[1-9][0-9]{0,3}$/,1,3,true);
    }

    const ajtoInput=document.getElementById("ajto");
    var ajtoInputResult=true;
    if (ajtoInput.value.length!=0) {
        ajtoInputResult=EllenorizElsoResz(false,ajtoInput,false,/^[0-9A-Za-z]{1,4}$/,1,4,true);   
    }

    if ((emeletInput.value.length!=0 && ajtoInput.value.length==0) || (emeletInput.value.length==0 && ajtoInput.value.length!=0)) {
        alert("Emelet és ajtó vagy üresek vagy mindkettő ki van töltve!");
        e.preventDefault();
    }

    if (!hazSzamInputResult && !utcaInputResult && !varosInputResult && !iranyitoszamInputResult && !emeletInputResult && !ajtoInputResult) {
        e.preventDefault();
    }
}
function FormEllenoriz() {
    const iranyitoszamInput=document.getElementById("iranyitoszam");
    const errorIranyitoSzamP=document.getElementById('errorIranyitoSzamP');
    htmlEllenorrzo(iranyitoszamInput,/^[1-9][0-9]{3}$/,4,4,true);
    iranyitoszamInput.addEventListener("input",()=>{
        EllenorizElsoResz(errorIranyitoSzamP,iranyitoszamInput,false,/^[1-9][0-9]{3}$/,4,4,false);
    });

    const varosInput=document.getElementById("varos");
    const errorvarosP=document.getElementById('errorVarosP');
    htmlEllenorrzo(varosInput,/^[A-Za-záéíóöőúüűÁÉÍÓÖŐÚÜŰ][A-Za-záéíóöőúüűÁÉÍÓÖŐÚÜŰ \-]+$/,3,50,true);
    varosInput.addEventListener("input",()=>{
        EllenorizElsoResz(errorvarosP,varosInput,false,/^[A-Za-záéíóöőúüűÁÉÍÓÖŐÚÜŰ][A-Za-záéíóöőúüűÁÉÍÓÖŐÚÜŰ \-]+$/,3,50,false);
    });

    const utcaInput=document.getElementById("utca");
    const errorutcaP=document.getElementById('errorUtcaP');
    htmlEllenorrzo(utcaInput,/^[A-Za-záéíóöőúüűÁÉÍÓÖŐÚÜŰ0-9][A-Za-záéíóöőúüűÁÉÍÓÖŐÚÜŰ0-9 \-\.]+$/,2,100,true);
    utcaInput.addEventListener("input",()=>{
        EllenorizElsoResz(errorutcaP,utcaInput,false,/^[A-Za-záéíóöőúüűÁÉÍÓÖŐÚÜŰ0-9][A-Za-záéíóöőúüűÁÉÍÓÖŐÚÜŰ0-9 \-\.]+$/,2,100,false);
    });

    const hazszamInput=document.getElementById("hazszam");
    const errorHazSzamP=document.getElementById('errorHazSzamP');
    htmlEllenorrzo(hazszamInput,/^[0-9][\-\/A-Za-z0-9]{0,4}$/,1,4,true);
    hazszamInput.addEventListener("input",()=>{
        EllenorizElsoResz(errorHazSzamP,hazszamInput,false,/^[0-9][\-\/A-Za-z0-9]{0,4}$/,1,4,false);
    });

    const emeletInput=document.getElementById("emelet");
    const errorEmeletP=document.getElementById('errorEmeletP');
    htmlEllenorrzo(emeletInput,/^[1-9][0-9]{0,39}$/,0,40,false);
    emeletInput.addEventListener("input",()=>{
        if (emeletInput.value.length!=0) {
            EllenorizElsoResz(errorEmeletP,emeletInput,false,/^[1-9][0-9]{0,3}$/,1,3,false);
        }
    });

    const ajtoInput=document.getElementById("ajto");
    const errorAjtoP=document.getElementById('errorAjtoP');
    htmlEllenorrzo(ajtoInput,/^[0-9A-Za-z]{1,9}$/,1,10,false);
    ajtoInput.addEventListener("input",()=>{
        if (ajtoInput.value.length!=0) {
            EllenorizElsoResz(errorAjtoP,ajtoInput,false,/^[0-9A-Za-z]{1,4}$/,1,4,false);   
        }
    });
}
async function KepLapozashozSelectEsemeny(oldalvalaszto) {
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
    const h4KifizetettRendelesek=document.createElement('h4');
    h4KifizetettRendelesek.textContent="Kifizetett rendelések";
    tablazatTarolo.appendChild(h4KifizetettRendelesek);
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
        var b=false;
        data.forEach(element => {
            if (uj!=element.id_fizetes) {
                uj=element.id_fizetes;
                b=true;
            }else{
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

            const aTag=document.createElement('a');
            aTag.href='?oldal=Termek/Main/'+element.id_aru;
            aTag.textContent=element.nev_aru;

            const tbDNev=document.createElement('td');
            tbDNev.classList.add('nev');
            //tbDNev.textContent=element.nev_aru;

            tbDNev.appendChild(aTag);

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