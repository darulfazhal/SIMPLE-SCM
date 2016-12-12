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
            username: { 
                validators: {
                    notEmpty: {
                        message: 'Username Harus Diisi'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Password Harus Diisi'
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'Password dan konfirm password tidak sama'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'Konfirm Password Harus Diisi'
                    },
                    identical: {
                        field: 'password',
                        message: 'Password dan konfirm password tidak sama'
                    }
                }
            },
            grup_id: { 
                validators: {
                    notEmpty: {
                        message: 'Grup Harus Dipilih'
                    }
                }
            }
        }
    });


     $('#form_validation_edit').formValidation({
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
            username: { 
                validators: {
                    notEmpty: {
                        message: 'Username Harus Diisi'
                    }
                }
            }, 
            grup_id: { 
                validators: {
                    notEmpty: {
                        message: 'Grup Harus Dipilih'
                    }
                }
            }
        }
    });

});