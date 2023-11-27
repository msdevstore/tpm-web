$(document).ready(function() {
    $("#login-button").click(function(event){
        event.preventDefault();

        const username = $('#username').val();
        const password = $('#password').val();

        if (!username) {
            toastr.info("Please enter username!", "Notice");
        } else {
            if (!password) {
                toastr.info("Please enter password!", "Notice");
            } else {
                $.ajax({
                    url: '/api/v1/login',
                    type: 'post',
                    data: {
                        username: username,
                        password: password
                    },
                    success: function(res) {
                        console.log(res);
                        if (res === "1") {
                            toastr.success(
                                "Congratulation!",
                                "Success",
                                {
                                    timeOut: 1000,
                                    fadeOut: 1000,
                                    onHidden: function () {
                                        window.location.href = "/customers";
                                    }
                                })
                        } else if (res === "0") toastr.warning("You credentials are not correct!", "Notice");
                        else toastr.warning("Something went wrong!");
                    },
                    error: function(err) {
                        console.log(res);
                        toastr.error("Failed to login!");
                    }
                })
            }
        }

    });
})


