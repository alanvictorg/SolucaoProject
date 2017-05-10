@extends('layouts.base')
@section('page_styles')


@endsection

@section('content')
    <article class="content items-list-page">
        <div class="title-search-block">
            <div class="title-block">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="title">
                            @include('errors._check')

                            Importações de Arquivos
                            @can("$module_name-create")
                                <a href="#" data-toggle="modal" data-target="#createmodal"
                                   class="btn btn-primary btn-sm rounded-s"><i class="fa fa-plus icon"></i> Adicionar um
                                    novo</a>
                                @include("admin.$module_name._create")
                            @endcan
                        </h3>
                        <p class="title-description"> Importações </p>
                    </div>
                </div>
            </div>
            @include('layouts.search')
        </div>
        <div class="card items">
            <ul class="item-list striped">
                <li class="item item-list-header hidden-sm-down">
                    <div class="item-row">
                        <div class="item-col item-col-header item-col-name">
                            <div><span>Empresa</span></div>
                        </div>
                        <div class="item-col item-col-header item-col-name">
                            <div><span>Nome do Arquivo</span></div>
                        </div>
                        <div class="item-col item-col-header item-col-created">
                            <div class="no-overflow"><span> Criado há </span></div>
                        </div>

                    </div>
                </li>
                <li class="item">
                    @forelse($imports as $row)
                        <div class="item-row">

                            <div class="item-col item-col-name">
                                <div class="item-heading">Nome</div>
                                <div>
                                    @if($row->status == 0 )
                                    <a href="{{ route("$module_name.show",[$row]) }}" class="">
                                        <h4 class="item-title">
                                            {{ $row->company->name }}
                                        </h4>
                                    </a>
                                        @else
                                        <h4 class="item-title">
                                            {{ $row->company->name }}
                                        </h4>
                                    @endif
                                </div>
                            </div>
                            <div class="item-col item-col-name">
                                <div class="item-heading">Nome</div>
                                <div>
                                    @if($row->status == 0 )
                                        <a href="{{ route("$module_name.show",[$row]) }}" class="">
                                            <h4 class="item-title">
                                                Precisa Sincronizar
                                            </h4>
                                        </a>
                                    @else
                                        <h4 class="item-title">
                                            {{ $row->project->Title }}
                                        </h4>
                                    @endif
                                </div>
                            </div>
                            <div class="item-col item-col-email">

                                <div> {{ $row->created_at->diffForHumans() }} </div>
                            </div>

                        </div>

                    @empty
                        Não há dados para exibir
                    @endforelse
                </li>
            </ul>
        </div>
        <nav class="text-xs-right">
            {!!  $imports->appends(['sort'=>'id'])->links() !!}
        </nav>
    </article>

@endsection

@section('page_scripts')
    <!-- Load JS here for greater good =============================-->
    {{--<script>--}}
    {{--$('document').ready(function () {--}}

    {{--$('#role_id').select2();--}}
    {{--});--}}

    {{--</script>--}}
@endsection