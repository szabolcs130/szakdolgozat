export function EllenorizElsoResz(error,adat,lehetUres,minta,min,max,visszateres) {
    if (lehetUres){
        if (adat.value.length==0) {
            adat.style.background='#9f9';
            error.style.display='none';
            error.textContent="";
            if (visszateres) return true;
        }else{
            const eredmeny=szovegEllenorzo(error,adat,min,max,minta,lehetUres);
            if (visszateres) return eredmeny;
        }
    }else{
       const eredmeny=szovegEllenorzo(error,adat,min,max,minta,lehetUres);
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
        error.textContent="Betartandó: "+minta.source.split("{")[0].replace(/[\^\+\$]/g,"");
        rendben=false;
        adat.focus();
        adat.style.background='#f99';
        error.style.display="inline-block";
        return rendben;
    }
    if (!adat.value.trim() || (adat.value.length>0 && adat.value[0]==" ")) {
        error.textContent="Szóköz nem megengedett elöl!";
        rendben=false;
        adat.focus();
        adat.style.background='#f99';
        error.style.display="inline-block";
        return rendben;
    }
    if (adat.value.length==0 && lehetUres==false) {
        error.textContent="Üres!";
        rendben=false;
        adat.focus();
        adat.style.background='#f99';
        error.style.display="inline-block";
        return rendben;
    }
    if (adat.value.length<min || adat.value.length>max) {
        error.textContent="Hossz nem megfelelő";
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