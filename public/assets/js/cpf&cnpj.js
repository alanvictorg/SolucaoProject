// JavaScript Document
/*	********************************************************************	
	####################################################################
	Assunto = Valida��o de CPF e CNPJ
	Autor = Marcos Regis
	Data = 24/01/2006
	Vers�o = 1.0
	Compatibilidade = Todos os navegadores.
	Pode ser usado e distribu�do desde que esta linhas sejam mantidas
	====------------------------------------------------------------====
	
	Funcionamento = O script recebe como par�metro um objeto por isso 
	deve ser chamado da seguinte forma:
	E.: no evento onBlur de um campo texto
	<input name="cpf_cnpj" type="text" size="40" maxlength="18" 
	onBlur="validar(this);">
	Ao deixar o campo o evento � disparado e chama validar() com o 
	argumento "this" que representa o pr�prio objeto com todas as 
	propriedades.
	A partir da� a fun��o validar() trata a entrada removendo tudo que
	n�o for caracter num�rico e deixando apenas n�meros, portanto
	valores escritos s� com n�meros ou com separadores como '.' ou mesmo
	espa�os s�o aceitos
	ex.: 111222333/44, 111.222.333-44, 111 222 333 44 ser�o tratadoc como
	11122233344 (para CPFs)
	De certa forma at� mesmo valores como 111A222B333C44 ser� aceito mas
	aconselho a usar a fun��o soNums() que encotra-se aqui mesmo para
	que o campo s� aceite caracteres num�ricos.
	Para usar a fun��o soNums() chame-a no evento onKeyPress desta forma
	onKeyPress="return soNums(event);"
	Ap�s limpar o valor verificamos seu tamanho que deve ser ou 11 ou 14
	Se o tamanho n�o for aceito a fun��o retorna false e [opcional] 
	mostra uma mensagem de erro.
	Sugest�es e coment�rios marcos_regis@hotmail.com
	####################################################################
	********************************************************************	*/

// a fun��o principal de valida��o
function validar(obj) { // recebe um objeto
	var s = (obj.val()).replace(/\D/g,'');

	var tam=(s).length; // removendo os caracteres n�o num�ricos
	if (!(tam==11 || tam==14)){ // validando o tamanho
		$('.doc').remove();
		$(obj).parent().addClass('has-warning');
		$(obj).parent().append("<small class='text-danger doc'>tamanho inválido</small>");
		return false;
	}
	
// se for CPF
if (tam==11 ){
		if (!validaCPF(s)){ // chama a fun��o que valida o CPF
			$('.doc').remove();
			$(obj).parent().addClass('has-warning');
			$(obj).parent().append("<small class='text-danger doc'>Cpf inválido</small>");
			return false;
		}
		$('.doc').remove();
		$(obj).parent('div').parent('div').removeClass('has-warning');
			$(obj).parent().append("<small class='text-success doc'>Cpf válido</small>");

		obj.value=maskCPF(s);	// se validou o CPF mascaramos corretamente
		return true;
	}
	
// se for CNPJ			
if (tam==14){
		if(!validaCNPJ(s)){ // chama a fun��o que valida o CNPJ
			$('.doc').remove();
			$(obj).parent().addClass('has-warning');
			$(obj).parent().append("<small class='text-danger doc'>CNPJ invalido</small>");
		}
			$('.doc').remove();
			$(obj).parent().append("<small class='text-success doc'>CNPJ válido</small>");

		obj.value=maskCNPJ(s);	// se validou o CNPJ mascaramos corretamente
		return true;
	}
}
// fim da funcao validar()

// fun��o que valida CPF
// O algor�timo de valida��o de CPF � baseado em c�lculos
// para o d�gito verificador (os dois �ltimos)
// N�o entrarei em detalhes de como funciona
function validaCPF(s) {
	var c = s.substr(0,9);
	var dv = s.substr(9,2);
	var d1 = 0;
	for (var i=0; i<9; i++) {
		d1 += c.charAt(i)*(10-i);
	}
	if (d1 == 0) return false;
	d1 = 11 - (d1 % 11);
	if (d1 > 9) d1 = 0;
	if (dv.charAt(0) != d1){
		return false;
	}
	d1 *= 2;
	for (var i = 0; i < 9; i++)	{
		d1 += c.charAt(i)*(11-i);
	}
	d1 = 11 - (d1 % 11);
	if (d1 > 9) d1 = 0;
	if (dv.charAt(1) != d1){
		return false;
	}
	return true;
}

// Fun��o que valida CNPJ
// O algor�timo de valida��o de CNPJ � baseado em c�lculos
// para o d�gito verificador (os dois �ltimos)
// N�o entrarei em detalhes de como funciona
function validaCNPJ(CNPJ) {
	var a = new Array();
	var b = new Number;
	var c = [6,5,4,3,2,9,8,7,6,5,4,3,2];
	for (i=0; i<12; i++){
		a[i] = CNPJ.charAt(i);
		b += a[i] * c[i+1];
	}
	if ((x = b % 11) < 2) { a[12] = 0 } else { a[12] = 11-x }
		b = 0;
	for (y=0; y<13; y++) {
		b += (a[y] * c[y]);
	}
	if ((x = b % 11) < 2) { a[13] = 0; } else { a[13] = 11-x; }
	if ((CNPJ.charAt(12) != a[12]) || (CNPJ.charAt(13) != a[13])){
		return false;
	}
	return true;
}


	// Fun��o que permite apenas teclas num�ricas
	// Deve ser chamada no evento onKeyPress desta forma
	// return (soNums(event));
	function soNums(e)
	{
		if (document.all){var evt=event.keyCode;}
		else{var evt = e.charCode;}
		if (evt <20 || (evt >47 && evt<58)){return true;}
		return false;
	}

//	fun��o que mascara o CPF
function maskCPF(CPF){
	return CPF.substring(0,3)+"."+CPF.substring(3,6)+"."+CPF.substring(6,9)+"-"+CPF.substring(9,11);
}

//	fun��o que mascara o CNPJ
function maskCNPJ(CNPJ){
	return CNPJ.substring(0,2)+"."+CNPJ.substring(2,5)+"."+CNPJ.substring(5,8)+"/"+CNPJ.substring(8,12)+"-"+CNPJ.substring(12,14);	
}