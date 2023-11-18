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
                    alert("Paused job updated successfully!");
                    window.location.reload();
                }
                else alert("Something went wrong!");
            },
            error: function(err) {
                console.log(err);
                alert("Failed!");
            }
        })
    })
})
