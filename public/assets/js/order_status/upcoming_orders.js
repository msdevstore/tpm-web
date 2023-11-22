$(document).ready(function () {
    $('.device-option').change(function() {
        if (!!$(this).val()) {
            $.ajax({
                url: '/api/v1/update_upcoming_orders',
                type: 'post',
                data: {
                    job: $(this).attr('data'),
                    device: $(this).val(),
                },
                success: function(res) {
                    console.log(res);
                    if (res === 1) toastr.success(
                        'Device added successfully!',
                        "Success",
                        {
                            timeOut: 1000,
                            fadeOut: 1000,
                            onHidden: function () {
                                window.location.reload();
                            }
                        });
                    else toastr.warning('Something went wrong!');
                },
                error: function(err) {
                    console.log(err);
                    toastr.error('Failed');
                }
            })
        }
    })
})
