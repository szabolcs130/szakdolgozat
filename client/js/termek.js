document.getElementById("termekForm").addEventListener('submit',Elkuld);
function Elkuld(e) {
    e.preventDefault();
    const termek = new FormData(this);

    fetch('?oldal=Kosar/Hozzaad',{
        method: 'POST',
        body: termek
    })
    .then(res=>res.text())
    .then(data=>{
        //document.getElementById("elkuldGomb").style.display='none';
        const sikeresenAKosarba=document.createElement('p');
        sikeresenAKosarba.id='sikeresenAKosarba';
        sikeresenAKosarba.textContent="Sikeresen a kosarba rakva";
        document.getElementById("aru").appendChild(sikeresenAKosarba);
    })

}