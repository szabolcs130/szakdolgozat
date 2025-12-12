import { SzuroFelepit,FetchMeghiv,LapozashozSelectEsemeny,LapozashozElozoKovekezoEsemenyek,LapozashozLegorduloMenu,ElozoKovetkezoLapozoMegjelenitese } from './Lapozo.js';
import { EllenorizElsoResz,htmlEllenorrzo} from './Ellenorzo.js';
window.onload = async function() {
    const udvozloH1=document.getElementById("udvozloH1");
    if (document.getElementById("tablazatTarolo")) {
        SzuroAlapok();
        if (udvozloH1) {
            udvozloH1.remove();
        }
    }
    
    const rendelesTablazatTarolo=document.getElementById("rendelesTablazatTarolo");
    if (rendelesTablazatTarolo) {
        const h4KifizetettRendelesek=document.createElement('h1');
        h4KifizetettRendelesek.textContent="Kifizetett rendelések";
        const idSzuro=document.getElementById("idSzuro");
        const idLapozo=document.getElementById("idLapozo");
        const adminTartalom=document.getElementById("adminTartalom");
        adminTartalom.appendChild(h4KifizetettRendelesek);
        adminTartalom.appendChild(idSzuro);
        adminTartalom.appendChild(rendelesTablazatTarolo);
        adminTartalom.appendChild(idLapozo);
        if (udvozloH1) {
            udvozloH1.remove();
        }
        FelepitFizetesSzuresIdAlapjan();
        FelepitLapozo("idLapozo","idOldalValaszto","idElozo","idKovetkezo");
        FizetesLapozasFelepit();
    }
}

