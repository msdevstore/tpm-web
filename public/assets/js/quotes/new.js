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
        $('#part').val(obj.part).change();
        $('#address').val(obj.address);
        $('#date').val(obj.date);
        $('#notes').val(obj.notes);
    }

    $('#main-table-show').click(function() {
        // $('#orders-table').toggleClass("d-table");
        $('#main-table').slideToggle();
    })

    $('#main-table-save').click(function() {
        // let obj = {
        //     job: $('#job').val(),
        //     ring: $('#ring').val(),
        //     excess_qty: $('#excess_qty').val(),
        //     date_produced: $('#date_produced').val(),
        //     los: $('#los').val()
        // }
        //
        // let flag = false;
        // Object.keys(obj).forEach(key => {
        //     if (obj[key] === '') flag = true;
        // })
        // if (flag) toastr.info("Please input all data!!");
        // else {
        //     $.ajax({
        //         url: '/api/v1/excess_ring/create',
        //         type: 'post',
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         data: obj,
        //         success: function(res) {
        //             console.log(res);
        //             if (res === '1') {
        //                 alert("Updated successfully!");
        //                 window.location.reload();
        //             } else if (res === true) alert("Created successfully!");
        //             else toastr.warning("Something went wrong!");
        //         },
        //         error: function(err) {
        //             console.log(err);
        //             toastr.error("Failed!");
        //         }
        //     })
        // }
    })

    $('#main-table-delete').click(function() {
        // let job = $('#job').val();
        // if (job) {
        //     $.ajax({
        //         url: `/api/v1/delete_row/excess_ring/job/${job}`,
        //         type: 'DELETE',
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         success: function(res) {
        //             console.log(res);
        //             if (res === '1') {
        //                 alert("Deleted successfully!");
        //                 window.location.reload();
        //             } else if (res === '2') {
        //                 alert("Can't find the data in database!");
        //             }
        //             else toastr.warning("Something went wrong!");
        //         },
        //         error: function(err) {
        //             console.log(err);
        //         }
        //     })
        // } else {
        //     alert("You didn't select any data!");
        // }
    })

    $('#main-table-format').click(function() {
        // $('#job').val('');
        // $('#ring').val('');
        // $('#excess_qty').val('');
        // $('#date_produced').val('');
        // $('#los').val('');
        setDefaultValues()
        toastr.success("You can add new data now!", "Success");
    })

    /////////////////////
    $('#cust_id').change(function(e) {
        $.ajax({
            url: '/api/v1/get_parts_by_cust/' + e.target.value,
            type: 'get',
            success: function(res) {
                let options = '<option value="">Select Client</option>';
                if (res.length) {
                    res.forEach(customer => {
                        options += `<option value="${customer.part}">${customer.part}</option>`
                    })
                } else {
                    toastr.info("No data!");
                }
                $('#part').empty().append(options);
            },
            error: function(err) {
                console.log(err);
                toastr.error("Failed!");
            }
        })
    })

    $('#part').change(function(e) {
        let cust_id = $('#cust_id').val();
        let part = e.target.value;
        if (cust_id !== '' && part !== '') {
            $.ajax({
                url: '/api/v1/get_part_info',
                type: 'post',
                data: {
                    cust_id: cust_id,
                    part: part
                },
                success: function(res) {
                    console.log(res);
                    $('#pattern').val(res.pattern).change();
                    $('#holes').val(res.holes).change();
                    $('#centers').val(res.centers).change();
                    $('#strip').val(res.strip);
                    $('#length').val(res.cutoff_length ? res.cutoff_length : res.length);
                    $('#diameter').val(res.dim ? res.dim : res.diameter);
                },
                error: function(err) {
                    console.log(err);
                }
            })
        }

    })

    setDefaultValues();

})

function setDefaultValues() {
    $("#quantity").val(1);
    $("#units").val(2);
    $("#angle").val(0.0);
    $("#weight").val(0.0);
    $("#time").val(0.0);
    $("#stamping").val(0.47);
    $("#setup").val(200.0);
    $("#men").val(3.5);
    $("#crating").val(247.0);
    $("#tpc").val(30);
    $("#shop").val(0.3);
    $("#electric").val(0.03);
    $("#cut_spd").val(8);
    $("#tag").val(0.15);
    $("#scrap").val(10.0);
    $("#gas").val(3.1);
    $("#tpb").val(30);
    $("#blade").val(49.0);
    $("#overhead").val(273600.0);
    $("#basis").val(1250000.0);
    $("#labor").val(20.0);
    $("#ws").val(40);
    $("#markup").val(50.0);
    $("#density").val(0.29);
}
