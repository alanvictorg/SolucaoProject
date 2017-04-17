@extends('layouts.dashboard')
@section('page_styles')


@endsection

@section('content')
<article class="content items-list-page">
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title">
                        Fornecedores
                        <a href="#" data-toggle="modal" data-target="#createmodal" class="btn btn-primary btn-sm rounded-s"><i class="fa fa-plus icon"></i> Adicionar um novo</a>
                        @include('layouts._create')
                        <div class="action dropdown">
                            <button class="btn  btn-sm rounded-s btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ações em Massa...
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <a class="dropdown-item" href="#"><i class="fa fa-pencil-square-o icon"></i>Mark as a draft</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirm-modal"><i class="fa fa-close icon"></i>Delete</a>
                            </div>
                        </div>
                    </h3>
                    <p class="title-description"> Lista de Clientes </p>
                </div>
            </div>
        </div>
        @include('layouts.search')
        <div class="card items">
            <ul class="item-list striped">
                <li class="item item-list-header hidden-sm-down">
                    <div class="item-row">
                        <div class="item-col fixed item-col-check"> <label class="item-check" id="select-all-items">
                            <input type="checkbox" class="checkbox">
                            <span></span>
                        </label>
                    </div>
                    <div class="item-col item-col-header item-col-name">
                        <div> <span>Nome</span> </div>
                    </div>
                    <div class="item-col item-col-header item-col-created">
                        <div class="no-overflow"> <span> Criado há </span> </div>
                    </div>
                    <div class="item-col item-col-header fixed item-col-actions-dropdown"> Ações </div>
                </div>
            </li>
            <li class="item">
                @forelse($providers as $row)
                <div class="item-row item-{{$row->id}}">
                    <div class="item-col fixed item-col-check"> <label class="item-check" id="select-all-items">
                        <input type="checkbox" class="checkbox">
                        <span></span>
                    </label>
                </div>
                <div class="item-col item-col-name">
                    <div class="item-heading">Nome</div>
                    <div>
                        <a href="{{ route('providers.edit',[$row]) }}" class="">
                            <h4 class="item-title">
                                {{ $row->provider_name }}
                            </h4> </a>
                        </div>
                    </div>
                    <div class="item-col item-col-email">

                        <div> {{ $row->created_at->diffForHumans() }} </div>
                    </div>
                    <div class="item-col fixed item-col-actions-dropdown">
                        <div class="item-actions-dropdown">
                            <a class="item-actions-toggle-btn"> <span class="inactive">
                               <i class="fa fa-cog"></i>
                           </span> <span class="active">
                           <i class="fa fa-chevron-circle-right"></i>
                       </span> </a>
                       <div class="item-actions-block">
                        <ul class="item-actions-list">
                            <li>
                                <a class="remove-item" data-value="{{$row->id}}"> <i class="fa fa-trash-o "></i> </a>

                                @include('layouts.form_delete')
                            </li>
                            <li>
                                <a class="edit" href="{{route('clients.edit',['client'=>$row])}}"> <i class="fa fa-pencil"></i> </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @empty
        Não há dados para exibir
        @endforelse
    </li>
</ul>
</div>
<nav class="text-xs-right">
    {!!  $providers->appends(['sort'=>'id'])->links() !!}
</nav>
</article>

@endsection

@section('page_scripts')
<!-- Load JS here for greater good =============================-->
{{ Html::script('js/scriptsbr.js') }}
<!-- Latest compiled and minified JavaScript -->
{{ Html::script('js/standalone/selectize.min.js') }}
{{ Html::script('js/cpf&cnpj.js') }}

<script>
    $('#uf').ufs({
        onChange: function(uf){
            $('#city').cidades({uf: uf});
        }
    });
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            $('#address').val('');
            $('#district').val('');
        }
        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                console.log(conteudo)
                //Atualiza os campos com os valores.
                $('#address').val(conteudo.logradouro);
                $('#district').val(conteudo.bairro);

            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }
        $(document).ready(function() {
            $('#cpf').mask('000.000.000-00', {reverse: true});
            $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
            $('#zipcode').mask('00.000-000');
            $('#birth').mask('00/00/0000');
            $('#phone').mask('(00)9.0000-0000');
            $('#type').blur(function () {
                var type = $('#type').val();
                if(type == 'pj')
                {
                    $('#cnpj').parent('div').parent('div').removeClass('hidden');
                    $('#cpf').parent('div').parent('div').addClass('hidden');
                }else
                {
                    $('#cnpj').parent('div').parent('div').addClass('hidden');
                    $('#cpf').parent('div').parent('div').removeClass('hidden');
                }
            });

        });
        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $('#address').val('...');
                    $('#district').val('...');

                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };
        function validarDocument(document) {
            var type = $('#type').val();
            if (type == 'pf'){ // validando o tamanho
                $('#cpnj').val('');
                retorno = validar(document)
            }else {
                $('#cpf').val('');
                retorno = validar(document)
            }


        }
    </script>


    @endsection