$(document).ready(function() {
    $('input[type=checkbox]').change(function() {
        $.ajax({
            url: '/api/v1/users_permissions/activate',
            type: 'post',
            data: {
                'permission_id': $(this).attr('name'),
                'user_id': $(this).val(),
                'checked': $(this).prop('checked')
            },
            success: function(res) {
                console.log(res);
                if (res) alert("Updated successfully!");
                else alert("Something went wrong!");
            },
            error: function(err) {
                console.log(err);
                alert("Failed!")
            }
        })
    })

    $('#update-btn').click(function() {
        let username = $('#username').val();
        let password = $('#password').val();
        let id = $('#user_id').val();
        if (!username || !password || !id) alert("Username or password are required!");
        else {
            $.ajax({
                url: '/api/v1/users/update',
                type: 'post',
                data: {
                    username: username,
                    password: password,
                    id: id
                },
                success: function (res) {
                    console.log(res);
                    if (res === 2) alert("Username is used!");
                    else if(res === 0) alert("Something went wrong!");
                    else {
                        alert("Updated successfully!");
                        window.location.reload();
                    }
                },
                error: function(err) {
                    console.log(err);
                    alert("Failed!");
                }
            })
        }
    })

    $('#return-btn').click(function() {
        window.history.back()
    })
})
