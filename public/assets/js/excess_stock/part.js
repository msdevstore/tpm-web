$(document).ready(function() {
    $(document).on('click', '.main-table-btn', function (e) {
        if ($(e.target)[0].localName === 'td') {
            let job = $(e.target).parent().attr('data');

            let obj = objArr.filter(item => item.job == job)[0];
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
        $('#job').val(obj.job);
        $('#cust_id').val(obj.cust_id).change();
        $('#part').val(obj.part).change();
        $('#excess_qty').val(obj.excess_qty);
        $('#date_produced').val(obj.date_produced.substring(0, 10));
        $('#los').val(obj.los);
    }

    $('#main-table-show').click(function() {
        // $('#orders-table').toggleClass("d-table");
        $('#main-table').slideToggle();
    })

    $('#main-table-save').click(function() {
        let obj = {
            job: $('#job').val(),
            cust_id: $('#cust_id').val(),
            part: $('#part').val(),
            excess_qty: $('#excess_qty').val(),
            date_produced: $('#date_produced').val(),
            los: $('#los').val()
        }

        let flag = false;
        Object.keys(obj).forEach(key => {
            if (obj[key] === '') flag = true;
        })
        if (flag) alert("Please input all data!");
        else {
            $.ajax({
                url: '/api/v1/excess_part/create',
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
        let job = $('#job').val();
        if (job) {
            $.ajax({
                url: `/api/v1/delete_row/excess_part/job/${job}`,
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
        $('#job').val('');
        $('#cust_id').val('').change();
        $('#part').val('').change();
        $('#excess_qty').val('');
        $('#date_produced').val('');
        $('#los').val('');
    })

})
