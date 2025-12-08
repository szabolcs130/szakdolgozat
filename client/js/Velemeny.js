import { SzuroFelepit,FetchMeghiv,LapozashozSelectEsemeny,LapozashozElozoKovekezoEsemenyek,LapozashozLegorduloMenu,ElozoKovetkezoLapozoMegjelenitese } from './Lapozo.js';
import { EllenorizElsoResz,htmlEllenorrzo} from './Ellenorzo.js';
window.addEventListener("load",async function() {
    const data2=await FetchMeghiv("?oldal=Apivelemeny/LekerdezVelemenyByAruIdSajat",null,true);
    if (SajatVelemeny(data2)) {

        const velemenyForm=document.getElementById("VelemenyForm");
        if (velemenyForm) {
            velemenyForm.style.display="none";
        }
    }

    LapozashozElozoKovekezoEsemenyek("elozo","kovetkezo","oldalValaszto");
    const a=await VelemenyLapozashozSelectEsemeny("?oldal=Apivelemeny/LekerdezVelemenyByAruNemSajat",(eredmeny)=>{
            LapozNemSajatVelemeny(eredmeny)
    });
    
    const data1=await FetchMeghiv("?oldal=Apivelemeny/LekerdezVelemenyByAruNemSajatOsszes",null,true);
    LapozashozLegorduloMenu(data1,"oldalValaszto");
    VelemenyIrasEllenorzesFelepit();
});
function VelemenyIrasEllenorzesFelepit() {
    const velemenyInput=document.getElementById("velemenyInput");
    if (velemenyInput) {
        const errorVelemenyP=document.getElementById("errorVelemenyP");
        velemenyInput.addEventListener("input",()=>{
            EllenorizElsoResz(errorVelemenyP,velemenyInput,false,/^[A-Za-z0-9áéíóöőúüűÁÉÍÓÖŐÚÜŰ .,!?;:]+$/,5,254,false);
        });
    }
    const velemenyBekuldForm=document.getElementById("VelemenyForm");
    if (velemenyBekuldForm) {
        velemenyBekuldForm.addEventListener("submit",VelemenyBekudEllenoriz);
    }
}
function VelemenyBekudEllenoriz(e) {
    const velemenyInput=document.getElementById("velemenyInput");
    var velemenyInputResult=EllenorizElsoResz(false,velemenyInput,false,/^[A-Za-z0-9áéíóöőúüűÁÉÍÓÖŐÚÜŰ .,!?;:]+$/,5,254,true);
    if (!velemenyInputResult) {
        e.preventDefault();
    } 
}
async function VelemenyLapozashozSelectEsemeny(url,callback) {
    const oldalValaszto=document.getElementById("oldalValaszto");
    oldalValaszto.addEventListener("change",async function(e){
        var oldalReturn=EllenorizElsoResz(false,oldalValaszto,true,/^[0-9]{1,8}$/,1,8,true);
        if (oldalReturn) {
            const data1=await FetchMeghiv(url,e.target.value,null,null,null,null);
            callback(data1);
        }
    });
}
function SajatVelemeny(data) {
    const sajatVelemeny=document.getElementById("sajatVelemeny");
    if (sajatVelemeny){
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
        }else{
            const sajatVelemenyH3Nincs=document.createElement("h3");
            sajatVelemenyH3Nincs.textContent="Nincs megjelenitheto sajat velemenye! ";
            sajatVelemeny.appendChild(sajatVelemenyH3Nincs);
        }
    }
    return false;
}
function LapozNemSajatVelemeny(data) {
    const masVelemeny=document.getElementById("masVelemeny");
    masVelemeny.innerHTML="";
    if (data.length) {
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
        ElozoKovetkezoLapozoMegjelenitese("elozo","kovetkezo","oldalValaszto");
    }else{
        const masVelemenyH3Nincs=document.createElement("h3");
        masVelemenyH3Nincs.textContent="Nincs megjelenitheto velemeny! ";
        masVelemeny.appendChild(masVelemenyH3Nincs);
        const lapozo=document.getElementById("lapozo");
        if (lapozo) {
            lapozo.style.display="none";
        }
    }
}
