export function EllenorizElsoResz(error,adat,lehetUres,minta,min,max,visszateres) {
    if (lehetUres){
        if (adat.value.length==0) {
            adat.style.background='#9f9';
            if (error!=false) {
                error.style.display='none';
                error.textContent="";   
            }
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
    if (error!=false) {
        error.textContent="";
        error.style.color="red";
        error.textContent="";
        error.style.display="none";
    }
    if (!minta.test(adat.value)){
        rendben=false;
        adat.focus();
        adat.style.background='#f99';
        if (error!=false) {
            error.style.display="inline-block";
            error.textContent="Betartandó: "+minta.source.split("{")[0].replace(/[\^\+\$]/g,"");
        }
        return rendben;
    }
    if (!adat.value.trim() || (adat.value.length>0 && adat.value[0]==" ")) {
        rendben=false;
        adat.focus();
        adat.style.background='#f99';
        if (error!=false) {
            error.style.display="inline-block";
            error.textContent="Szóköz nem megengedett elöl!";
        }
        return rendben;
    }
    if (adat.value.length==0 && lehetUres==false) {
        rendben=false;
        adat.focus();
        adat.style.background='#f99';
        if (error!=false) {
            error.style.display="inline-block";
            error.textContent="Üres!";
        }
        return rendben;
    }
    if (adat.value.length<min || adat.value.length>max) {
        
        rendben=false;
        adat.focus();
        adat.style.background='#f99';
        if (error!=false) {
            error.style.display="inline-block";
            error.textContent="Hossz nem megfelelő";
        }
        return rendben;
    }
    if (rendben) {
        adat.style.background='#9f9';
        if (error!=false) {
            error.style.display='none';
            error.textContent="";    
        }
    }
    return rendben;
}
export function htmlEllenorrzo(adat,minta,min,max,szukseges) {
    adat.minLength=min;
    adat.maxLength=max;
    adat.required=szukseges;
    adat.pattern=minta.source;
}