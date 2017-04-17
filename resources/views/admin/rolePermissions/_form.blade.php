<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('permission_id') ? ' has-error' : '' }}">
            {!! Form::label('permission_id', 'Senha', ['class' => 'form-label']) !!}
            {!! Form::hidden('role_id', $role->id ) !!}
            {!! Form::select('permission_id', $permission , null,['id'=>'role_id','class' => 'form-control', 'placeholder'=>'Escolha uma permissão']) !!}
            <small class="text-danger">{{ $errors->first('permission_id') }}</small>
        </div>
    </div>
</div>
