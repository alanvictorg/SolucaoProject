<div class="modal fade" id="createmodal" data-backdrop='false'>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Novo Projeto</h4>
            </div>
            <div class="modal-body">
                @include('errors._check')
                {!! Form::open(['url'=> route('imports.store'), 'class'=>'dropzone', 'files'=>true]) !!}
                    <div class="dz-message" data-dz-message><span>Escolha o arquivo XML</span></div>
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
                </form>

            </div>
            {{-- /.modal-body --}}
            <div class="modal-footer">
                <div id="category-success">

                </div>
            </div>
        </div>
    </div>
</div>
