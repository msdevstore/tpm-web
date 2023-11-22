$(document).ready(function() {
    $(document).on('click', '.main-table-btn', function (e) {
        if ($(e.target)[0].localName === 'td') {
            let Ring_size = $(e.target).parent().attr('data');

            let obj = objArr.filter(item => item.Ring_size == Ring_size)[0];
            updateValues(obj);

            $('#main-table').slideToggle();
            // $('#control-panel').css('display', 'flex');
        }
    })

    // $('#forward-btn').click(function () {
    //     const job = $('#job').val();
    //     let index = orders.findIndex(order => order.job == job);
    //     if (index - 1 < 0) index = orders.length - 1;
    //     updateValues(orders[index - 1]);
    // })
    //
    // $('#backward-btn').click(function () {
    //     const job = $('#job').val();
    //     let index = orders.findIndex(order => order.job == job);
    //     if (index + 1 >= orders.length) index = 0;
    //     updateValues(orders[index + 1]);
    // })

    function updateValues(obj) {
        $('#Ring_size').val(obj.Ring_size);
        $('#Excluder_size').val(obj.Excluder_size);
    }

    $('#main-table-show').click(function() {
        // $('#orders-table').toggleClass("d-table");
        $('#main-table').slideToggle();
    })

    $('#main-table-save').click(function() {
        let obj = {
            Ring_size: $('#Ring_size').val(),
            Excluder_size: $('#Excluder_size').val()
        }

        let flag = false;
        Object.keys(obj).forEach(key => {
            if (obj[key] === '') flag = true;
        })
        if (flag) toastr.info("Please input all data!");
        else {
            $.ajax({
                url: '/api/v1/create/excluder_rings/Ring_size',
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: obj,
                success: function(res) {
                    console.log(res);
                    if (res === '1') {
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
                    } else if (res === true) toastr.success(
                        "Created successfully!",
                        "Success",
                        {
                            timeOut: 1000,
                            fadeOut: 1000,
                            onHidden: function () {
                                window.location.reload();
                            }
                        }
                    );
                    else toastr.warning("Something went wrong!");
                },
                error: function(err) {
                    console.log(err);
                    toastr.error("Failed!");
                }
            })
        }
    })

    $('#main-table-delete').click(function() {
        let Ring_size = $('#Ring_size').val();
        if (Ring_size) {
            $.ajax({
                url: `/api/v1/delete_row/excluder_rings/Ring_size/${Ring_size}`,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    console.log(res);
                    if (res === '1') {
                        toastr.success(
                            "Deleted successfully!",
                            "Success",
                            {
                                timeOut: 1000,
                                fadeOut: 1000,
                                onHidden: function () {
                                    window.location.reload();
                                }
                            });
                    } else if (res === '2') {
                        toastr.warning("Can't find the data in database!");
                    }
                    else toastr.warning("Something went wrong!");
                },
                error: function(err) {
                    console.log(err);
                    toastr.error("Failed!");
                }
            })
        } else {
            toastr.info("You didn't select any data!");
        }

    })



    $('#main-table-format').click(function() {
        $('#Ring_size').val('');
        $('#Excluder_size').val('');
        toastr.success("You can add new data now!", "Success");
    })

})
