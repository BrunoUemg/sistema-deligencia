function ResetCampos()
{
    for(var o=document.getElementsByTagName("input"),e=0;e<o.length;e++)
    "text"==o[e].type&&(o[e].style.backgroundColor="",o[e].style.borderColor="")
}
    
    function mascara(o,e,r,t)
    {var l=e.selectionStart,a=e.value;a=a.replace(/\D/g,"");var s=a.length,c=o.length;window.event?id=r.keyCode:r.which&&(id=r.which),cursorfixo=!1,l<s&&(cursorfixo=!0);var n=!1;if((16==id||19==id||id>=33&&id<=40)&&(n=!0),ii=0,mm=0,!n){if(8!=id)for(e.value="",j=0,i=0;i<c&&("#"==o.substr(i,1)?(e.value+=a.substr(j,1),j++):"#"!=o.substr(i,1)&&(e.value+=o.substr(i,1)),8==id||cursorfixo||l++,j!=s+1);i++);t&&coresMask(e)}cursorfixo&&!n&&l--,e.setSelectionRange(l,l)}var corCompleta="#FFFAFA",corIncompleta="#FFFAFA";
   
    
    function verifica() {
      if (document.forms[0].email.value.length == 0) {
        alert('Por favor, informe o seu EMAIL.');
      document.frmEnvia.email.focus();
        return false;
      }
      return true;
    }


      function checarEmail(){
      if( document.forms[0].email.value=="" 
         || document.forms[0].email.value.indexOf('@')==-1 
           || document.forms[0].email.value.indexOf('.')==-1 )
        {
          alert( "Por favor, informe um E-mail válido!" );
          return false;
        }
      }

 
