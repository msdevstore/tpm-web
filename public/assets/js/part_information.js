$(document).ready(function() {
    $(document).on('click', '.main-table-btn', function (e) {
        if ($(e.target)[0].localName === 'td') {
            let part = $(e.target).parent().attr('data');

            let obj = objArr.filter(item => item.part == part)[0];
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
        $('#part').val(obj.part);
        $('#cust_id').val(obj.cust_id).change();
        // $('#allocated').prop('checked', obj.allocated === 1 ? true : false);
        $('#description').val(obj.description);
        $('#dim').val(obj.dim);
        $('#dim_plus').val(obj.dim_plus);
        $('#dim_minus').val(obj.dim_minus);
        $('#gage').val(obj.gage).change();
        $('#pattern').val(obj.pattern).change();
        $('#holes').val(obj.holes).change();
        $('#centers').val(obj.centers).change();
        $('#cutoff_length').val(obj.cutoff_length);
        $('#cutoff_length_plus').val(obj.cutoff_length_plus);
        $('#cutoff_length_minus').val(obj.cutoff_length_minus);
        $('#finished_length').val(obj.finished_length);
        $('#length_plus').val(obj.length_plus);
        $('#length_minus').val(obj.length_minus);
        $('#strip').val(obj.strip);
    }

    $('#main-table-show').click(function() {
        // $('#orders-table').toggleClass("d-table");
        $('#main-table').slideToggle();
    })

    $('#main-table-save').click(function() {
        let obj = {
            part: $('#part').val(),
            cust_id: $('#cust_id').val(),
            description: $('#description').val(),
            dim: $('#dim').val(),
            dim_plus: $('#dim_plus').val(),
            // allocated: $('#allocated').prop('checked') ? 1 : 0,
            dim_minus: $('#dim_minus').val(),
            gage: $('#gage').val(),
            pattern: $('#pattern').val(),
            holes: $('#holes').val(),
            centers: $('#centers').val(),
            cutoff_length: $('#cutoff_length').val(),
            cutoff_length_plus: $('#cutoff_length_plus').val(),
            cutoff_length_minus: $('#cutoff_length_minus').val(),
            finished_length: $('#finished_length').val(),
            length_plus: $('#length_plus').val(),
            length_minus: $('#length_minus').val(),
            strip: $('#strip').val(),
        }

        let flag = false;
        Object.keys(obj).forEach(key => {
            if (obj[key] === '') flag = true;
        })
        if (flag) toastr.info("Please input all data!");
        else {
            $.ajax({
                url: '/api/v1/part_tbl/create',
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
                        });
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
        let part = $('#part').val();
        if (part) {
            $.ajax({
                url: `/api/v1/delete_row/part_tbl/part/${part}`,
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
            toastr.info("You didn't select any data!")
        }

    })

    $('#main-table-format').click(function() {
        $('#part').val('');
        $('#cust_id').val('').change();
        $('#description').val('');
        $('#dim').val('').change();
        // $('#allocated').prop('checked', false);
        $('#dim_plus').val('');
        $('#dim_minus').val('');
        $('#gage').val('').change();
        $('#pattern').val('').change();
        $('#holes').val('').change();
        $('#centers').val('').change();
        $('#cutoff_length').val('');
        $('#cutoff_length_plus').val('');
        $('#cutoff_length_minus').val('');
        $('#finished_length').val('');
        $('#length_plus').val('');
        $('#length_minus').val('');
        $('#strip').val('');
        toastr.success("You can add new data now!", "Success");
    })

})
