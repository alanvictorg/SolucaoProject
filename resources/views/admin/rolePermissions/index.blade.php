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

                            Permissões da {{ $role->label }}
                            @can('role-permission-create')
                                <a href="#" data-toggle="modal" data-target="#createmodal"
                                   class="btn btn-primary btn-sm rounded-s"><i class="fa fa-plus icon"></i> Adicionar um
                                    novo</a>
                                @include('admin.rolePermissions._create')
                            @endcan
                        </h3>
                        <p class="title-description"> Lista de Permissões </p>
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
                            <div><span>Nome</span></div>
                        </div>

                        <div class="item-col item-col-header item-col-created">
                            <div class="no-overflow"><span> Criado há </span></div>
                        </div>
                        <div class="item-col item-col-header fixed item-col-actions-dropdown"> Ações</div>
                    </div>
                </li>
                <li class="item">
                    @forelse($rolePermissions as $row)
                        <div class="item-row">

                            <div class="item-col item-col-name">
                                <div class="item-heading">Nome</div>
                                <div>

                                        <h4 class="item-title">
                                            {{ $row->label }}
                                        </h4>
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
                                            @can('user-delete')
                                                <li>
                                                    <a class="remove remove-item" data-value="{{$row->id}}"> <i
                                                                class="fa fa-trash-o "></i> </a>
                                                    @include('layouts.form_delete')
                                                </li>
                                            @endcan
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
            {!!  $rolePermissions->appends(['sort'=>'id'])->links() !!}
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