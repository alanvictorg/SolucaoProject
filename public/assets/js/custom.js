
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
/* 1. valida campos formularios  */
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
$(document).ready(function() {
  $('.cpf').mask('000.000.000-00', {reverse: true});
  $('.rg').mask('0000.0000.000-00', {reverse: true});
  $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('.zipcode').mask('00.000-000');
  $('.birth').mask('00/00/0000');
  $('.phone').mask('(00)9.0000-0000');

});

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
/* 2. ajax remoção de items  */
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

$('.remove-item').click(function(event) {
  item_id = $(this).attr('data-value');
  element = $(this);
  swal(
  {
    title: "Tem ceteza que deseja apagar o item selecionado?",
    text: "items deletados não podem ser recuperados",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Sim, apague!",
    closeOnConfirm: true
  },
  function(){
    id = '#form-delete-'+ item_id ;
    url =  window.location+"/"+item_id ;
    data = $(id).serialize();

    $.ajax({
      headers: {
        'X-CSRF-Token': $('input[name="_token"]').val()
      },
      url: url,
      type: 'delete',
      dataType: 'json',
      data: data,
      success: function(data) {
        classe = '.item-'+item_id;
        $(classe).remove();
        swal("OK","Item apagado com sucesso",'success', 2000);
        setTimeout(location.reload(), 80);

      }
    });
  }); /* fim da funcao de callback do modal */
});

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
/* 2. função remove campo de acordo com o tipo de cliente cpf|cnpj  */
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

$('.type').change(function () {
  var type = $('#type').val();
  if(type == 'pf')
  {
    $('.pj').hide();
    $('.pf').show();
  }else
  {
   $('.pf').hide();
   $('.pj').show();
 }
});


/* cep*/

function meu_callback(conteudo) {
  if (true) 
  {
        //Atualiza os campos com os valores.
        $('.address').val(conteudo.logradouro);
        $('.district').val(conteudo.bairro);
        $('.complemento').val(conteudo.complemento);
    } //end if.
    else 
    {
        //CEP não Encontrado.
        limpa_formulário_cep();
        swal("CEP não encontrado.");
      }
    }



    function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            $('#address').val('');
            $('#district').val('');

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = '//viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

            meu_callback();

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            swal("Formato de CEP inválido.");
          }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
      }
    };

    $('#zipcode').focusout(function(event) {
      pesquisacep($(this).val());
    });

    /* valida documento*/

    // swal( $('.type').val() );

    function validarDocument(document) {
      // console.log(document);
      // swal(document);
      var type = $('.type').val();
            if (type == 'pf'){ // validando o tamanho
              $('.cnpj').val('');
              retorno = validar(document)
            }else{
              $('.cpf').val('');
              retorno = validar(document)
            }
          }

          $('.cnpj').blur(function(event) {
            validarDocument($(this));

          });

          $('.cpf').blur(function(event) {
            validarDocument($(this));
          });

