$(document).ready(function (){
    $('#myForm').validate({
        rules: {
            username: {
                required : true,
            },
            password: {
                required : true,
            },
            confirm_password: {
                required : true,
            },
            name: {
                required : true,
            },
            role_id: {
                required : true,
            },
            firstname: {
                required : true,
            },
            lastname: {
                required : true,
            },
            email: {
                required : true,
            },
            contact_number: {
                required : true,
            },
            company_name: {
                required : true,
            },
            drug_classification_name: {
                required : true,
            },
            classification_id: {
                required : true,
            },
            medicine_name: {
                required : true,
            },
            generic_name: {
                required : true,
            },
            category_id: {
                required : true,
            }
            start_date: {
                required : true,
            }
        },
        messages :{
            username: {
                required : 'Fields are required',
            },
            password: {
                required : 'Fields are required',
            },
            confirm_password: {
                required : 'Fields are required',
            },
            name: {
                required : 'Fields are required',
            },
            company_name: {
                required : 'Fields are required',
            },
            role_id: {
                required : 'Fields are required',
            },
            firstname: {
                required : 'Fields are required',
            },
            lastname: {
                required : 'Fields are required',
            },
            email: {
                required : 'Fields are required',
            },
            contact_number: {
                required : 'Fields are required',
            },
            drug_classification_name: {
                required : 'Fields are required',
            },
            classification_id: {
                required : 'Fields are required',
            },
            medicine_name: {
                required : 'Fields are required',
            },
            generic_name: {
                required : 'Fields are required',
            },
            category_id: {
                required : 'Fields are required',
            }
            start_date: {
                required : 'Fields are required',
            },
        },
        errorElement : 'span',
        errorPlacement: function (error,element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight : function(element, errorClass, validClass){
            $(element).addClass('is-invalid');
        },
        unhighlight : function(element, errorClass, validClass){
            $(element).removeClass('is-invalid');
        },
    });
});
