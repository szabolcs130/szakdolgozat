import { EllenorizElsoResz,htmlEllenorrzo} from './Ellenorzo.js';
window.addEventListener("load",async function() {
    const aruId=document.getElementById("aruId");
    if (aruId) {
        var aruIdReturn=EllenorizElsoResz(false,aruId,false,/^[1-9][0-9]{0,7}$/,1,8,true);
        if (aruIdReturn) {
            const response= await fetch("?oldal=Apitermekek/lekerdezAruById&aruId="+aruId.value);
            const data = await response.json();
            const aruMe=document.getElementById("me");
            if (aruMe) {
                aruMe.max=data?.[0]?.mennyiseg || 0;
            }
            
            const aruKepDiv=document.getElementById("aru_kep");

            const aru_kep=document.createElement('img');
            aru_kep.classList.add('aruKepImg');
            const kepUrl=new URL('../image/'+data?.[0]?.kep+'.png', import.meta.url).href;
            aru_kep.src=kepUrl;
            aru_kep.alt="Nem sikerult a kep betoltes!";
            aruKepDiv.appendChild(aru_kep);
        
            const kosarInput=document.getElementById("me");
            if (kosarInput) {
                kosarInput.addEventListener("input",()=>{
                    EllenorizElsoResz(false,kosarInput,false,/^[1-9][0-9]{0,7}$/,1,8,false);
                });
            }  
        }
    }
});
const termekForm=document.getElementById("termekForm");
if (termekForm) {
  termekForm.addEventListener('submit',Elkuld);  
}
function Elkuld(e) {
    e.preventDefault();
    const termek = new FormData(this);
    const minta=/^[1-9]{1,8}$/;
    if (minta.test(termek.get("me"))) {
        fetch('?oldal=Kosar/MennyisegValtoztat',{
        method: 'POST',
        body: termek
        })
        .then(res=>res.text())
        .then(data=>{
            window.location.reload();
        })
    }
}