$(document).ready(function() {
    $(document).on('click', '.main-table-btn', function (e) {
        if ($(e.target)[0].localName === 'td') {
            let quote = $(e.target).parent().attr('data');

            let obj = objArr.filter(item => item.quote == quote)[0];
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
        $('#quote').val(obj.quote);
        $('#cust_id').val(obj.cust_id).change();
        $('#fax_back').prop('checked', obj.fax_back === 1 ? true : false);
        $('#part').val(obj.part).change();
        $('#address').val(obj.address);
        $('#date').val(obj.date);
        $('#fob').val(obj.fob);
        $('#terms').val(obj.terms).change();
    }

    $('#main-table-show').click(function() {
        // $('#orders-table').toggleClass("d-table");
        $('#main-table').slideToggle();
    })

    $('#main-table-save').click(function() {
        let obj = {
            quote: $('#quote').val(),
            cust_id: $('#cust_id').val(),
            part: $('#part').val(),
            address: $('#address').val(),
            fax_back: $('#fax_back').prop('checked') ? 1 : 0,
            date: $('#date').val(),
            fob: $('#fob').val(),
            terms: $('#terms').val()
        }

        let flag = false;
        Object.keys(obj).forEach(key => {
            if (obj[key] === '') flag = true;
        })
        if (flag) toastr.info("Please input all data!!");
        else {
            $.ajax({
                url: '/api/v1/quote_tbl/create',
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
        let Id = $('#Id').val();
        if (Id) {
            $.ajax({
                url: `/api/v1/delete_row/quote_tbl/Id/${Id}`,
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
                }
            })
        } else {
            toastr.info("You didn't select any data!");
        }

    })

    $('#main-table-format').click(function() {
        $('#quote').val('');
        $('#cust_id').val('').change();
        $('#part').val('').change();
        $('#address').val('').change();
        $('#fax_back').prop('checked', false);
        $('#date').val('');
        $('#fob').val('');
        $('#terms').val('');
        toastr.success("You can add new data now!", "Success");
    })

})
