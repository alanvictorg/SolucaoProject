@extends('layouts.base')
@section('page_styles')


@endsection

@section('content')
    <article class="content items-list-page">
        <div class="card items">
            <ul class="item-list striped">
                <li class="item item-list-header hidden-sm-down">
                    <div class="item-row">
                        <div class="item-col item-col-header item-col-name">
                            <div><span>Empresa</span></div>
                        </div>

                    </div>
                </li>
                <li class="item text-uppercase text-center">
                    @forelse($companies as $row)
                        <div class="item-row">
                            <a href="{!! route('projects.index', ['company'=>$row   ]) !!}">{!! $row->name !!}</a>

                        </div>


                    @empty
                        Não há dados para exibir
                    @endforelse
                </li>
            </ul>
        </div>
        <nav class="text-xs-right">
        </nav>
    </article>

@endsection

@section('page_scripts')
    <!-- Load JS here for greater good =============================-->
    {!! Html::script('assets/js/dropzone.js') !!}
    <script>
        $('document').ready(function () {
        });

    </script>
@endsection