async function AruListaz(data) {
    const tablazatTarolo=document.getElementById("tablazatTarolo");
    tablazatTarolo.innerHTML="";
    
    if (data.length) {
        const liTagAruUj=document.createElement('li');
        liTagAruUj.id='liTagAruUj';

        const aTagAruUj=document.createElement('a');
        aTagAruUj.id='aTagAruUj';
        aTagAruUj.href='#';
        aTagAruUj.textContent="Új Áru";
        liTagAruUj.appendChild(aTagAruUj);

        liTagAruUj.addEventListener("click",()=>FormAru("","?oldal=Admin/AruUj","Hozzáad"));//AruUjForm()

        const aruTablazat=document.createElement('div');
        aruTablazat.id="aruTablazat";
        tablazatTarolo.appendChild(liTagAruUj);

        const aruTable=document.createElement('table');
        aruTable.id='tablazat';
            
        const thead=document.createElement('thead');
            
        const thR=document.createElement('tr');
        
        const thHId=document.createElement('th');
        thHId.textContent="Id";
        thR.appendChild(thHId);

        const thHNev=document.createElement('th');
        thHNev.textContent="Név";
        thR.appendChild(thHNev);

        const thHAr=document.createElement('th');
        thHAr.textContent="Ár";
        thR.appendChild(thHAr);

        const thHLeiras=document.createElement('th');
        thHLeiras.textContent="Leirás";
        thR.appendChild(thHLeiras);

        const thHMennyiseg=document.createElement('th');
        thHMennyiseg.textContent="Mennyiség";
        thR.appendChild(thHMennyiseg);

        const thHKep=document.createElement('th');
        thHKep.textContent="Kép";
        thR.appendChild(thHKep);

        const thHTorol=document.createElement('th');
        thHTorol.textContent="Töröl";
        thR.appendChild(thHTorol);

        const thHSzerkeszt=document.createElement('th');
        thHSzerkeszt.textContent="Szerkeszt";
        thR.appendChild(thHSzerkeszt);

        thead.appendChild(thR);
        aruTable.appendChild(thead);

        const tbody=document.createElement('tbody');

        document.getElementById("lapozo").style.display="flex";
        data.forEach(element => {
    
            const tbRId=document.createElement('tr');
            
            const tbDId=document.createElement('td');
            tbDId.classList.add('id_aru');
            tbDId.textContent=element.id_aru;

            const tbDNev=document.createElement('td');
            tbDNev.classList.add('nev');
            tbDNev.textContent=element.nev_aru;

            const tbDAr=document.createElement('td');
            tbDAr.classList.add('ar');
            tbDAr.textContent=element.ar;

            const tbDLeiras=document.createElement('td');
            tbDLeiras.classList.add('leiras');
            tbDLeiras.textContent=element.leiras;

            const tbDMennyiseg=document.createElement('td');
            tbDMennyiseg.classList.add('mennyiseg');
            tbDMennyiseg.textContent=element.mennyiseg;

            const tbDKep=document.createElement('td');
            tbDKep.classList.add('kep');
            tbDKep.textContent=element.kep;

            //Torol
            const tbDTorol=document.createElement('td');
            tbDTorol.classList.add('AruTorles');

            const liTagTorol=document.createElement('li');

            const aTagTorol=document.createElement('a');
            aTagTorol.href='?oldal=Admin/AruTorol/'+element.id_aru;
            aTagTorol.textContent="Töröl";

            aTagTorol.addEventListener("click",(e)=>{
                e.preventDefault();
                if (confirm("Biztosan torlod?")) {
                    window.location.href=aTagTorol.href;
                }
            });

            liTagTorol.appendChild(aTagTorol);
            tbDTorol.appendChild(liTagTorol);
            //TOROL V E G E

            //Szerkeszt
            const tbDSzerkeszt=document.createElement('td');
            tbDSzerkeszt.classList.add('AruSzerkeszt');

            const liTagSzerkeszt=document.createElement('li');

            const aTagSzerkeszt=document.createElement('a');
            aTagSzerkeszt.href='#';
            //aTagSzerkeszt.textContent="Szerkeszt";

            liTagSzerkeszt.textContent="Szerkeszt";
            tbDSzerkeszt.appendChild(liTagSzerkeszt);
            //Szerkeshzt V E G E
            tbRId.appendChild(tbDId);
            tbRId.appendChild(tbDNev);
            tbRId.appendChild(tbDAr);
            tbRId.appendChild(tbDLeiras);
            tbRId.appendChild(tbDMennyiseg);
            tbRId.appendChild(tbDKep);
            tbRId.appendChild(tbDTorol);
            tbRId.appendChild(tbDSzerkeszt);
            tbody.appendChild(tbRId);
        });
        aruTable.append(tbody);
        aruTablazat.appendChild(aruTable);
        tablazatTarolo.appendChild(aruTablazat);
        const adminTartalma=document.getElementById("adminTartalom");
        
        //adminTartalma.appendChild(tablazatTarolo);
        document.querySelectorAll("#tablazat tbody tr td:last-child").forEach(adatsor=>{
        adatsor.addEventListener("click",()=>FormAru(adatsor.parentElement,"?oldal=Admin/AruSzerkeszt","Szerkeszt"));
    })
    }else{
        const keresesEredmenyNincsh3=document.createElement("h3");
        keresesEredmenyNincsh3.textContent="Nincs talalat! ";
        tablazatTarolo.appendChild(keresesEredmenyNincsh3);
        document.getElementById("lapozo").style.display="none";
    }
    window.scrollTo(0,0);
    ElozoKovetkezoLapozoMegjelenitese("elozo","kovetkezo","oldalValaszto");
}
async function SzuroAlapok() {
    const adminTartalom=document.getElementById("adminTartalom");
    if (adminTartalom) {
        const szuroTarolo=document.createElement('div');
        szuroTarolo.id="szuroTarolo";
        
        const lapozo=document.createElement('div');
        lapozo.id="lapozo";
        
        const oldalValaszto=document.createElement('select');
        oldalValaszto.id="oldalValaszto";
        
        const elozo=document.createElement('li');
        elozo.id="elozo";
        elozo.textContent="Előző";

        const kovetkezo=document.createElement('li');
        kovetkezo.id="kovetkezo";
        kovetkezo.textContent="Következő"

        lapozo.appendChild(elozo);
        lapozo.appendChild(oldalValaszto);
        lapozo.appendChild(kovetkezo);
        const tablazatTarolo=document.getElementById("tablazatTarolo");
        adminTartalom.appendChild(szuroTarolo);
        adminTartalom.appendChild(tablazatTarolo);
        adminTartalom.appendChild(lapozo);
    }
        const data1=await FetchMeghiv("?oldal=Apitermekek/lekerdezAruMaxAr");
        SzuroFelepit("?oldal=Apitermekek/lekerdezAruSzures",data1,(eredmeny)=>{
            AruListaz(eredmeny);
        });
        LapozashozElozoKovekezoEsemenyek("elozo","kovetkezo","oldalValaszto");
        const a=await LapozashozSelectEsemeny("?oldal=Apitermekek/lekerdezAruSzures",(eredmeny)=>{
            AruListaz(eredmeny)
        });
        const data=await FetchMeghiv("?oldal=Apitermekek/lekerdezAruSzures",null,true);

        LapozashozLegorduloMenu(data,"oldalValaszto");
}
function VisszaAruListahoz() {
    

    const fizetettFormTarolo=document.getElementById("fizetettFormTarolo");
    if (fizetettFormTarolo) {
        fizetettFormTarolo.remove();
    }

    const formTarolo=document.getElementById("formTarolo");
    if (formTarolo) {
        formTarolo.remove();
    }
    const kepTarolo=document.getElementById("kepTarolo");
    if (kepTarolo) {
        kepTarolo.remove();
    }
    const kepLapozo=document.getElementById("kepLapozo");
    if (kepLapozo) {
        kepLapozo.remove();
    }
    const kepSzuroTarolo=document.getElementById("kepSzuroTarolo");
    if (kepSzuroTarolo) {
        kepSzuroTarolo.remove();
    }
    const tablazatTarolo=document.getElementById("tablazatTarolo");
    if (tablazatTarolo) {
        tablazatTarolo.style.display="flex";
    }

    const szuroatTarolo=document.getElementById("szuroTarolo");
    if (szuroatTarolo) {
        szuroatTarolo.style.display="flex";
    }

    const lapozo=document.getElementById("lapozo");
    if (lapozo) {
        lapozo.style.display="flex";
    }
    
    const rendelesTablazatTarolo=document.getElementById("rendelesTablazatTarolo");
    if (rendelesTablazatTarolo) {
        rendelesTablazatTarolo.style.display="flex";
    }

    const idSzuroat=document.getElementById("idSzuro");
    if (idSzuroat) {
        idSzuroat.style.display="flex";
    }

    const idLapozo=document.getElementById("idLapozo");
    if (idLapozo) {
        idLapozo.style.display="flex";
    }

}

