// auth
$('.auth_btn').click(function(e) {

    e.preventDefault();

    $('input').removeClass('error');

    let login = $('input[name = "login"]').val(),
        password = $('input[name = "password"]').val();
    
    $.ajax({
        url: 'logic/singIn.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password 
        },
        success: function (data) {


            if(data.status) {
                document.location.href = '/profile.php';
            } else {

                if(data.type === 1) {
                   data.fields.forEach(field => {
                    $(`input[name = "${field}"]`).addClass('error');
                   })
                }

                $('.msg').removeClass('none').text(data.message);
            }
            
        }


    })
})
    

//reg


$('.reg_btn').click(function(e) {

    e.preventDefault();

    $('input').removeClass('error');

    let login = $('input[name = "login"]').val(),
        password = $('input[name = "password"]').val(),
        confirm = $('input[name = "confirm"]').val(),
        email = $('input[name = "email"]').val(),
        name = $('input[name = "name"]').val();
    
    $.ajax({
        url: 'logic/singUp.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password,
            confirm: confirm,
            email: email,
            name: name 
        },
        success: function (data) {


            if(data.status) {
                $('.msg').removeClass('none').text(data.message);
            } else {

                if(data.type === 1) {
                   data.fields.forEach(field => {
                    $(`input[name = "${field}"]`).addClass('error');
                   })
                }

                $('.msg').removeClass('none').text(data.message);
            }
            
        }


    })
})