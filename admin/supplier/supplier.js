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
            alamat: { 
                validators: {
                    notEmpty: {
                        message: 'alamat Harus Diisi'
                    }
                }
            },
            kota: { 
                validators: {
                    notEmpty: {
                        message: 'kota Harus Diisi'
                    }
                }
            },
            no_kontak: { 
                validators: {
                    notEmpty: {
                        message: 'No Kontak Harus Diisi'
                    }
                }
            }
        }
});

});