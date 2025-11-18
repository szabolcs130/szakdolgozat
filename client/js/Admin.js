window.onload = async function() {
    let response= await fetch("?oldal=Apitermekek/Main");
    let data = await response.json();
    //Listazo(data);
    //console.log(data);


    

    const aruLista=document.createElement('div');
    aruLista.id='tablazatTarolo';
    
    const aruTable=document.createElement('table');
    aruTable.id='tablazat';
    //aruTable.classList.add('table');
    //aruTable.classList.add('table-striped');
    //aruTable.classList.add('table-bordered');
    //aruTable.classList.add('table-hover');
        
    const thead=this.document.createElement('thead');
        
    const thR=this.document.createElement('tr');
    
    const thHId=this.document.createElement('th');
    //thHId.scope="row";
    thHId.textContent="Id";
    thR.appendChild(thHId);

    const thHNev=this.document.createElement('th');
    //thHNev.scope="row";
    thHNev.textContent="Nev";
    thR.appendChild(thHNev);

    const thHAr=this.document.createElement('th');
    //thHAr.scope="row";
    thHAr.textContent="Ar";
    thR.appendChild(thHAr);

    const thHLeiras=this.document.createElement('th');
    //thHLeiras.scope="row";
    thHLeiras.textContent="Leiras";
    thR.appendChild(thHLeiras);
 
    const thHTorol=this.document.createElement('th');
    //thHTorol.scope="row";
    thHTorol.textContent="Torol";
    thR.appendChild(thHTorol);

    const thHSzerkeszt=this.document.createElement('th');
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

    const tbody=this.document.createElement('tbody');

    data.forEach(element => {
    
        const tbRId=this.document.createElement('tr');
        
        const tbDId=this.document.createElement('td');
        tbDId.classList.add('id_aru');
        tbDId.textContent=element.id_aru;

        const tbDNev=this.document.createElement('td');
        tbDNev.classList.add('nev');
        tbDNev.textContent=element.nev_aru;

        const tbDAr=this.document.createElement('td');
        tbDAr.classList.add('ar');
        tbDAr.textContent=element.ar;

        const tbDLeiras=this.document.createElement('td');
        tbDLeiras.classList.add('leiras');
        tbDLeiras.textContent=element.leiras;

        const tbDKep=this.document.createElement('td');
        tbDKep.classList.add('kep');
        tbDKep.textContent="Adatbazisba csinaljam meg";

        //Torol
        const tbDTorol=this.document.createElement('td');
        tbDTorol.classList.add('AruTorles');

        const liTagTorol=document.createElement('li');

        const aTagTorol=document.createElement('a');
        aTagTorol.href='?oldal=Admin/AruTorol/'+element.id_aru;
        aTagTorol.textContent="Torol";

        liTagTorol.appendChild(aTagTorol);
        tbDTorol.appendChild(liTagTorol);
        //TOROL V E G E

        //Szerkeszt
        const tbDSzerkeszt=this.document.createElement('td');
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

    document.getElementById("adminTartalom").appendChild(aruLista);

    document.querySelectorAll("#tablazat tbody tr td:last-child").forEach(adatsor=>{
        adatsor.addEventListener("click",()=>FormAruSzerkeszt(adatsor.parentElement));
    })

    //document.body.appendChild(aruLista);
}
function FormAruSzerkeszt(params) {

    const tablazatTarolo=document.getElementById("tablazatTarolo");
    tablazatTarolo.style.display="none";

    const liTagTorol=document.createElement('li');

    const aTagVissza=document.createElement('a');
    aTagVissza.href='#';
    aTagVissza.textContent="Vissza";
    liTagTorol.appendChild(aTagVissza);


    const formTarolo=document.createElement('div');
    formTarolo.id="formTarolo";

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
    console.log(params);
    
}
