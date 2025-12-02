import { SzuroFelepit,FetchMeghiv,LapozashozSelectEsemeny,LapozashozElozoKovekezoEsemenyek,LapozashozLegorduloMenu,ElozoKovetkezoLapozoMegjelenitese } from './Lapozo.js';
import { EllenorizElsoResz} from './Ellenorzo.js';
window.onload = async function() {
    if (document.getElementById("tablazatTarolo")) {
        SzuroAlapok();
    }
}

async function AruListaz(data) {
    const tablazatTarolo=document.getElementById("tablazatTarolo");
    tablazatTarolo.innerHTML="";
    
    if (data.length) {
        const liTagAruUj=document.createElement('li');

        const aTagAruUj=document.createElement('a');
        aTagAruUj.href='#';
        aTagAruUj.textContent="Uj Aru";
        liTagAruUj.appendChild(aTagAruUj);

        liTagAruUj.addEventListener("click",()=>FormAru("","?oldal=Admin/AruUj","Hozzaad"));//AruUjForm()

        //const aruLista=document.createElement('div');//eredeti
        //aruLista.id='tablazatTarolo';//eredeti
        const aruLista=document.getElementById('tablazatTarolo');//uj

        aruLista.appendChild(liTagAruUj);

        const aruTable=document.createElement('table');
        aruTable.id='tablazat';
            
        const thead=document.createElement('thead');
            
        const thR=document.createElement('tr');
        
        const thHId=document.createElement('th');
        //thHId.scope="row";
        thHId.textContent="Id";
        thR.appendChild(thHId);

        const thHNev=document.createElement('th');
        //thHNev.scope="row";
        thHNev.textContent="Nev";
        thR.appendChild(thHNev);

        const thHAr=document.createElement('th');
        //thHAr.scope="row";
        thHAr.textContent="Ar";
        thR.appendChild(thHAr);

        const thHLeiras=document.createElement('th');
        //thHLeiras.scope="row";
        thHLeiras.textContent="Leiras";
        thR.appendChild(thHLeiras);

        const thHMennyiseg=document.createElement('th');
        //thHLeiras.scope="row";
        thHMennyiseg.textContent="Mennyiseg";
        thR.appendChild(thHMennyiseg);

        const thHKep=document.createElement('th');
        //thHLeiras.scope="row";
        thHKep.textContent="Kep";
        thR.appendChild(thHKep);

        const thHTorol=document.createElement('th');
        //thHTorol.scope="row";
        thHTorol.textContent="Torol";
        thR.appendChild(thHTorol);

        const thHSzerkeszt=document.createElement('th');
        //thHSzerkeszt.scope="row";
        thHSzerkeszt.textContent="Szerkeszt";
        thR.appendChild(thHSzerkeszt);

        thead.appendChild(thHId);
        thead.appendChild(thHNev);
        thead.appendChild(thHAr);
        thead.appendChild(thHLeiras);
        thead.appendChild(thHMennyiseg);
        thead.appendChild(thHKep);
        thead.appendChild(thHTorol);
        thead.appendChild(thHSzerkeszt);
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
            aTagTorol.textContent="Torol";

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
            aTagSzerkeszt.textContent="Szerkeszt";

            liTagSzerkeszt.textContent="Szerkeszt";
            //liTagSzerkeszt.appendChild(aTagSzerkeszt);
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
        aruLista.appendChild(aruTable);
        
        const adminTartalma=document.getElementById("adminTartalom");
        
        adminTartalma.appendChild(aruLista);
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
    ElozoKovetkezoLapozoMegjelenitese();
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
        elozo.textContent="Elozo";

        const kovetkezo=document.createElement('li');
        kovetkezo.id="kovetkezo";
        kovetkezo.textContent="Kovetkezo"

        lapozo.appendChild(elozo);
        lapozo.appendChild(oldalValaszto);
        lapozo.appendChild(kovetkezo);
        
        adminTartalom.appendChild(szuroTarolo);
        adminTartalom.appendChild(lapozo);
    }
        const data1=await FetchMeghiv("?oldal=Apitermekek/lekerdezAruMaxAr");
        SzuroFelepit("?oldal=Apitermekek/lekerdezAruSzures",data1,(eredmeny)=>{
            AruListaz(eredmeny);
        });
        LapozashozElozoKovekezoEsemenyek();
        const a=await LapozashozSelectEsemeny("?oldal=Apitermekek/lekerdezAruSzures",(eredmeny)=>{
            AruListaz(eredmeny)
        });
        const data=await FetchMeghiv("?oldal=Apitermekek/lekerdezAruSzures",null,true);

        LapozashozLegorduloMenu(data);
}
function VisszaAruListahoz() {
    const formTarolo=document.getElementById("formTarolo");
    if (formTarolo) {
        formTarolo.remove();
    }
    const tablazatTarolo=document.getElementById("tablazatTarolo");
    tablazatTarolo.style.display="flex";

    const szuroatTarolo=document.getElementById("szuroTarolo");
    szuroatTarolo.style.display="flex";

    const lapozo=document.getElementById("lapozo");
    lapozo.style.display="flex";
}

