$(document).ready(function() {
    $('.select-custom').change(function() {
        let job = $(this).attr('data');
        let device = $(this).val();
        $.ajax({
            url: '/api/v1/update_paused_job',
            type: 'post',
            data: {
                job: job,
                device: device
            },
            success: function(res) {
                console.log(res);
                if (res) {
                    toastr.success(
                        "Paused job updated successfully!",
                        "Success",
                        {
                            timeOut: 1000,
                            fadeOut: 1000,
                            onHidden: function () {
                                window.location.reload();
                            }
                        });
                }
                else toastr.warning("Something went wrong!");
            },
            error: function(err) {
                console.log(err);
                toastr.error("Failed!");
            }
        })
    })
})
