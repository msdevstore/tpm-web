$(document).ready(function () {
    $('.delete-btn').click(function() {
        let id = $(this).attr('data');
        $.ajax({
            url: '/api/v1/delete_row/users/id/' + id,
            type: 'DELETE',
            success: function(res) {
                console.log(res);
                if (res === '1') {
                    toastr.success(
                        'Deleted successfully!',
                        "Success",
                        {
                            timeOut: 1000,
                            fadeOut: 1000,
                            onHidden: function () {
                                window.location.reload();
                            }
                        });
                } else toastr.warning('Something went wrong!');
            },
            error: function(err) {
                console.log(err);
                toastr.error('Failed!');
            }
        })
    })

    $('#new-btn').click(function() {
        let username = $('#username').val();
        let password = $('#password').val();
        let confirm_password = $('#confirm_password').val();
        if (!username || !password) {
            toastr.info("Enter your username and password!");
        } else if (password !== confirm_password) {
            toastr.info("Passwords not match!");
        } else {
            $.ajax({
                url: '/api/v1/users/create',
                type: 'post',
                data: {
                    username: username,
                    password: password
                },
                success: function(res) {
                    console.log(res);
                    if (res) {
                        toastr.success(
                            "Created successfully!",
                            "Success",
                            {
                                timeOut: 1000,
                                fadeOut: 1000,
                                onHidden: function () {
                                    window.location.reload();
                                }
                            });

                    } else toastr.warning("Something went wrong!");
                },
                error: function (err) {
                    console.log(err);
                    toastr.error("Failed!");
                }
            })
        }
    })
})
