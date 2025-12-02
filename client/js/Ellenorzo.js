export function EllenorizElsoResz(keresoGomb,error,adat,lehetUres,minta,min,max,visszateres) {
    if (keresoGomb) {
        keresoGomb.disabled=true;
    }
    if (lehetUres){
        if (adat.value.length==0) {
            keresoGomb.disabled=false;
            adat.style.background='#9f9';
            error.style.display='none';
            error.textContent="";
            if (visszateres) return true;
        }else{
            const eredmeny=szovegEllenorzo(error,adat,min,max,minta,lehetUres);
            if (eredmeny) {
                keresoGomb.disabled=!eredmeny;
            }
            if (visszateres) return eredmeny;
        }
    }else{
       const eredmeny=szovegEllenorzo(error,adat,min,max,minta,lehetUres);
        if (eredmeny) {
            keresoGomb.disabled=!eredmeny;
        }
        if (visszateres) return eredmeny;
    }
}
export function szovegEllenorzo(error,adat,min,max,minta,lehetUres) {
    var rendben=true;
    error.textContent="";
    error.style.color="red";
    error.textContent="";
    error.style.display="none";
    if (!minta.test(adat.value)){
        error.textContent="Tartsa be a mintat!";
        rendben=false;
        adat.focus();
        adat.style.background='#f99';
        error.style.display="inline-block";
        return rendben;
    }
    if (!adat.value.trim() || (adat.value.length>0 && adat.value[0]==" ")) {
        error.textContent="Szokoz nem megengedett elol!";
        rendben=false;
        adat.focus();
        adat.style.background='#f99';
        error.style.display="inline-block";
        return rendben;
    }
    if (adat.value.length==0 && lehetUres==false) {
        error.textContent="Ures!";
        rendben=false;
        adat.focus();
        adat.style.background='#f99';
        error.style.display="inline-block";
        return rendben;
    }
    if (adat.value.length<min || adat.value.length>max) {
        error.textContent="Hossz nem megfelelo";
        rendben=false;
        adat.focus();
        adat.style.background='#f99';
        error.style.display="inline-block";
        return rendben;
    }
    if (rendben) {
        adat.style.background='#9f9';
        error.style.display='none';
        error.textContent="";
    }
    return rendben;
}
export function htmlEllenorrzo(adat,minta,min,max,szukseges) {
    adat.minLength=min;
    adat.maxLength=max;
    adat.required=szukseges;
    adat.pattern=minta.source;
}