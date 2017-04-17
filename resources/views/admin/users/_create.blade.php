<div class="modal fade" id="createmodal" data-backdrop='false'>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Novo Usuário</h4>
            </div>
            <div class="modal-body">
                @include('errors._check')

                {!! Form::open(['url'=>route('users.store')]) !!}
                    @include('admin.users._form')

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
