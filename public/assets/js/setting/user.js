$(document).ready(function () {
    $('.delete-btn').click(function() {
        let id = $(this).attr('data');
        $.ajax({
            url: '/api/v1/delete_row/users/id/' + id,
            type: 'DELETE',
            success: function(res) {
                console.log(res);
                if (res === '1') {
                    alert('Deleted successfully!');
                    window.location.reload();
                } else alert('Something went wrong!');
            },
            error: function(err) {
                console.log(err);
                alert('Failed!');
            }
        })
    })

    $('#new-btn').click(function() {
        let username = $('#username').val();
        let password = $('#password').val();
        let confirm_password = $('#confirm_password').val();
        if (!username || !password) {
            alert("Enter your username and password!");
        } else if (password !== confirm_password) {
            alert("Passwords not match!");
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
                        alert("Created successfully!");
                        window.location.reload()

                    } else alert("Something went wrl");
                },
                error: function (err) {
                    console.log(err);
                    alert("Failed!");
                }
            })
        }
    })
})
