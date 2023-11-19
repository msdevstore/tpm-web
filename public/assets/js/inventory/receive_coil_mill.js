$(document).ready(function() {
    $(document).on('click', '.main-table-btn', function (e) {
        if ($(e.target)[0].localName === 'td') {
            let coil_no = $(e.target).parent().attr('data');

            let obj = objArr.filter(item => item.coil_no == coil_no)[0];
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
        $('#work').val(obj.work).change();
        $('#coil_no').val(obj.coil_no);
        $('#no_of_coil').val(obj.no_of_coil);
        $('#weight').val(obj.weight);
        $('#operator').val(obj.operator).change();
        $('#cycles').val(obj.cycles);
        $('#footage').val(obj.footage);
        $('#allocated').prop('checked', obj.allocated === 1 ? true : false);
        $('#job').val(obj.job);
        $('#date_received').val(obj.date_received);
    }

    $('#main-table-show').click(function() {
        // $('#orders-table').toggleClass("d-table");
        $('#main-table').slideToggle();
    })

    $('#main-table-save').click(function() {
        let obj = {
            work: $('#work').val(),
            coil_no: $('#coil_no').val(),
            no_of_coil: $('#no_of_coil').val(),
            weight: $('#weight').val(),
            operator: $('#operator').val(),
            cycles: $('#cycles').val(),
            footage: $('#footage').val(),
            allocated: $('#allocated').prop('checked') ? 1 : 0,
            job: $('#job').val(),
            date_received: $('#date_received').val(),
        }

        let flag = false;
        Object.keys(obj).forEach(key => {
            if (obj[key] === '') flag = true;
        })
        if (flag) alert("Please input all data!");
        else {
            $.ajax({
                url: '/api/v1/coil_tbl/create',
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: obj,
                success: function(res) {
                    console.log(res);
                    if (res === '1') {
                        alert("Updated successfully!");
                        window.location.reload();
                    } else if (res === true) alert("Created successfully!");
                    else alert("Something went wrong!");
                },
                error: function(err) {
                    console.log(err);
                    alert("Failed!");
                }
            })
        }
    })

    $('#main-table-delete').click(function() {
        let coil_no = $('#coil_no').val();
        if (coil_no) {
            $.ajax({
                url: `/api/v1/delete_row/coil_tbl/coil_no/${coil_no}`,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    console.log(res);
                    if (res === '1') {
                        alert("Deleted successfully!");
                        window.location.reload();
                    } else if (res === '2') {
                        alert("Can't find the data in database!");
                    }
                    else alert("Something went wrong!");
                },
                error: function(err) {
                    console.log(err);
                }
            })
        } else {
            alert("You didn't select any data!");
        }

    })



    $('#main-table-format').click(function() {
        $('#work').val('').change();
        $('#coil_no').val('');
        $('#no_of_coil').val('');
        $('#weight').val('');
        $('#operator').val('').change();
        $('#cycles').val('').change();
        $('#footage').val('').change();
        $('#allocated').prop('checked', false);
        $('#job').val('');
        $('#date_received').val('');
    })

})