async function FormAru(params,actionParam,gombFelirat) {
    const tablazatTarolo=document.getElementById("tablazatTarolo");
    tablazatTarolo.style.display="none";

    const szuroatTarolo=document.getElementById("szuroTarolo");
    szuroatTarolo.style.display="none";

    const lapozo=document.getElementById("lapozo");
    lapozo.style.display="none";

    const liTagVissza=document.createElement('li');

    const aTagVissza=document.createElement('a');
    aTagVissza.href='#';
    aTagVissza.textContent="Vissza";
    liTagVissza.appendChild(aTagVissza);

    aTagVissza.addEventListener("click",()=>{
        if (confirm("Biztos kilepsz?")) {
            VisszaAruListahoz()
        }
    });

    const formTarolo=document.createElement('div');
    formTarolo.id="formTarolo";

    formTarolo.appendChild(liTagVissza);

    const form=document.createElement('form');
    form.id="aruForm";
    form.method="post";
    form.action=actionParam;
//id
    const aruIdInput=document.createElement("input");
    aruIdInput.type="hidden";
    aruIdInput.name="idaru";
    aruIdInput.value=params?.cells?.[0]?.textContent || "1";
    //form.appendChild(aruIdInput);

    const errorAruId=document.createElement("p");
    errorAruId.style.display="none";
    errorAruId.id="errorAruId";
    const ErrorDivAruId=document.createElement("div");
    ErrorDivAruId.classList.add("ErrorDiv");

    const aruIdMin=1;
    const aruIdMax=8;
    const aruIdPattern=/^[1-9][0-9]{0,7}$/;
    htmlEllenorrzo(aruIdInput,aruIdPattern,aruIdMin,aruIdMax,true);

    ErrorDivAruId.appendChild(aruIdInput);
    ErrorDivAruId.appendChild(errorAruId);
    form.appendChild(ErrorDivAruId);
//id v e g e

//nev
    const aruNevInput=document.createElement("input");
    aruNevInput.type="text";
    aruNevInput.name="nev";
    aruNevInput.value=params?.cells?.[1]?.textContent || "";
    aruNevInput.placeholder="Aru neve";
    //form.appendChild(aruNevInput);

    const errorAruNev=document.createElement("p");
    errorAruNev.style.display="none";
    errorAruNev.id="errorAruNev";
    const ErrorDivAruNev=document.createElement("div");
    ErrorDivAruNev.classList.add("ErrorDiv");

    const aruNevMin=2;
    const aruNevMax=20;
    const aruNevPattern=/^[A-Za-z0-9áéíóöőúüűÁÉÍÓÖŐÚÜŰ ]+$/;
    htmlEllenorrzo(aruNevInput,aruNevPattern,aruNevMin,aruNevMax,true);

    ErrorDivAruNev.appendChild(aruNevInput);
    ErrorDivAruNev.appendChild(errorAruNev);
    form.appendChild(ErrorDivAruNev);
//nev v e g e

//ar
    const aruArInput=document.createElement("input");
    aruArInput.type="number";
    aruArInput.name="ar";
    aruArInput.value=params?.cells?.[2]?.textContent || "";
    aruArInput.placeholder="Aru ara";
    //form.appendChild(aruArInput);

    const errorAruAr=document.createElement("p");
    errorAruAr.style.display="none";
    errorAruAr.id="errorAruAr";
    const ErrorDivAruAr=document.createElement("div");
    ErrorDivAruAr.classList.add("ErrorDiv");

    const aruArMin=1;
    const aruArMax=8;
    const aruArPattern=/^[1-9][0-9]{0,7}$/;
    htmlEllenorrzo(aruArInput,aruArPattern,aruArMin,aruArMax,true);

    ErrorDivAruAr.appendChild(aruArInput);
    ErrorDivAruAr.appendChild(errorAruAr);
    form.appendChild(ErrorDivAruAr);
//ar v e g e

//leiras
    const aruLeirasInput=document.createElement("textarea");
    aruLeirasInput.name="leiras";
    aruLeirasInput.value=params?.cells?.[3]?.textContent || "";
    aruLeirasInput.placeholder="Aru leiras";

    const errorAruLeiras=document.createElement("p");
    errorAruLeiras.style.display="none";
    errorAruLeiras.id="errorAruLeiras";
    const ErrorDivAruLeiras=document.createElement("div");
    ErrorDivAruLeiras.classList.add("ErrorDiv");

    const aruLeirasMin=5;
    const aruLeirasMax=254;
    const aruLeirasPattern=/^[A-Za-z0-9áéíóöőúüűÁÉÍÓÖŐÚÜŰ .,!?;:]+$/;
    htmlEllenorrzo(aruLeirasInput,aruLeirasPattern,aruLeirasMin,aruLeirasMax,true);

    ErrorDivAruLeiras.appendChild(aruLeirasInput);
    ErrorDivAruLeiras.appendChild(errorAruLeiras);
    form.appendChild(ErrorDivAruLeiras);
//leiras v e g e

//mennyiseg
    const aruMennyisegInput=document.createElement("input");
    aruMennyisegInput.type="number";
    aruMennyisegInput.name="mennyiseg";
    aruMennyisegInput.value=params?.cells?.[4]?.textContent || "";
    aruMennyisegInput.placeholder="Aru mennyisege";

    const errorAruMennyiseg=document.createElement("p");
    errorAruMennyiseg.style.display="none";
    errorAruMennyiseg.id="errorAruMennyiseg";
    const ErrorDivAruMennyiseg=document.createElement("div");
    ErrorDivAruMennyiseg.classList.add("ErrorDiv");

    const aruMennyisegMin=1;
    const aruMennyisegMax=8;
    const aruMennyisegPattern=/^[1-9][0-9]{0,7}$/;
    htmlEllenorrzo(aruMennyisegInput,aruMennyisegPattern,aruMennyisegMin,aruMennyisegMax,true);

    ErrorDivAruMennyiseg.appendChild(aruMennyisegInput);
    ErrorDivAruMennyiseg.appendChild(errorAruMennyiseg);
    form.appendChild(ErrorDivAruMennyiseg);
//mennyiseg v e g e

//kep
    const aruKepInput=document.createElement("input");
    aruKepInput.type="text";
    aruKepInput.name="kep";
    aruKepInput.id="kep";
    aruKepInput.value=params?.cells?.[5]?.textContent || "";
    aruKepInput.placeholder="Aru kep url";

    const errorAruKep=document.createElement("p");
    errorAruKep.style.display="none";
    errorAruKep.id="errorAruKep";
    const ErrorDivAruKep=document.createElement("div");
    ErrorDivAruKep.classList.add("ErrorDiv");

    const aruKepMin=1;
    const aruKepMax=254;
    const aruKepPattern=/^[A-Za-z0-9]+$/;
    htmlEllenorrzo(aruKepInput,aruKepPattern,aruKepMin,aruKepMax,true);

    ErrorDivAruKep.appendChild(aruKepInput);
    ErrorDivAruKep.appendChild(errorAruKep);
    form.appendChild(ErrorDivAruKep);
//kep v e g e
    const aruBekuldGomb=document.createElement('button');
    aruBekuldGomb.type="submit";
    aruBekuldGomb.textContent=gombFelirat || "Oke" ;
    aruBekuldGomb.addEventListener("click",(e)=>{
        var aruIdReturn=EllenorizElsoResz(errorAruId,aruIdInput,false,aruIdPattern,aruIdMin,aruIdMax,true);
        var aruNevReturn=EllenorizElsoResz(errorAruNev,aruNevInput,false,aruNevPattern,aruNevMin,aruNevMax,true);
        var aruArReturn=EllenorizElsoResz(errorAruAr,aruArInput,false,aruArPattern,aruArMin,aruArMax,true);
        var aruLeirasReturn=EllenorizElsoResz(errorAruLeiras,aruLeirasInput,false,aruLeirasPattern,aruLeirasMin,aruLeirasMax,true);
        var aruMennyisegReturn=EllenorizElsoResz(errorAruMennyiseg,aruMennyisegInput,false,aruMennyisegPattern,aruMennyisegMin,aruMennyisegMax,true);
        var aruKepReturn=EllenorizElsoResz(errorAruKep,aruKepInput,false,aruKepPattern,aruKepMin,aruKepMax,true);
        if (!aruIdReturn || !aruNevReturn || !aruArReturn || !aruLeirasReturn || !aruMennyisegReturn || !aruKepReturn) {
            e.preventDefault();
        }else{
            if (!confirm("Biztosan "+(gombFelirat ? gombFelirat+"?" :"?"))) {
                e.preventDefault();
            }
        }
    });
    aruIdInput.addEventListener("input",()=>{
            EllenorizElsoResz(errorAruId,aruIdInput,false,aruIdPattern,aruIdMin,aruIdMax,false);
    });
    aruNevInput.addEventListener("input",()=>{
            EllenorizElsoResz(errorAruNev,aruNevInput,false,aruNevPattern,aruNevMin,aruNevMax,false);
    });
    aruArInput.addEventListener("input",()=>{
        EllenorizElsoResz(errorAruAr,aruArInput,false,aruArPattern,aruArMin,aruArMax,false);
    });
    aruLeirasInput.addEventListener("input",()=>{
            EllenorizElsoResz(errorAruLeiras,aruLeirasInput,false,aruLeirasPattern,aruLeirasMin,aruLeirasMax,false);
    });
    aruMennyisegInput.addEventListener("input",()=>{
            EllenorizElsoResz(errorAruMennyiseg,aruMennyisegInput,false,aruMennyisegPattern,aruMennyisegMin,aruMennyisegMax,false);
    });
    aruKepInput.addEventListener("input",()=>{
            EllenorizElsoResz(errorAruKep,aruKepInput,false,aruKepPattern,aruKepMin,aruKepMax,false);
    });
    form.appendChild(aruBekuldGomb);
    formTarolo.appendChild(form);
    
    const adminTartalma=document.getElementById("adminTartalom");
    adminTartalma.appendChild(formTarolo);
    const kepSzuroTarolo=document.createElement('div');
    kepSzuroTarolo.id="kepSzuroTarolo";
    const kepTarolo=document.createElement('div');
    kepTarolo.id="kepTarolo";
    const kepLapozo=document.createElement('div');
    kepLapozo.id="kepLapozo";
    adminTartalma.appendChild(kepSzuroTarolo);
    adminTartalma.appendChild(kepTarolo);
    adminTartalma.appendChild(kepLapozo);
    FelepitKepSzuresNevAlapjan()
    FelepitLapozo("kepLapozo","kepOldalValaszto","kepElozo","kepKovetkezo");
    KepLapozasFelepit();
}
function FelepitKepSzuresNevAlapjan() {
    const kepSzuroTarolo=document.getElementById("kepSzuroTarolo");
    const minSzoveg=0;
    const maxSzoveg=50;
    const patternSzoveg=/^[A-Za-z0-9áéíóöőúüűÁÉÍÓÖŐÚÜŰ ]+$/;
    const nevKeresInput=document.createElement("input");
    nevKeresInput.type="text";
    nevKeresInput.placeholder="Kulcsszó";
    nevKeresInput.id="nevKepKeres";
    htmlEllenorrzo(nevKeresInput,patternSzoveg,minSzoveg,maxSzoveg,true);
    nevKeresInput.addEventListener("input",async function() {
        EllenorizElsoResz(errorP,nevKeresInput,true,patternSzoveg,minSzoveg,maxSzoveg,true);
    });
    const errorP=document.createElement("p");
    errorP.id="errorKepP";
    errorP.style.display="none";
    const nevErrorDiv=document.createElement("div");
    nevErrorDiv.id="nevKepErrorDiv";
    nevErrorDiv.appendChild(nevKeresInput);
    nevErrorDiv.appendChild(errorP);

    const szuresBekuldGomb=document.createElement('button');
    szuresBekuldGomb.type="submit";
    szuresBekuldGomb.textContent="Keres";
    szuresBekuldGomb.addEventListener("click",async function(){
        var nevResult=EllenorizElsoResz(errorP,nevKeresInput,true,patternSzoveg,minSzoveg,maxSzoveg,true);
        if (nevResult) {
            const response= await fetch("?oldal=Apiadmin/Kepek&oldalSzam=0&nev="+nevKeresInput.value);
            const data = await response.json();
            KepekKilistaz(data);
            const response2= await fetch("?oldal=Apiadmin/KepekOsszes&nev="+nevKeresInput.value);
            const data2 = await response2.json();
            LapozashozLegorduloMenu(data2,"kepOldalValaszto");
        }
    });

    kepSzuroTarolo.appendChild(nevErrorDiv);
    kepSzuroTarolo.appendChild(szuresBekuldGomb);
}
function KepekKilistaz(data) {
    const kepTarolo=document.getElementById("kepTarolo");
    kepTarolo.innerHTML="";
    if (data.length) {
        data.forEach(element=>{
            const kepek=document.createElement('div');
            kepek.classList.add("kepek");
            const aru_kep=document.createElement('img');
            aru_kep.classList.add('aru_kep');
            const kepUrl=new URL('../image/'+element, import.meta.url).href;
            aru_kep.src=kepUrl;
            aru_kep.alt="Nem sikerult a kep betoltes!";
            const aru_nev=document.createElement('p');
            aru_nev.classList.add('aru_nev');
            aru_nev.textContent=element.split(".png")[0];
            kepek.appendChild(aru_kep);
            kepek.appendChild(aru_nev);
            kepek.addEventListener("click",()=>{
                document.getElementById("kep").value=kepek.querySelector("p").textContent;
            });
            kepTarolo.appendChild(kepek);
        });
    }
    ElozoKovetkezoLapozoMegjelenitese("kepElozo","kepKovetkezo","kepOldalValaszto");
}
function FelepitLapozo(lapozoTarolo,oldalValaszto,elozo,kovetkezo){
        
    const kepLapozo=document.getElementById(lapozoTarolo);
        
    const kepOldalValaszto=document.createElement('select');
    kepOldalValaszto.id=oldalValaszto;
        
    const kepElozo=document.createElement('li');
    kepElozo.id=elozo;
    kepElozo.textContent="Előző";

    const kepKovetkezo=document.createElement('li');
    kepKovetkezo.id=kovetkezo;
    kepKovetkezo.textContent="Következő"

    kepLapozo.appendChild(kepElozo);
    kepLapozo.appendChild(kepOldalValaszto);
    kepLapozo.appendChild(kepKovetkezo);
}
async function KepLapozasFelepit() {
    LapozashozElozoKovekezoEsemenyek("kepElozo","kepKovetkezo","kepOldalValaszto");
    KepLapozashozSelectEsemeny("kepOldalValaszto");
    const response= await fetch("?oldal=Apiadmin/KepekOsszes");
    const data = await response.json();
    LapozashozLegorduloMenu(data,"kepOldalValaszto");
}
async function KepLapozashozSelectEsemeny(oldalvalaszto) {
    const oldalValaszto=document.getElementById(oldalvalaszto);
    oldalValaszto.addEventListener("change",async function(e){
        const nevKepKeres=document.getElementById("nevKepKeres");
        var oldalValasztoReturn=EllenorizElsoResz(false,oldalValaszto,true,/^[0-9]{1,8}$/,1,8,true);
        var nevKepKeresResult=EllenorizElsoResz(false,nevKepKeres,true,/^[A-Za-z0-9]+$/,0,50,true);
        if (oldalValasztoReturn && nevKepKeresResult) {
            const response= await fetch("?oldal=Apiadmin/Kepek&oldalSzam="+oldalValaszto.value+"&nev="+nevKepKeres.value);
            const data = await response.json();
            KepekKilistaz(data);
        }
    });
}
async function FizetesLapozasFelepit() {
    LapozashozElozoKovekezoEsemenyek("idElozo","idKovetkezo","idOldalValaszto",);
    FizetesLapozashozSelectEsemeny("idOldalValaszto");
    const response= await fetch("?oldal=Apiadmin/KepekOsszes");
    const data = await response.json();
    LapozashozLegorduloMenu(data,"idOldalValaszto");
}
async function FizetesLapozashozSelectEsemeny(oldalvalaszto) {
    const oldalValaszto=document.getElementById(oldalvalaszto);
    oldalValaszto.addEventListener("change",async function(e){
        const keresIdInput=document.getElementById("keresIdInput");
        var oldalValasztoReturn=EllenorizElsoResz(false,oldalValaszto,true,/^[0-9]{1,8}$/,1,8,true);
        var keresIdInputKeresResult=EllenorizElsoResz(false,keresIdInput,true,/^[1-9][0-9]{0,7}$/,0,8,true);
        if (oldalValasztoReturn && keresIdInputKeresResult) {
            const response= await fetch("?oldal=Apiadmin/lekerdezFizetesSzures&oldalSzam="+oldalValaszto.value+"&fizetesId="+keresIdInput.value);
            const data = await response.json();
            FizetesekKilistaz(data);
        }
    });
}
function FelepitFizetesSzuresIdAlapjan() {

    const idSzuroTarolo=document.getElementById("idSzuro");

    const keresIdInput=document.createElement("input");
    keresIdInput.type="number";
    keresIdInput.id="keresIdInput";
    keresIdInput.placeholder="Fizetés id";
    const idMin=0;
    const idMax=8;
    const idPattern=/^[1-9][0-9]{0,7}$/;
    
    htmlEllenorrzo(keresIdInput,idPattern,idMin,idMax,false);
    keresIdInput.addEventListener("input",()=>{
        console.log(keresIdInput.value);
            EllenorizElsoResz(errorP,keresIdInput,true,idPattern,idMin,idMax,false);            
    });
    const errorP=document.createElement("p");
    errorP.id="errorIdP";
    errorP.style.display="none";
    const idErrorDiv=document.createElement("div");
    idErrorDiv.id="idErrorDiv";
    idErrorDiv.appendChild(keresIdInput);
    idErrorDiv.appendChild(errorP);

    const szuresBekuldGomb=document.createElement('button');
    szuresBekuldGomb.id="IdFizetesszuresBekuldGomb";
    szuresBekuldGomb.type="submit";
    szuresBekuldGomb.textContent="Keres";
    szuresBekuldGomb.addEventListener("click",async function(){
        var idResult=EllenorizElsoResz(errorP,keresIdInput,true,idPattern,idMin,idMax,true);
        if (idResult) {
            const response= await fetch("?oldal=Apiadmin/lekerdezFizetesSzures&oldalSzam=0&fizetesId="+keresIdInput.value);
            const data = await response.json();
            FizetesekKilistaz(data);
            const response2= await fetch("?oldal=Apiadmin/lekerdezFizetesSzuresOsszes&fizetesId="+keresIdInput.value);
            const data2 = await response2.json();
            LapozashozLegorduloMenu(data2,"idOldalValaszto");
        }
    });

    idSzuroTarolo.appendChild(idErrorDiv);
    idSzuroTarolo.appendChild(szuresBekuldGomb);
}
function FizetesekKilistaz(data) {
    const tablazatTarolo=document.getElementById("rendelesTablazatTarolo");
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

        const thHRendeloNev=document.createElement('th');
        thHRendeloNev.textContent="Rendelő Név";
        thR.appendChild(thHRendeloNev);

        const thHIranyitoszam=document.createElement('th');
        thHIranyitoszam.textContent="Irányítószám";
        thR.appendChild(thHIranyitoszam);
        
        const thHVaros=document.createElement('th');
        thHVaros.textContent="Város";
        thR.appendChild(thHVaros);

        const thHUtca=document.createElement('th');
        thHUtca.textContent="Utca";
        thR.appendChild(thHUtca);

        const thHHazSzam=document.createElement('th');
        thHHazSzam.textContent="Házszám";
        thR.appendChild(thHHazSzam);

        const thHEmelet=document.createElement('th');
        thHEmelet.textContent="Emelet";
        thR.appendChild(thHEmelet);

        const thHAjto=document.createElement('th');
        thHAjto.textContent="Ajtó";
        thR.appendChild(thHAjto);

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

        const thHRendelesAllapot=document.createElement('th');
        thHRendelesAllapot.textContent="Állapot";
        thR.appendChild(thHRendelesAllapot);

        const thHTeljesitDatum=document.createElement('th');
        thHTeljesitDatum.textContent="Teljesítés dátuma";
        thR.appendChild(thHTeljesitDatum);

        const thHRendelesId=document.createElement('th');
        thHRendelesId.textContent="Rendelés id";
        thR.appendChild(thHRendelesId);

        const thHSzerkeszt=document.createElement('th');
        thHSzerkeszt.textContent="Szerkeszt";
        thR.appendChild(thHSzerkeszt);

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
            //if (b) {
                tbDId.textContent=element.id_fizetes;
            //}

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

            tbDNev.appendChild(aTag);

            const tbDRendeloNev=document.createElement('td');
            tbDRendeloNev.classList.add('rendeloNev');
            tbDRendeloNev.textContent=element.nev_szemely;

            const tbDAr=document.createElement('td');
            tbDAr.classList.add('ar');
            tbDAr.textContent=element.ar;

            const tbDMe=document.createElement('td');
            tbDMe.classList.add('me');
            tbDMe.textContent=element.me;
            
            const tbDIranyitoszam=document.createElement('td');
            tbDIranyitoszam.classList.add('iranyitoszam');
            if (b) {
                tbDIranyitoszam.textContent=element.iranyitoszam;
            }

            const tbDVaros=document.createElement('td');
            tbDVaros.classList.add('varos');
            if (b) {
                tbDVaros.textContent=element.varos;
            }

            const tbDUtca=document.createElement('td');
            tbDUtca.classList.add('utca');
            if (b) {
                tbDUtca.textContent=element.utca;
            }

            const tbDHazszam=document.createElement('td');
            tbDHazszam.classList.add('hazszam');
            if (b) {
                tbDHazszam.textContent=element.hazszam;
            }

            const tbDEmelet=document.createElement('td');
            tbDEmelet.classList.add('emelet');
            if (b) {
                if (element.ajto.length!=0) {
                    tbDEmelet.textContent=element.emelet;
                }else{
                    tbDEmelet.textContent="-";
                }
            }

            const tbDAjto=document.createElement('td');
            tbDAjto.classList.add('ajto');
            if (b) {
                if (element.ajto.length!=0) {
                    tbDAjto.textContent=element.ajto;
                }else{
                    tbDAjto.textContent="-";
                }
            }

            const tbDEgyben=document.createElement('td');
            tbDEgyben.classList.add('egyben');
            tbDEgyben.textContent=((parseInt(element.me)*parseInt(element.ar)));
            
            const tbDOsszeg=document.createElement('td');
            tbDOsszeg.classList.add('osszeg');
            if (b) {
                tbDOsszeg.textContent=element.osszeg;
            }

            const tbDRendelesAllapot=document.createElement('td');
            tbDRendelesAllapot.classList.add('rendelesAllapot');
            if (b) {
                tbDRendelesAllapot.textContent=element.rendelesallapot;
            }

            const tbDTeljesitDatum=document.createElement('td');
            tbDTeljesitDatum.classList.add('teljesitesDatuma');
            if (b) {
                tbDTeljesitDatum.textContent=element.teljesitesdatuma;
            }
            const tbDRendelesId=document.createElement('td');
            tbDRendelesId.classList.add('RendelesId');
            if (b) {
                tbDRendelesId.textContent=element.id_rendeles;
            }
            const tbDSzerkeszt=document.createElement('td');
            tbDSzerkeszt.classList.add('teljesitesDatuma');
            if (b) {
                tbDSzerkeszt.textContent="Szerkeszt";
            }
            
            tbRId.appendChild(tbDId);
            tbRId.appendChild(tbDDatum);
            tbRId.appendChild(tbDNev);
            tbRId.appendChild(tbDRendeloNev);
            tbRId.appendChild(tbDIranyitoszam);
            tbRId.appendChild(tbDVaros);
            tbRId.appendChild(tbDUtca);
            tbRId.appendChild(tbDHazszam);
            tbRId.appendChild(tbDEmelet);
            tbRId.appendChild(tbDAjto);
            tbRId.appendChild(tbDAr);
            tbRId.appendChild(tbDMe);
            tbRId.appendChild(tbDEgyben);
            tbRId.appendChild(tbDOsszeg);
            tbRId.appendChild(tbDRendelesAllapot);
            tbRId.appendChild(tbDTeljesitDatum);
            tbRId.appendChild(tbDRendelesId);
            tbRId.appendChild(tbDSzerkeszt);
            tbody.appendChild(tbRId);
        });
        aruTable.append(tbody);
        aruTablazat.appendChild(aruTable);
        tablazatTarolo.appendChild(aruTablazat);
        document.querySelectorAll("#tablazat tbody tr td:last-child").forEach(adatsor=>{
        adatsor.addEventListener("click",()=>{FormFizetettrendeles(adatsor.parentElement,"?oldal=Admin/RendelesSzerkeszt");});//FormAru(adatsor.parentElement,"?oldal=Admin/AruSzerkeszt","Szerkeszt"
        });
       
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
    ElozoKovetkezoLapozoMegjelenitese("idElozo","idKovetkezo","idOldalValaszto");
}

