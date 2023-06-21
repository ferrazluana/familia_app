import AppForm from '../app-components/Form/AppForm';

Vue.component('membro-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome:  '' ,
                data_nascimento:  '' ,
                celular:  '' ,
                endereco:  '' ,
                estado_civil:  '' ,
                batizado:  false ,
                lider:  false ,
                pastor:  false ,
                personalidade:  '' ,
                linguagem_amor:  '' ,
                enabled:  false ,
                
            }
        }
    }

});