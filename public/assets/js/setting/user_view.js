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
                if (res) toastr.success(
                    "Updated successfully!",
                    "Success",
                    {
                        timeOut: 1000,
                        fadeOut: 1000,
                        onHidden: function () {
                            window.location.reload();
                        }
                    });
                else toastr.info("Something went wrong!");
            },
            error: function(err) {
                console.log(err);
                toastr.error("Failed!")
            }
        })
    })

    $('#update-btn').click(function() {
        let username = $('#username').val();
        let password = $('#password').val();
        let id = $('#user_id').val();
        if (!username || !password || !id) toastr.info("Username or password are required!");
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
                    if (res === 2) toastr.info("The username is already using!");
                    else if(res === 0) toastr.warning("Something went wrong!");
                    else {
                        toastr.success(
                            "Updated successfully!",
                            "Success",
                            {
                                timeOut: 1000,
                                fadeOut: 1000,
                                onHidden: function () {
                                    window.location.reload();
                                }
                            });
                    }
                },
                error: function(err) {
                    console.log(err);
                    toastr.error("Failed!");
                }
            })
        }
    })

    $('#return-btn').click(function() {
        window.history.back()
    })
})
