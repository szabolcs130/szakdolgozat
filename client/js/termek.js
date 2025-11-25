window.onload=async function() {
    const aruId=document.getElementById("aruId");
    const response= await fetch("?oldal=Apitermekek/lekerdezAruById&aruId="+aruId.value);
    const data = await response.json();
    const aruMe=document.getElementById("me");
    aruMe.max=data?.[0]?.mennyiseg;
    const aruKepDiv=document.getElementById("aru_kep");

    const aru_kep=document.createElement('img');
    aru_kep.classList.add('aruKepImg');
    const kepUrl=new URL('../image/'+data?.[0]?.kep+'.png', import.meta.url).href;
    aru_kep.src=kepUrl;
    aru_kep.alt="Nem sikerult a kep betoltes!";
    aruKepDiv.appendChild(aru_kep);
}
const termekForm=document.getElementById("termekForm");
if (termekForm) {
  termekForm.addEventListener('submit',Elkuld);  
}
function Elkuld(e) {
    e.preventDefault();
    const termek = new FormData(this);

    fetch('?oldal=Kosar/MennyisegValtoztat',{
        method: 'POST',
        body: termek
    })
    .then(res=>res.text())
    .then(data=>{
        //document.getElementById("elkuldGomb").style.display='none';
        /*const sikeresenAKosarba=document.createElement('p');
        sikeresenAKosarba.id='sikeresenAKosarba';
        sikeresenAKosarba.textContent="Sikeresen a kosarba rakva";
        document.getElementById("aru").appendChild(sikeresenAKosarba);*/
        window.location.reload();
    })

}