import { SzuroFelepit,FetchMeghiv,LapozashozSelectEsemeny,LapozashozElozoKovekezoEsemenyek,LapozashozLegorduloMenu,ElozoKovetkezoLapozoMegjelenitese } from './Lapozo.js';
window.addEventListener("load",async function() {
    const data2=await FetchMeghiv("?oldal=Apivelemeny/LekerdezVelemenyByAruIdSajat",null,true);
    if (SajatVelemeny(data2)) {
        document.getElementById("VelemenyForm").style.display="none";
    }

    LapozashozElozoKovekezoEsemenyek();
    const a=await LapozashozSelectEsemeny("?oldal=Apivelemeny/LekerdezVelemenyByAruNemSajat",(eredmeny)=>{
            LapozNemSajatVelemeny(eredmeny)
    });
    
    const data1=await FetchMeghiv("?oldal=Apivelemeny/LekerdezVelemenyByAruNemSajatOsszes",null,true);
    LapozashozLegorduloMenu(data1);
});
function SajatVelemeny(data) {
    const sajatVelemeny=document.getElementById("sajatVelemeny");
    if (data.length) {
        const sajatVelemenyH3=document.createElement("h3");
        sajatVelemenyH3.textContent="Sajat Velemeny: ";

        sajatVelemeny.appendChild(sajatVelemenyH3);

        const VelemenyEgy=document.createElement("div");
        VelemenyEgy.id="VelemenyEgy";

        const VelemenyEgyFejlec=document.createElement("div");
        VelemenyEgyFejlec.id="VelemenyEgyFejlec";
            
        const VelemenyEgyTorzs=document.createElement("div");
        VelemenyEgyTorzs.id="VelemenyEgyTorzs";

        const VelemenyEgyFelhasznalo=document.createElement("div");
        VelemenyEgyFelhasznalo.id="VelemenyEgyFelhasznalo";
        VelemenyEgyFelhasznalo.textContent=data[0].nev_szemely;

        const VelemenyEgySzoveg=document.createElement("div");
        VelemenyEgySzoveg.id="VelemenyEgySzoveg";
        VelemenyEgySzoveg.textContent=data[0].velemenyszoveg;

        const velemenyTorlesFormTarolo=document.createElement('div');
        velemenyTorlesFormTarolo.id="velemenyTorlesFormTarolo";

        const velemenyTorlesform=document.createElement('Form');
        velemenyTorlesform.method="post";
        velemenyTorlesform.action="?oldal=Velemeny/VelemenyTorles";

        const velemenyIdInput=document.createElement("input");
        velemenyIdInput.type="hidden";
        velemenyIdInput.name="idVelemeny";
        velemenyIdInput.value=data[0].id_velemeny;
        velemenyTorlesform.appendChild(velemenyIdInput);

        const velemenyTorlesBekuldGomb=document.createElement('button');
        velemenyTorlesBekuldGomb.type="submit";
        velemenyTorlesBekuldGomb.textContent="Torles" ;
        velemenyTorlesBekuldGomb.addEventListener("click",(e)=>{
            if (!confirm("Biztosan Torlod?")) {
                e.preventDefault();
            }
        });
        velemenyTorlesform.appendChild(velemenyTorlesBekuldGomb);
        velemenyTorlesFormTarolo.appendChild(velemenyTorlesform);

        VelemenyEgyFejlec.appendChild(VelemenyEgyFelhasznalo);
        VelemenyEgyTorzs.appendChild(VelemenyEgySzoveg);
        VelemenyEgy.appendChild(VelemenyEgyFejlec);
        VelemenyEgy.appendChild(VelemenyEgyTorzs);
        VelemenyEgy.appendChild(velemenyTorlesFormTarolo);
        sajatVelemeny.appendChild(VelemenyEgy);
        return true;
    }
    return false;
}
function LapozNemSajatVelemeny(data) {
const masVelemeny=document.getElementById("masVelemeny");
    masVelemeny.innerHTML="";
    const masVelemenyH3=document.createElement("h3");
    masVelemenyH3.textContent="Masok Velemenye: ";

    masVelemeny.appendChild(masVelemenyH3);

        data.forEach(element => {
        const VelemenyEgy=document.createElement("div");
        VelemenyEgy.id="VelemenyEgy";

        const VelemenyEgyFejlec=document.createElement("div");
        VelemenyEgyFejlec.id="VelemenyEgyFejlec";
        
        const VelemenyEgyTorzs=document.createElement("div");
        VelemenyEgyTorzs.id="VelemenyEgyTorzs";

        const VelemenyEgyFelhasznalo=document.createElement("div");
        VelemenyEgyFelhasznalo.id="VelemenyEgyFelhasznalo";
        VelemenyEgyFelhasznalo.textContent=element.nev_szemely;

        const VelemenyEgySzoveg=document.createElement("div");
        VelemenyEgySzoveg.id="VelemenyEgySzoveg";
        VelemenyEgySzoveg.textContent=element.velemenyszoveg;

        VelemenyEgyFejlec.appendChild(VelemenyEgyFelhasznalo);
        VelemenyEgyTorzs.appendChild(VelemenyEgySzoveg);
        VelemenyEgy.appendChild(VelemenyEgyFejlec);
        VelemenyEgy.appendChild(VelemenyEgyTorzs);
        masVelemeny.appendChild(VelemenyEgy);

    });
    ElozoKovetkezoLapozoMegjelenitese();
}
