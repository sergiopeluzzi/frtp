<!-- Inicio Dados Cadastrais -->
<div class="row">
    <legend class="form-group text-info">Dados Cadastrais</legend>
</div>

<div class="row">
    <div class="form-group col-md-12">
        {!! Form::label('NOMASS', 'Nome:') !!}
        {!! Form::text('NOMASS', '', ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12">
        {!! Form::label('ENDERECO', 'Endereço:') !!}
        {!! Form::text('ENDERECO', '', ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('cidade', 'Cidade:') !!}
        {!! Form::text('cidade', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('uf', 'UF:') !!}
        {!! Form::text('uf', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('CEP', 'CEP:') !!}
        {!! Form::text('CEP', '', ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4">
        {!! Form::label('BAIRRO', 'Bairro:') !!}
        {!! Form::text('BAIRRO', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('FONE', 'Telefone:') !!}
        {!! Form::text('FONE', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('CELULAR', 'Celular:') !!}
        {!! Form::text('CELULAR', '', ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4">
        {!! Form::label('CPF', 'CPF:') !!}
        {!! Form::text('CPF', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('RG', 'RG:') !!}
        {!! Form::text('RG', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('NASCTO', 'Data Nascimento:') !!}
        {!! Form::date('NASCTO', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('PROFISSAO', 'Profissão:') !!}
        {!! Form::text('PROFISSAO', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('EMAIL', 'Email:') !!}
        {!! Form::email('EMAIL', '', ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-2">
        {!! Form::label('SEXO', 'Sexo:') !!}
        {!! Form::select('SEXO', ['M' => 'Masculino', 'F' => 'Feminino'], null, ['class' => 'form-control', 'placeholder' => 'Selecione...']) !!}
    </div>
    <div class="form-group col-md-5">
        {!! Form::label('NATURALI', 'Nascido em:') !!}
        {!! Form::text('NATURALI', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-5">
        {!! Form::label('ECIVIL', 'Estado Civil:') !!}
        {!! Form::text('ECIVIL', '', ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('PAI', 'Nome do Pai:') !!}
        {!! Form::text('PAI', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('MAE', 'Nome da Mãe:') !!}
        {!! Form::text('MAE', '', ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4 pull-right">
        {!! Form::label('DATACAD', 'Data Cadastro:') !!}
        {!! Form::date('DATACAD', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Inicio Dados Comerciais-->
<div class="gap"></div>

<div class="row">
    <legend class="form-group text-info">Dados Comerciais</legend>
</div>

<div class="row">
    <div class="form-group col-md-12">
        {!! Form::label('NOME_COM', 'Local de Trabalho:') !!}
        {!! Form::text('NOME_COM', '', ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12">
        {!! Form::label('END_COM', 'Endereço:') !!}
        {!! Form::text('END_COM', '', ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('CID_COM', 'Cidade:') !!}
        {!! Form::text('CID_COM', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('uftrab', 'UF:') !!}
        {!! Form::text('uftrab', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('CEP_COM', 'CEP:') !!}
        {!! Form::text('CEP_COM', '', ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4">
        {!! Form::label('BAI_COM', 'Bairro:') !!}
        {!! Form::text('BAI_COM', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('FONE_COM', 'Telefone:') !!}
        {!! Form::text('FONE_COM', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('FAX_COM', 'Fax:') !!}
        {!! Form::text('FAX_COM', '', ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('EMAIL_COM', 'Email:') !!}
        {!! Form::text('EMAIL_COM', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('SITE_COM', 'Site:') !!}
        {!! Form::text('SITE_COM', '', ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Início situação -->
<div class="gap"></div>

<div class="row">
    <legend class="form-group text-info">Situação</legend>
    <div class="form-group col-md-4">
        {!! Form::label('situacao', 'Situação:') !!}
        {!! Form::select('situacao', ['1' => 'Ativo', '0' => 'Inativo'], null, ['class' => 'form-control', 'placeholder' => 'Selecione...']) !!}
    </div>
    <div class="pull-right">
        <a href="#" class="btn btn-lg btn-success"><i class="glyphicon glyphicon-ok"></i> Salvar</a>
        <a href="#" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-remove"></i> Excluir</a>
        <a href="#" class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-repeat"></i> Voltar</a>
    </div>
</div>