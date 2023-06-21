<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
    <label for="nome" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.membro.columns.nome') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nome" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}" id="nome" name="nome" placeholder="{{ trans('admin.membro.columns.nome') }}">
        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_nascimento'), 'has-success': fields.data_nascimento && fields.data_nascimento.valid }">
    <label for="data_nascimento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.membro.columns.data_nascimento') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <datetime v-model="form.data_nascimento" :config="datePickerConfig" class="flatpickr" v-validate="'required'" @input="validate($event)" :class="{'form-control-danger': errors.has('data_nascimento'), 'form-control-success': fields.data_nascimento && fields.data_nascimento.valid}" id="data_nascimento" name="data_nascimento" placeholder="{{ trans('admin.membro.columns.data_nascimento') }}"></datetime>
        <!-- <input type="text" v-model="form.data_nascimento" > -->
        <div v-if="errors.has('data_nascimento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_nascimento') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('celular'), 'has-success': fields.celular && fields.celular.valid }">
    <label for="celular" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.membro.columns.celular') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.celular" v-validate="''" id="celular" name="celular"></textarea>
        </div>
        <div v-if="errors.has('celular')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('celular') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('endereco'), 'has-success': fields.endereco && fields.endereco.valid }">
    <label for="endereco" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.membro.columns.endereco') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.endereco" v-validate="''" id="endereco" name="endereco"></textarea>
        </div>
        <div v-if="errors.has('endereco')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('endereco') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('estado_civil'), 'has-success': fields.estado_civil && fields.estado_civil.valid }">
    <label for="estado_civil" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.membro.columns.estado_civil') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <!-- <div>
            <textarea class="form-control" v-model="form.estado_civil" v-validate="''" id="estado_civil" name="estado_civil"></textarea>
        </div> -->
        <multiselect v-model="form.estado_civil" :options="{{ json_encode($estado_civil) }}" placeholder="Select Roles" label="name" track-by="id" id="estado_civil" name="estado_civil" :multiple="false"></multiselect>
        <div v-if="errors.has('estado_civil')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('estado_civil') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('batizado'), 'has-success': fields.batizado && fields.batizado.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="batizado" type="checkbox" v-model="form.batizado" v-validate="''" data-vv-name="batizado"  name="batizado_fake_element">
        <label class="form-check-label" for="batizado">
            {{ trans('admin.membro.columns.batizado') }}
        </label>
        <input type="hidden" name="batizado" :value="form.batizado">
        <div v-if="errors.has('batizado')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('batizado') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('lider'), 'has-success': fields.lider && fields.lider.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="lider" type="checkbox" v-model="form.lider" v-validate="''" data-vv-name="lider"  name="lider_fake_element">
        <label class="form-check-label" for="lider">
            {{ trans('admin.membro.columns.lider') }}
        </label>
        <input type="hidden" name="lider" :value="form.lider">
        <div v-if="errors.has('lider')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('lider') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('pastor'), 'has-success': fields.pastor && fields.pastor.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="pastor" type="checkbox" v-model="form.pastor" v-validate="''" data-vv-name="pastor"  name="pastor_fake_element">
        <label class="form-check-label" for="pastor">
            {{ trans('admin.membro.columns.pastor') }}
        </label>
        <input type="hidden" name="pastor" :value="form.pastor">
        <div v-if="errors.has('pastor')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('pastor') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('personalidade'), 'has-success': fields.personalidade && fields.personalidade.valid }">
    <label for="personalidade" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.membro.columns.personalidade') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <!-- <div>
            <textarea class="form-control" v-model="form.personalidade" v-validate="''" id="personalidade" name="personalidade"></textarea>
        </div> -->
        <multiselect v-model="form.personalidade" :options="{{ json_encode($disc) }}" placeholder="Select Roles" label="name" track-by="id" id="personalidade" name="personalidade" :multiple="true"></multiselect>

        <div v-if="errors.has('personalidade')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('personalidade') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('linguagem_amor'), 'has-success': fields.linguagem_amor && fields.linguagem_amor.valid }">
    <label for="linguagem_amor" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.membro.columns.linguagem_amor') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <!-- <div>
            <textarea class="form-control" v-model="form.linguagem_amor" v-validate="''" id="linguagem_amor" name="linguagem_amor"></textarea>
        </div> -->
        <multiselect v-model="form.linguagem_amor" :options="{{ json_encode($linguagem_amor) }}" placeholder="Select Roles" label="name" track-by="id" id="linguagem_amor" name="linguagem_amor" :multiple="true"></multiselect>

        <div v-if="errors.has('linguagem_amor')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('linguagem_amor') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.membro.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>


