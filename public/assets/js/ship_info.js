$(document).ready(function() {
    $(document).on('click', '.main-table-btn', function (e) {
        if ($(e.target)[0].localName === 'td') {
            let ship_no = $(e.target).parent().attr('data');

            let obj = objArr.filter(item => item.ship_no == ship_no)[0];
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
        $('#ship_no').val(obj.ship_no);
        $('#job').val(obj.job);
        $('#customer').val(obj.customer);
        $('#ship_to').val(obj.ship_to);
        $('#po').val(obj.po);
        $('#quantity').val(obj.quantity);
        $('#part').val(obj.part);
        $('#via').val(obj.via).change();
        $('#sh_date').val(obj.sh_date);
        $('#desc').val(obj.desc);
        $('#sold_to').val(obj.sold_to);
        $('#item').val(obj.item);
        $('#heat').val(obj.heat);
        $('#rings').prop('checked', obj.rings === 1 ? true : false);
        $('#ring_heat').val(obj.ring_heat);
        $('#list').val(obj.list);
        $('#p_cert').prop('checked', obj.p_cert === 1 ? true : false);
        $('#certs').prop('checked', obj.certs === 1 ? true : false);
    }

    $('#main-table-show').click(function() {
        // $('#orders-table').toggleClass("d-table");
        $('#main-table').slideToggle();
    })

    $('#main-table-save').click(function() {
        let obj = {
            ship_no: $('#ship_no').val(),
            job: $('#job').val(),
            customer: $('#customer').val(),
            ship_to: $('#ship_to').val(),
            po: $('#po').val(),
            quantity: $('#quantity').val(),
            part: $('#part').val(),
            via: $('#via').val(),
            sh_date: $('#sh_date').val(),
            desc: $('#desc').val(),
            sold_to: $('#sold_to').val(),
            item: $('#item').val(),
            heat: $('#heat').val(),
            rings: $('#rings').prop('checked') === true ? 1 : 0,
            ring_heat: $('#ring_heat').val(),
            list: $('#list').val(),
            p_cert: $('#p_cert').prop('checked') === true ? 1 : 0,
            certs: $('#certs').prop('checked') === true ? 1 : 0
        }

        let flag = false;
        Object.keys(obj).forEach(key => {
            if (obj[key] === '') flag = true;
        })
        if (flag) toastr.info("Please input all data!!");
        else {
            $.ajax({
                url: '/api/v1/ship_info/create',
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
        let ship_no = $('#ship_no').val();
        if (ship_no) {
            $.ajax({
                url: `/api/v1/delete_row/ship_info/ship_no/${ship_no}`,
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
        $('#ship_no').val('');
        $('#job').val('');
        $('#customer').val('');
        $('#ship_to').val('');
        $('#po').val('');
        $('#quantity').val('');
        $('#part').val('');
        $('#via').val('').change();
        $('#sh_date').val('');
        $('#desc').val('');
        $('#sold_to').val('');
        $('#item').val('');
        $('#heat').val('');
        $('#rings').prop('checked', false);
        $('#ring_heat').val('');
        $('#list').val('');
        $('#p_cert').prop('checked', false);
        $('#certs').prop('checked', false);
        toastr.success("You can add new data now!", "Success");
    })

})
