<input type="hidden" name="client_type" value="{{$clientType}}">
<div class="form-group">
    {{ Form::label('name', 'Nome') }}
    <!-- <label for="name">Nome</label> -->
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    <!-- {{ Form::text('name', old('name', $client->name), ['class' => 'form-control']) }} -->
    <!-- <input class="form-control" id="name" name="name" value="{{old('name', $client->name)}}"> -->
</div>

<div class="form-group">
    {{ Form::label('document_number', 'Documento') }}
    <!-- <label for="document_number">Documento</label> -->
    {{ Form::text('document_number', null, ['class' => 'form-control']) }}
    <!-- {{ Form::text('document_number', old('document_number', $client->document_number), ['class' => 'form-control']) }} -->
    <!-- <input class="form-control" id="document_number" name="document_number"
           value="{{old('document_number', $client->document_number)}}"> -->
</div>

<div class="form-group">
    {{ Form::label('email', 'E-mail') }}
    <!-- <label for="email">E-mail</label> -->
    {{ Form::email('email', null, ['class' => 'form-control']) }}
    <!-- {{ Form::email('email', old('email', $client->email), ['class' => 'form-control']) }} -->
    <!-- <input class="form-control" id="email" name="email" type="email" value="{{old('email', $client->email)}}"> -->
</div>

<div class="form-group">
    {{ Form::label ('phone', 'Telefone') }}
    <!-- <label for="phone">Telefone</label> -->
    {{ Form::text('phone', null, ['class' => 'form-control']) }}
    <!-- {{ Form::text('phone', old('phone', $client->phone), ['class' => 'form-control']) }} -->
    <!-- <input class="form-control" id="phone" name="phone" value="{{old('phone', $client->phone)}}"> -->
</div>

@if($clientType == \App\Client::TYPE_INDIVIDUAL)
    <!-- @php
        $maritalStatus = $client->marital_status;
    @endphp -->
    <div class="form-group">
        {{ Form::label('marital_status', 'Estado Civil') }}
        <!-- <label for="marital_status">Estado Civil</label> -->
        {{
            Form::select('marital_status', [
                '' => 'Selecione o estado civil',
                1  => 'Solteiro',
                2  => 'Casado',
                3  => 'Divorciado'
                ], null, ['class' => 'form-control'])
        }}
        <!-- <select class="form-control" name="marital_status" id="marital_status" value="{{$maritalStatus}}">
            <option value="">Selecione o estado civil</option>
            <option value="1" {{old('marital_status',$maritalStatus) == 1 ? 'selected="selected"' : ''}}>Solteiro</option>
            <option value="2" {{old('marital_status',$maritalStatus) == 2 ? 'selected="selected"' : ''}}>Casado</option>
            <option value="3" {{old('marital_status',$maritalStatus) == 3 ? 'selected="selected"' : ''}}>Divorciado
            </option>
        </select> -->
    </div>
    <div class="form-group">
        {{ Form::label('date_birth', 'Data Nasc.') }}
        <!-- <label for="date_birth">Data Nasc.</label> -->
        {{ Form::date('date_birth', null, ['class' => 'form-control']) }}
        <!-- {{ Form::date('date_birth', old('date_birth', $client->date_birth), ['class' => 'form-control']) }} -->
        <!-- <input class="form-control" id="date_birth" name="date_birth" type="date" value="{{old('date_birth', $client->date_birth)}}"> -->
    </div>

    @php
        $sex = $client->sex;
    @endphp
    <div class="radio">
        <label>
            {{ Form::radio('sex', 'm') }} Masculino
            <!-- {{ Form::radio('sex', 'm', old('sex', $sex) == 'm') }} Masculino -->
            <!-- <input type="radio" name="sex" value="m" {{old('sex', $sex) == 'm' ? 'checked="checked"' : ''}}> Masculino -->
        </label>
    </div>

    <div class="radio">
        <label>
            {{ Form::radio('sex', 'f') }} Feminino
            <!-- {{ Form::radio('sex', 'f', old('sex', $sex) == 'f') }} Feminino -->
            <!-- <input type="radio" name="sex" value="f" {{old('sex', $sex) == 'f' ? 'checked="checked"' : ''}}> Feminino -->
        </label>
    </div>

    <div class="form-group">
        {{ Form::label('physical_disability', 'Deficiência Física') }}
        <!-- <label for="physical_disability">Deficiência Física</label> -->
        {{ Form::text('physical_disability', null, ['class' => 'form-control']) }}
        <!-- {{ Form::text('physical_disability', old('physical_disability', $client->physical_disability), ['class' => 'form-control']) }} -->
        <!-- <input class="form-control" id="physical_disability" name="physical_disability"
            value="{{old('physical_disability', $client->physical_disability)}}"> -->
    </div>
@else
    <div class="form-group">
        {{ Form::label('company_name', 'Nome Fantasia') }}
        <!-- <label for="company_name">Nome Fantasia</label> -->
        {{ Form::text('company_name', null, ['class' => 'form-control']) }}
        <!-- {{ Form::text('company_name', old('company_name', $client->company_name), ['class' => 'form-control']) }} -->
        <!-- <input class="form-control" id="company_name" name="company_name" value="{{old('company_name', $client->company_name)}}"> -->
    </div>
@endif
<div class="checkbox">
    <label>
        {{ Form::checkbox('defaulter') }} Inadimplente?
        <!-- {{ Form::checkbox('defaulter', 0, old('defaulter', $client->defaulter)) }} Inadimplente? -->
        <!-- <input id="defaulter" name="defaulter" type="checkbox" {{old('defaulter', $client->defaulter) ? 'checked="checked"' : ''}}>
        Inadimplente? -->
    </label>
</div>