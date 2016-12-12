$(document).ready(function() {
    $('#form_validation').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nama: { 
                validators: {
                    notEmpty: {
                        message: 'Nama Harus Diisi'
                    }
                }
            },
            keterangan: { 
                validators: {
                    notEmpty: {
                        message: 'keterangan Harus Diisi'
                    }
                }
            }
        }
});

});