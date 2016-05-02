<!-- Inicio Dados Cadastrais -->
<div class="row">
    <legend class="form-group text-info">Dados Cadastrais</legend>
</div>

<div class="row">
    <div class="form-group col-md-12">
        {!! Form::label('NOME', 'Nome:') !!}
        {!! Form::text('NOME', '', ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('IDUSER', 'CPF:') !!}
        {!! Form::text('IDUSER', '', ['class' => 'form-control', 'onkeyup' => "alta(this)]) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('NOM_USER', 'Usuário:') !!}
        {!! Form::text('NOM_USER', '', ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('SENHA', 'Senha:') !!}
        {!! Form::password('SENHA', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('SENHA2', 'Confirma Senha:') !!}
        {!! Form::password('SENHA2', ['class' => 'form-control']) !!}
    </div>
</div>
<div class="pull-left">
    <button type='submit' class="btn btn-lg btn-success"><i class="glyphicon glyphicon-ok"></i> Salvar</button>
</div>