<div class="row">
    {{-- descricao do post --}}
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Nome', ['class' => '']) !!}
            {!! Form::text('name',   null, ['class' => 'form-control', 'placeholder'=>'Digite o Nome']) !!}
            <small class="text-danger">{{ $errors->first('name') }}</small>
        </div>
    </div>
    {{-- descricao do post --}}
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::label('email', 'E-mail', ['class' => '']) !!}
            {!! Form::email('email',   null, ['class' => 'form-control', 'placeholder'=>'Digite o E-Mail']) !!}
            <small class="text-danger">{{ $errors->first('email') }}</small>
        </div>
    </div>{{-- descricao do post --}}
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label('password', 'Senha', ['class' => '']) !!}
            {!! Form::password('password', ['class' => 'form-control', 'placeholder'=>'Digite a senha']) !!}
            <small class="text-danger">{{ $errors->first('password') }}</small>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
            {!! Form::label('role_id', 'Senha', ['class' => 'form-label']) !!}
            {!! Form::select('role_id', $roles ,isset($user)? $user->roles->first()->id : null,['id'=>'role_id','class' => 'form-control', 'placeholder'=>'Escolha a função']) !!}
            <small class="text-danger">{{ $errors->first('role_id') }}</small>
        </div>
    </div>
</div>
