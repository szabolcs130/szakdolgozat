window.onload = async function() {
    let response= await fetch("?oldal=Apitermekek/Main");
    let data = await response.json();
    //Listazo(data);
    //console.log(data);
    const aruLista=document.createElement('div');
    aruLista.class='table-responsive';
    
    const aruTable=document.createElement('table');
    aruTable.classList.add('table');
    aruTable.classList.add('table-striped');
    aruTable.classList.add('table-bordered');
    aruTable.classList.add('table-hover');
        
    const thead=this.document.createElement('thead');
        
    const thR=this.document.createElement('tr');
    
    const thHNev=this.document.createElement('th');
    thHNev.scope="row";
    thHNev.textContent="Nev";
    thR.appendChild(thHNev);
    
    const thHId=this.document.createElement('th');
    thHNev.scope="row";
    thHNev.textContent="Id";
    thR.appendChild(thHNev);

    const thHAr=this.document.createElement('th');
    thHAr.scope="row";
    thHAr.textContent="Ar";
    thR.appendChild(thHAr);

    const thHLeiras=this.document.createElement('th');
    thHLeiras.scope="row";
    thHLeiras.textContent="Leiras";
    thR.appendChild(thHLeiras);
 
    const thHKep=this.document.createElement('th');
    thHKep.scope="row";
    thHKep.textContent="Kep";
    thR.appendChild(thHKep);

    thead.appendChild(thHNev);
    thead.appendChild(thHAr);
    thead.appendChild(thHLeiras);
    thead.appendChild(thHKep);
    aruTable.appendChild(thead);

    const tbody=this.document.createElement('tbody');

    data.forEach(element => {
    
        const tbRId=this.document.createElement('tr');
        
        const tbDId=this.document.createElement('td');
        tbDId.classList.add('id_aru');
        tbDId.textContent=element.id_aru;

        const tbDNev=this.document.createElement('td');
        tbDNev.classList.add('id_aru');
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

        //
        const tbDTorol=this.document.createElement('td');
        tbDTorol.classList.add('AruTorles');

        const liTag=document.createElement('li');

        const aTag=document.createElement('a');
        aTag.href='?oldal=Admin/AruTorol/'+element.id_aru;
        aTag.textContent="Torol";

        liTag.appendChild(aTag);
        tbDTorol.appendChild(liTag);

        //document.body.appendChild(liTag);
        //


        tbRId.appendChild(tbDId);
        tbRId.appendChild(tbDNev);
        tbRId.appendChild(tbDLeiras);
        tbRId.appendChild(tbDKep);
        tbRId.appendChild(tbDTorol);
        tbody.appendChild(tbRId);
        //        echo '<li><a href="?oldal=Termek/Main/'.$ertek['id_aru'].'">Megnéz</a></li>';
        
        
       // this.alert(liTag);
        /*aru.appendChild(aru_nev);
        aru.appendChild(aru_ar);
        aru.appendChild(aru_leiras);
        aru.appendChild(liTag);

        aruk.appendChild(aru);*/
        
    });
    aruTable.append(tbody);
    aruLista.appendChild(aruTable);

    document.body.appendChild(aruLista);
}