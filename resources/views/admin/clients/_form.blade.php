{{ Form::hidden('client_type', $clientType) }}
<!-- <input type="hidden" name="client_type" value="{{$clientType}}"> -->
@component('form._form_group', ['field' => 'name'])
    {{ Form::label('name', 'Nome', ['class' => 'control-label']) }}
    <!-- <label for="name">Nome</label> -->
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    <!-- {{ Form::text('name', old('name', $client->name), ['class' => 'form-control']) }} -->
    <!-- <input class="form-control" id="name" name="name" value="{{old('name', $client->name)}}"> -->
@endcomponent

@component('form._form_group', ['field' => 'document_number'])
    {{ Form::label('document_number', 'Documento', ['class' => 'control-label']) }}
    <!-- <label for="document_number">Documento</label> -->
    {{ Form::text('document_number', null, ['class' => 'form-control']) }}
    <!-- {{ Form::text('document_number', old('document_number', $client->document_number), ['class' => 'form-control']) }} -->
    <!-- <input class="form-control" id="document_number" name="document_number"
           value="{{old('document_number', $client->document_number)}}"> -->
@endcomponent

@component('form._form_group', ['field' => 'email'])
    {{ Form::label('email', 'E-mail', ['class' => 'control-label']) }}
    <!-- <label for="email">E-mail</label> -->
    {{ Form::email('email', null, ['class' => 'form-control']) }}
    <!-- {{ Form::email('email', old('email', $client->email), ['class' => 'form-control']) }} -->
    <!-- <input class="form-control" id="email" name="email" type="email" value="{{old('email', $client->email)}}"> -->
@endcomponent

@component('form._form_group', ['field' => 'phone'])
    {{ Form::label ('phone', 'Telefone', ['class' => 'control-label']) }}
    <!-- <label for="phone">Telefone</label> -->
    {{ Form::text('phone', null, ['class' => 'form-control']) }}
    <!-- {{ Form::text('phone', old('phone', $client->phone), ['class' => 'form-control']) }} -->
    <!-- <input class="form-control" id="phone" name="phone" value="{{old('phone', $client->phone)}}"> -->
@endcomponent

@if($clientType == \App\Client::TYPE_INDIVIDUAL)
    <!-- @php
        $maritalStatus = $client->marital_status;
    @endphp -->
    @component('form._form_group', ['field' => 'marital_status'])
        {{ Form::label('marital_status', 'Estado Civil', ['class' => 'control-label']) }}
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
    @endcomponent

    @component('form._form_group', ['field' => 'date_birth'])
        {{ Form::label('date_birth', 'Data Nasc.', ['class' => 'control-label']) }}
        <!-- <label for="date_birth">Data Nasc.</label> -->
        {{ Form::date('date_birth', null, ['class' => 'form-control']) }}
        <!-- {{ Form::date('date_birth', old('date_birth', $client->date_birth), ['class' => 'form-control']) }} -->
        <!-- <input class="form-control" id="date_birth" name="date_birth" type="date" value="{{old('date_birth', $client->date_birth)}}"> -->
    @endcomponent

    @php
        $sex = $client->sex;
    @endphp
    <div class="radio{{$errors->has('sex') ? ' has-error' : ''}}">
        <label>
            {{ Form::radio('sex', 'm') }} Masculino
            <!-- {{ Form::radio('sex', 'm', old('sex', $sex) == 'm') }} Masculino -->
            <!-- <input type="radio" name="sex" value="m" {{old('sex', $sex) == 'm' ? 'checked="checked"' : ''}}> Masculino -->
        </label>
    </div>

    <div class="radio{{$errors->has('sex') ? ' has-error' : ''}}">
        <label>
            {{ Form::radio('sex', 'f') }} Feminino
            <!-- {{ Form::radio('sex', 'f', old('sex', $sex) == 'f') }} Feminino -->
            <!-- <input type="radio" name="sex" value="f" {{old('sex', $sex) == 'f' ? 'checked="checked"' : ''}}> Feminino -->
        </label>
    </div>

    <div class="{{$errors->has('sex') ? ' has-error' : ''}}">
        @include('form._help_block', ['field' => $sex])
    </div>

    @component('form._form_group', ['field' => 'physical_disability'])
        {{ Form::label('physical_disability', 'Deficiência Física', ['class' => 'control-label']) }}
        <!-- <label for="physical_disability">Deficiência Física</label> -->
        {{ Form::text('physical_disability', null, ['class' => 'form-control']) }}
        <!-- {{ Form::text('physical_disability', old('physical_disability', $client->physical_disability), ['class' => 'form-control']) }} -->
        <!-- <input class="form-control" id="physical_disability" name="physical_disability"
            value="{{old('physical_disability', $client->physical_disability)}}"> -->
    @endcomponent
@else
    @component('form._form_group', ['field' => 'company_name'])
        {{ Form::label('company_name', 'Nome Fantasia', ['class' => 'control-label']) }}
        <!-- <label for="company_name">Nome Fantasia</label> -->
        {{ Form::text('company_name', null, ['class' => 'form-control']) }}
        <!-- {{ Form::text('company_name', old('company_name', $client->company_name), ['class' => 'form-control']) }} -->
        <!-- <input class="form-control" id="company_name" name="company_name" value="{{old('company_name', $client->company_name)}}"> -->
    @endcomponent
@endif
<div class="checkbox">
    <label>
        {{ Form::checkbox('defaulter') }} Inadimplente?
        <!-- {{ Form::checkbox('defaulter', 0, old('defaulter', $client->defaulter)) }} Inadimplente? -->
        <!-- <input id="defaulter" name="defaulter" type="checkbox" {{old('defaulter', $client->defaulter) ? 'checked="checked"' : ''}}>
        Inadimplente? -->
    </label>
</div>