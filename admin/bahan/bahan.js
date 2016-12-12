$(document).ready(function() {
    $('#form_validation').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nama_bahan: { 
                validators: {
                    notEmpty: {
                        message: 'Nama Harus Diisi'
                    }
                }
            },
            harga_satuan_bahan: { 
                validators: {
                    notEmpty: {
                        message: 'Harga Harus Diisi'
                    },
                    numeric: {
                        message: 'Harga Harus Numeric'
                    }
                }
            }
        }
});

});