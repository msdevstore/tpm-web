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
                    if (res === 1) alert('Device added successfully!');
                    else alert('Something went wrong!');
                },
                error: function(err) {
                    console.log(err);
                    alert('Failed');
                }
            })
        }
    })
})
