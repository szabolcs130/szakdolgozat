window.onload = function() {
    const termekLi=document.getElementById("adminTermek");
    termekLi.addEventListener("click",()=>AruListaz());
}
async function AruListaz() {
    let response= await fetch("?oldal=Apitermekek/Main");
    let data = await response.json();
    
    const aruLista=document.createElement('div');
    aruLista.id='tablazatTarolo';
    
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
    thead.appendChild(thHTorol);
    thead.appendChild(thHSzerkeszt);
    aruTable.appendChild(thead);

    const tbody=document.createElement('tbody');

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

        const tbDKep=document.createElement('td');
        tbDKep.classList.add('kep');
        tbDKep.textContent="Adatbazisba csinaljam meg";

        //Torol
        const tbDTorol=document.createElement('td');
        tbDTorol.classList.add('AruTorles');

        const liTagTorol=document.createElement('li');

        const aTagTorol=document.createElement('a');
        aTagTorol.href='?oldal=Admin/AruTorol/'+element.id_aru;
        aTagTorol.textContent="Torol";

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
        //tbRId.appendChild(tbDKep);
        tbRId.appendChild(tbDTorol);
        tbRId.appendChild(tbDSzerkeszt);
        tbody.appendChild(tbRId);
    });
    aruTable.append(tbody);
    aruLista.appendChild(aruTable);
    
    const adminTartalma=document.getElementById("adminTartalom");
    adminTartalma.innerHTML="";
    adminTartalma.appendChild(aruLista);
    document.querySelectorAll("#tablazat tbody tr td:last-child").forEach(adatsor=>{
        adatsor.addEventListener("click",()=>FormAruSzerkeszt(adatsor.parentElement));
    })
}
function FormAruSzerkeszt(params) {

    const tablazatTarolo=document.getElementById("tablazatTarolo");
    tablazatTarolo.style.display="none";

    const liTagVissza=document.createElement('li');

    const aTagVissza=document.createElement('a');
    aTagVissza.href='#';
    aTagVissza.textContent="Vissza";
    liTagVissza.appendChild(aTagVissza);

    liTagVissza.addEventListener("click",()=>VisszaAruListahoz());

    const formTarolo=document.createElement('div');
    formTarolo.id="formTarolo";

    formTarolo.appendChild(liTagVissza);

    const form=document.createElement('Form');
    form.method="post";
    form.action="?oldal=Admin/AruSzerkeszt";

    const aruIdInput=document.createElement("input");
    aruIdInput.type="hidden";
    aruIdInput.name="idaru";
    aruIdInput.value=params.cells[0].textContent;
    form.appendChild(aruIdInput);

    const aruNevInput=document.createElement("input");
    aruNevInput.type="text";
    aruNevInput.name="nev";
    aruNevInput.value=params.cells[1].textContent;
    aruNevInput.placeholder="Aru neve";
    form.appendChild(aruNevInput);

    const aruArInput=document.createElement("input");
    aruArInput.type="number";
    aruArInput.name="ar";
    aruArInput.value=params.cells[2].textContent;
    aruArInput.placeholder="Aru ara";
    form.appendChild(aruArInput);

    const aruLeirasInput=document.createElement("input");
    aruLeirasInput.type="text";
    aruLeirasInput.name="leiras";
    aruLeirasInput.value=params.cells[3].textContent;
    aruLeirasInput.placeholder="Aru leiras";
    form.appendChild(aruLeirasInput);

    const aruBekuldGomb=document.createElement('button');
    aruBekuldGomb.type="submit";
    aruBekuldGomb.textContent="Szerkeszt";
    form.appendChild(aruBekuldGomb);
    formTarolo.appendChild(form);
    document.getElementById("adminTartalom").appendChild(formTarolo);
    //console.log(params);
    
}
function VisszaAruListahoz() {
    
    const formTarolo=document.getElementById("formTarolo");
    formTarolo.style.display="none"; 
    const tablazatTarolo=document.getElementById("tablazatTarolo");
    tablazatTarolo.style.display="block";
}