async function FormFizetettrendeles(params,actionParam,gombFelirat) {

    const response= await fetch("?oldal=Apiadmin/lekerdezFizetesRendelesAllpotEnum");
    const data = await response.json();
    
    const tablazatTarolo=document.getElementById("rendelesTablazatTarolo");
    tablazatTarolo.style.display="none";

    const szuroatTarolo=document.getElementById("idSzuro");
    szuroatTarolo.style.display="none";

    const lapozo=document.getElementById("idLapozo");
    lapozo.style.display="none";

    const liTagVissza=document.createElement('li');

    const aTagVissza=document.createElement('a');
    aTagVissza.href='#';
    aTagVissza.textContent="Vissza";
    liTagVissza.appendChild(aTagVissza);

    aTagVissza.addEventListener("click",()=>{
        if (confirm("Biztos kilepsz?")) {
            VisszaAruListahoz()
        }
    });

    const formTarolo=document.createElement('div');
    formTarolo.id="fizetettFormTarolo";

    formTarolo.appendChild(liTagVissza);

    const form=document.createElement('form');
    form.id="FizetettForm";
    form.method="post";
    form.action=actionParam;
//id
    const fizetettRendelesIdInput=document.createElement("input");
    fizetettRendelesIdInput.type="hidden";
    fizetettRendelesIdInput.name="fizetettRendelesIdInput";
    fizetettRendelesIdInput.id="fizetettRendelesIdInput";
    fizetettRendelesIdInput.value=params?.cells?.[9]?.textContent;
    fizetettRendelesIdInput.setAttribute("readonly",true);

    const erroridfizetett=document.createElement("p");
    erroridfizetett.style.display="none";
    erroridfizetett.id="erroridfizetett";
    const ErrorDivAruId=document.createElement("div");
    ErrorDivAruId.classList.add("ErrorDiv");

    const aruIdMin=1;
    const aruIdMax=8;
    const aruIdPattern=/^[1-9][0-9]{0,7}$/;
    htmlEllenorrzo(fizetettRendelesIdInput,aruIdPattern,aruIdMin,aruIdMax,true);

    ErrorDivAruId.appendChild(fizetettRendelesIdInput);
    ErrorDivAruId.appendChild(erroridfizetett);
    form.appendChild(ErrorDivAruId);
//id v e g e

//datum
    const fizetettdatumInput=document.createElement("input");
    fizetettdatumInput.type="datetime";
    fizetettdatumInput.name="fizetettdatumInput";
    fizetettdatumInput.id="fizetettdatumInput";
    fizetettdatumInput.value=params?.cells?.[1]?.textContent || "";
    fizetettdatumInput.setAttribute("readonly",true);
    form.appendChild(fizetettdatumInput);
//datum v e g e

//nev
    const fizetettNevInput=document.createElement("input");
    fizetettNevInput.type="text";
    fizetettNevInput.name="fizetettNevInput";
    fizetettNevInput.id="fizetettNevInput";
    fizetettNevInput.value=params?.cells?.[2]?.textContent || "";
    fizetettNevInput.setAttribute("readonly",true);

    form.appendChild(fizetettNevInput);
//nev v e g e

//ar
    const fizetettArInput=document.createElement("input");
    fizetettArInput.name="fizetettArInput";
    fizetettArInput.id="fizetettArInput";
    fizetettArInput.type="number";
    fizetettArInput.value=params?.cells?.[3]?.textContent || "0";
    fizetettArInput.setAttribute("readonly",true);

    form.appendChild(fizetettArInput);
//ar v e g e

//mennyiseg
    const fizetettMennyisegInput=document.createElement("input");
    fizetettMennyisegInput.type="number";
    fizetettMennyisegInput.name="fizetettMennyisegInput";
    fizetettMennyisegInput.id="fizetettMennyisegInput";
    fizetettMennyisegInput.value=params?.cells?.[4]?.textContent || "";
    fizetettMennyisegInput.setAttribute("readonly",true);

    form.appendChild(fizetettMennyisegInput);
//mennyiseg v e g e

//ar*mennyiseg
    const fizetettArMennyisegOsszesenInput=document.createElement("input");
    fizetettArMennyisegOsszesenInput.type="number";
    fizetettArMennyisegOsszesenInput.name="fizetettArMennyisegOsszesenInput";
    fizetettArMennyisegOsszesenInput.id="fizetettArMennyisegOsszesenInput";
    fizetettArMennyisegOsszesenInput.value=params?.cells?.[5]?.textContent || "";
    fizetettArMennyisegOsszesenInput.setAttribute("readonly",true);

    form.appendChild(fizetettArMennyisegOsszesenInput);
//ar*mennyiseg v e g e
//osszes
    const fizetettosszesInput=document.createElement("input");
    fizetettosszesInput.type="number";
    fizetettosszesInput.name="fizetettosszesInput";
    fizetettosszesInput.id="fizetettosszesInput";
    fizetettosszesInput.value=params?.cells?.[6]?.textContent || "";
    fizetettosszesInput.setAttribute("readonly",true);


    form.appendChild(fizetettosszesInput);
//osszes v e g e
//allapot
    const fizetettAllapotInput=document.createElement("select");
    data.forEach(element => {
        const fizetettAllapotInputOption=document.createElement("option");
        fizetettAllapotInputOption.value=element;
        fizetettAllapotInputOption.textContent=element;
        fizetettAllapotInput.appendChild(fizetettAllapotInputOption);
        if (element==params?.cells?.[7]?.textContent) {
            fizetettAllapotInputOption.selected=true;
        }
    });
    fizetettAllapotInput.name="fizetettAllapotInput";
    fizetettAllapotInput.id="fizetettAllapotInput";

    form.appendChild(fizetettAllapotInput);
//allapot v e g e

//datumteljesit

    const fizetettTeljesitesDatumInputElso=document.createElement("input");
    fizetettTeljesitesDatumInputElso.type="hidden";
    fizetettTeljesitesDatumInputElso.name="fizetettTeljesitesDatumInput";
    fizetettTeljesitesDatumInputElso.id="fizetettTeljesitesDatumInput";
    fizetettTeljesitesDatumInputElso.value=0;
    fizetettTeljesitesDatumInputElso.setAttribute("readonly",true);

    form.appendChild(fizetettTeljesitesDatumInputElso);

    const fizetettTeljesitesDatumInput=document.createElement("input");

    fizetettTeljesitesDatumInput.type="checkbox";
    fizetettTeljesitesDatumInput.name="fizetettTeljesitesDatumInput";
    fizetettTeljesitesDatumInput.id="fizetettTeljesitesDatumInput";
    fizetettTeljesitesDatumInput.checked = !!(params?.cells?.[8]?.textContent.trim());

    form.appendChild(fizetettTeljesitesDatumInput);
//datumteljesit1 v e g e
    const aruBekuldGomb=document.createElement('button');
    aruBekuldGomb.type="submit";
    aruBekuldGomb.textContent=gombFelirat || "Oke" ;
    aruBekuldGomb.addEventListener("click",(e)=>{
    const fizetettRendelesIdInputReturn=EllenorizElsoResz(erroridfizetett,fizetettRendelesIdInput,false,aruIdPattern,aruIdMin,aruIdMax,true);
    const minSzoveg=8;
    const maxSzoveg=23;
    const patternSzoveg=/^[A-Za-záéíóöőúüűÁÉÍÓÖŐÚÜŰ ]+$/;
    const egyezik =EllenorizElsoResz(false,fizetettAllapotInput,false,patternSzoveg,minSzoveg,maxSzoveg,true);
    if (!fizetettRendelesIdInputReturn || !egyezik) {
            e.preventDefault();
        }else{
            if (!confirm("Biztosan szerkeszted?")) {
                e.preventDefault();
            }
        }
    });
    fizetettRendelesIdInput.addEventListener("input",()=>{
            EllenorizElsoResz(erroridfizetett,fizetettRendelesIdInput,false,aruIdPattern,aruIdMin,aruIdMax,false);
    });
    form.appendChild(aruBekuldGomb);
    formTarolo.appendChild(form);
     const adminTartalma=document.getElementById("adminTartalom");
    adminTartalma.appendChild(formTarolo);
    const kepSzuroTarolo=document.createElement('div');
    kepSzuroTarolo.id="kepSzuroTarolo";
    const kepTarolo=document.createElement('div');
    kepTarolo.id="kepTarolo";
    const kepLapozo=document.createElement('div');
    kepLapozo.id="kepLapozo";
    adminTartalma.appendChild(kepSzuroTarolo);
    adminTartalma.appendChild(kepTarolo);
    adminTartalma.appendChild(kepLapozo);
}