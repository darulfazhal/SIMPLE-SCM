$(document).ready(function() {
    $('#form_validation').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nama_produk: { 
                validators: {
                    notEmpty: {
                        message: 'Nama Harus Diisi'
                    }
                }
            },
            harga_produk: { 
                validators: {
                    notEmpty: {
                        message: 'Harga Harus Diisi'
                    },
                    numeric: {
                        message: 'Harga Harus Numeric'
                    }
                }
            },
            id_jenis_produk: { 
                validators: {
                    notEmpty: {
                        message: 'Jenis Produk Harus Dipilih'
                    }
                }
            }
            
        }
    });

    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML =   '<a href="javascript:void(0);" '+
                        'class="remove_button" title="Remove field">'+
                           ' <img src="produk/images/remove-icon.png"/>'+
                       ' </a>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $
            $(wrapper).append($(".master-field").clone().append(fieldHTML).removeClass("master-field")); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});