function FormAru(params,actionParam,gombFelirat) {
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

    const form=document.createElement('Form');
    form.method="post";
    form.action=actionParam;
//id
    const aruIdInput=document.createElement("input");
    aruIdInput.type="hidden";
    aruIdInput.name="idaru";
    aruIdInput.value=params?.cells?.[0]?.textContent || "";
    form.appendChild(aruIdInput);
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

    const aruNevMin=5;
    const aruNevMax=20;
    const aruNevPattern=/^[A-Za-z0-9]+$/;
    aruNevInput.minLength=aruNevMin;
    aruNevInput.maxLength=aruNevMax;
    aruNevInput.required=true;
    aruNevInput.pattern=aruNevPattern.source;

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
    ErrorDivAruAr.appendChild(aruArInput);
    ErrorDivAruAr.appendChild(errorAruAr);
    form.appendChild(ErrorDivAruAr);
//ar v e g e

//leiras
    const aruLeirasInput=document.createElement("input");
    aruLeirasInput.type="text";
    aruLeirasInput.name="leiras";
    aruLeirasInput.value=params?.cells?.[3]?.textContent || "";
    aruLeirasInput.placeholder="Aru leiras";
    //form.appendChild(aruLeirasInput);

    const errorAruLeiras=document.createElement("p");
    errorAruLeiras.style.display="none";
    errorAruLeiras.id="errorAruLeiras";
    const ErrorDivAruLeiras=document.createElement("div");
    ErrorDivAruLeiras.classList.add("ErrorDiv");
    ErrorDivAruLeiras.appendChild(aruLeirasInput);
    ErrorDivAruLeiras.appendChild(errorAruLeiras);
    form.appendChild(ErrorDivAruLeiras);
//leiras v e g e

//mennyiseg
    const aruMennyisegInput=document.createElement("input");
    aruMennyisegInput.type="text";
    aruMennyisegInput.name="mennyiseg";
    aruMennyisegInput.value=params?.cells?.[4]?.textContent || "";
    aruMennyisegInput.placeholder="Aru mennyisege";
    //form.appendChild(aruMennyisegInput);

    const errorAruMennyiseg=document.createElement("p");
    errorAruMennyiseg.style.display="none";
    errorAruMennyiseg.id="errorAruMennyiseg";
    const ErrorDivAruMennyiseg=document.createElement("div");
    ErrorDivAruMennyiseg.classList.add("ErrorDiv");
    ErrorDivAruMennyiseg.appendChild(aruMennyisegInput);
    ErrorDivAruMennyiseg.appendChild(errorAruMennyiseg);
    form.appendChild(ErrorDivAruMennyiseg);
//mennyiseg v e g e

//kep
    const aruKepInput=document.createElement("input");
    aruKepInput.type="text";
    aruKepInput.name="kep";
    aruKepInput.value=params?.cells?.[5]?.textContent || "";
    aruKepInput.placeholder="Aru kep url";
    //form.appendChild(aruKepInput);

    const errorAruKep=document.createElement("p");
    errorAruKep.style.display="none";
    errorAruKep.id="errorAruKep";
    const ErrorDivAruKep=document.createElement("div");
    ErrorDivAruKep.classList.add("ErrorDiv");
    ErrorDivAruKep.appendChild(aruKepInput);
    ErrorDivAruKep.appendChild(errorAruKep);
    form.appendChild(ErrorDivAruKep);
//kep v e g e
    const aruBekuldGomb=document.createElement('button');
    aruBekuldGomb.type="submit";
    aruBekuldGomb.textContent=gombFelirat || "Oke" ;
    aruBekuldGomb.addEventListener("click",(e)=>{
            if (!confirm("Biztosan "+(gombFelirat ? gombFelirat+"?" :"?"))) {
                e.preventDefault();
            }
        });
    aruNevInput.addEventListener("input",(e)=>{
            EllenorizElsoResz(aruBekuldGomb,errorAruNev,aruNevInput,false,aruNevPattern,aruNevMin,aruNevMax);
    });
    form.appendChild(aruBekuldGomb);
    formTarolo.appendChild(form);
    document.getElementById("adminTartalom").appendChild(formTarolo);
}