<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ministerio.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.ministerio.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ministerio.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('lider'), 'has-success': fields.lider && fields.lider.valid }">
    <label for="lider" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ministerio.columns.lider') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.lider" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('lider'), 'form-control-success': fields.lider && fields.lider.valid}" id="lider" name="lider" placeholder="{{ trans('admin.ministerio.columns.lider') }}">
        <div v-if="errors.has('lider')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('lider') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('colider'), 'has-success': fields.colider && fields.colider.valid }">
    <label for="colider" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ministerio.columns.colider') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.colider" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('colider'), 'form-control-success': fields.colider && fields.colider.valid}" id="colider" name="colider" placeholder="{{ trans('admin.ministerio.columns.colider') }}">
        <div v-if="errors.has('colider')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('colider') }}</div>
    </div>
</div>


