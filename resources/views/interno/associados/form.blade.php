<!-- Inicio Dados Cadastrais -->

<div class="box box-primary" xmlns="http://www.w3.org/1999/html">
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="form-group col-md-6">
                {!! Form::label('NOMASS', 'Nome:') !!}
                {!! Form::text('NOMASS', isset($associado->NOMASS) ? $associado->NOMASS : session('NOME'), ['class' => 'form-control', 'readonly', 'onChange' => 'this.value = this.value.toUpperCase()']) !!}
            </div>
            <div class="form-group col-md-2">
                {!! Form::label('SEXO', 'Sexo:') !!}
                {!! Form::select('SEXO', ['M' => 'MASCULINO', 'F' => 'FEMININO'], null, ['class' => 'form-control', 'placeholder' => 'Selecione...']) !!}
            </div>
            <div class="form-group col-md-2">
                {!! Form::label('ECIVIL', 'Estado Civil:') !!}
                {!! Form::select('ECIVIL', ['SOLTEIRO(A)' => 'SOLTEIRO(A)', 'CASADO(A)' => 'CASADO(A)', 'SEPARADO(A)' => 'SEPARADO(A)', 'DIVORCIADO(A)' => 'DIVORCIADO(A)', 'VIÚVO(A)' => 'VIÚVO(A)'], null, ['class' => 'form-control', 'placeholder' => 'Selecione...']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                {!! Form::label('CPF', 'CPF:') !!}
                {!! Form::text('CPF', isset($associado->CPF) ? $associado->CPF : session('IDUSER'), ['class' => 'form-control', 'readonly']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('RG', 'RG:') !!}
                {!! Form::text('RG', isset($associado->RG) ? $associado->RG : NULL, ['class' => 'form-control', 'onChange' => 'this.value = this.value.toUpperCase()']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('NASCTO', 'Data Nascimento:') !!}
                {!! Form::date('NASCTO', isset($associado->NASCTO) ? $associado->NASCTO : NULL, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-8">
                {!! Form::label('ENDERECO', 'Endereço:') !!}
                {!! Form::text('ENDERECO', isset($associado->ENDERECO) ? $associado->ENDERECO : NULL, ['class' => 'form-control', 'onChange' => 'this.value = this.value.toUpperCase()']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('BAIRRO', 'Bairro:') !!}
                {!! Form::text('BAIRRO', isset($associado->BAIRRO) ? $associado->BAIRRO : NULL, ['class' => 'form-control', 'onChange' => 'this.value = this.value.toUpperCase()']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-8">
                {!! Form::label('CIDADE', 'Cidade - UF:') !!}
                <select class="form-control select2" id="CODCID" name="CODCID">
                    @if(isset($associado->CPF))
                        @foreach($cidades as $cidade)
                            @if($associado->CODCID == $cidade->CODCID )
                                <option value="{{ $cidade->CODCID }}" selected>{{ $cidade->DSCCID . ' - ' . $cidade->UFCID }}</option>
                            @endif
                                <option value="{{ $cidade->CODCID }}">{{ $cidade->DSCCID . ' - ' . $cidade->UFCID }}</option>nt
                        @endforeach
                    @else
                        @foreach($cidades as $cidade)
                            <option value="{{ $cidade->CODCID }}">{{ $cidade->DSCCID . ' - ' . $cidade->UFCID }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('CEP', 'CEP:') !!}
                {!! Form::text('CEP', isset($associado->CEP) ? $associado->CEP : NULL, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                {!! Form::label('FONE', 'Telefone Fixo:') !!}
                {!! Form::text('FONE', isset($associado->FONE) ? $associado->FONE : NULL, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('CELULAR', 'Celular:') !!}
                {!! Form::text('CELULAR', isset($associado->CELULAR) ? $associado->CELULAR : NULL, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('EMAIL', 'Email:') !!}
                {!! Form::email('EMAIL', isset($associado->EMAIL) ? $associado->EMAIL : NULL, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                {!! Form::label('PROFISSAO', 'Profissão:') !!}
                {!! Form::text('PROFISSAO', isset($associado->PROFISSAO) ? $associado->PROFISSAO : NULL, ['class' => 'form-control', 'onChange' => 'this.value = this.value.toUpperCase()']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('NATURALI', 'Nascido em:') !!}
                {!! Form::text('NATURALI', isset($associado->NATURALI) ? $associado->NATURALI : NULL, ['class' => 'form-control', 'onChange' => 'this.value = this.value.toUpperCase()']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                {!! Form::label('PAI', 'Nome do Pai:') !!}
                {!! Form::text('PAI', isset($associado->PAI) ? $associado->PAI : NULL, ['class' => 'form-control', 'onChange' => 'this.value = this.value.toUpperCase()']) !!}
            </div>
            <div class="form-group col-md-6">
                {!! Form::label('MAE', 'Nome da Mãe:') !!}
                {!! Form::text('MAE', isset($associado->MAE) ? $associado->MAE : NULL, ['class' => 'form-control', 'onChange' => 'this.value = this.value.toUpperCase()']) !!}
            </div>
        </div>
        </br>
        <legend class="form-group text-info">Dados Comerciais</legend>
        </br>
        <div class="row">
            <div class="form-group col-md-12">
                {!! Form::label('NOME_COM', 'Local de Trabalho:') !!}
                {!! Form::text('NOME_COM', isset($associado->NOME_COM) ? $associado->NOME_COM : NULL, ['class' => 'form-control', 'onChange' => 'this.value = this.value.toUpperCase()']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-8">
                {!! Form::label('END_COM', 'Endereço:') !!}
                {!! Form::text('END_COM', isset($associado->END_COM) ? $associado->END_COM : NULL, ['class' => 'form-control', 'onChange' => 'this.value = this.value.toUpperCase()']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('BAI_COM', 'Bairro:') !!}
                {!! Form::text('BAI_COM', isset($associado->BAI_COM) ? $associado->BAI_COM : NULL, ['class' => 'form-control', 'onChange' => 'this.value = this.value.toUpperCase()']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-8">
                {!! Form::label('CIDADE', 'Cidade - UF:') !!}
                <select class="form-control select2" id="CID_COM" name="CID_COM">
                    @if(isset($associado->CPF))

                        @foreach($cidades as $cidade)
                            @if($associado->CID_COM == $cidade->CODCID )
                                <option value="{{ $cidade->CODCID }}" selected>{{ $cidade->DSCCID . ' - ' . $cidade->UFCID }}</option>
                            @endif
                            <option value="{{ $cidade->CODCID }}">{{ $cidade->DSCCID . ' - ' . $cidade->UFCID }}</option>nt
                        @endforeach

                    @else
                        @foreach($cidades as $cidade)
                            <option value="{{ $cidade->CODCID }}">{{ $cidade->DSCCID . ' - ' . $cidade->UFCID }}</option>
                        @endforeach

                    @endif

                </select>
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('CEP_COM', 'CEP:') !!}
                {!! Form::text('CEP_COM', isset($associado->CEP_COM) ? $associado->CEP_COM : NULL, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                {!! Form::label('FONE_COM', 'Telefone:') !!}
                {!! Form::text('FONE_COM', isset($associado->FONE_COM) ? $associado->FONE_COM : NULL, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('FAX_COM', 'Fax:') !!}
                {!! Form::text('FAX_COM', isset($associado->FAX_COM) ? $associado->FAX_COM : NULL, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
                {!! Form::label('EMAIL_COM', 'Email:') !!}
                {!! Form::text('EMAIL_COM', isset($associado->EMAIL_COM) ? $associado->EMAIL_COM : NULL, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                {!! Form::label('SITE_COM', 'Site:') !!}
                {!! Form::text('SITE_COM', isset($associado->SITE_COM) ? $associado->SITE_COM : NULL, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>
</div><!-- /.box-body -->
<!--/#associados_create-->
