<div class="modal fade" id="createmodal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Novo</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url'=>route($module_name.'.store')]) !!}
                    @include($module_name.'._form')
            </div>
            {{-- /.modal-body --}}
            <div class="modal-footer">
                <div id="category-success">
                    {!! Form::submit( 'Salvar', ['class'=>'btn btn-primary pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
