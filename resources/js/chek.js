function Check() {
  if (document.forms[0].email.value.length == 0) {
    alert('Por favor, informe o seu EMAIL.');
	document.frmEnvia.email.focus();
    return false;
  }
  return true;
}
 
function CheckEmail(){
if( document.forms[0].email.value=="" 
   || document.forms[0].email.value.indexOf('@')==-1 
     || document.forms[0].email.value.indexOf('.')==-1 )
	{
	   alert( "Por favor, informe um E-MAIL válido!" );
	   return false;
	}
}

/*função valida email*/
function checkform()
{
var x=document.forms["myForm"]["email"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
{
alert("Não é um endereço de e-mail válido");
return false;
}
return true;
}

/*função valida CPF ou CNPJ*/
function checkcpf()
{
$('#cpfcnpj').mask('000.000.000-00', {
  onKeyPress : function(cpfcnpj, e, field, options) {
    const masks = ['000.000.000-000', '00.000.000/0000-00'];
    const mask = (cpfcnpj.length > 14) ? masks[1] : masks[0];
    $('.cpfcnpj').mask(mask, options);
  }
});
}

/*função valida CEP*/
function checkcep()
{
var options =  {
  onKeyPress: function(cep, e, field, options) {
    var masks = ['00000-000'];
    var mask = (cep.length>7) ? masks[1] : masks[0];
    $('.zipcode').mask(mask, options);
}};

$('.zipcode').mask('00000-000', options);
}

/*função valida Telefone*/
function checkfone()
{
var SPMaskBehavior = function (val) {
  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
spOptions = {
  onKeyPress: function(val, e, field, options) {
      field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
};

$('#fone').mask(SPMaskBehavior, spOptions);
}