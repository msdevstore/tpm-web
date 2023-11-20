$(document).ready(function() {
    $(document).on('click', '.main-table-btn', function (e) {
        if ($(e.target)[0].localName === 'td') {
            let pattern = $(e.target).parent().attr('data');

            let obj = objArr.filter(item => item.pattern == pattern)[0];
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
        $('#pattern').val(obj.pattern);
        $('#oa_factor').val(obj.oa_factor);
    }

    $('#main-table-show').click(function() {
        // $('#orders-table').toggleClass("d-table");
        $('#main-table').slideToggle();
    })

    $('#main-table-save').click(function() {
        let obj = {
            pattern: $('#pattern').val(),
            oa_factor: $('#oa_factor').val()
        }

        let flag = false;
        Object.keys(obj).forEach(key => {
            if (obj[key] === '') flag = true;
        })
        if (flag) alert("Please input all data!");
        else {
            $.ajax({
                url: '/api/v1/create/pat_tbl/pattern',
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
        let pattern = $('#pattern').val();
        if (pattern) {
            $.ajax({
                url: `/api/v1/delete_row/pat_tbl/pattern/${pattern}`,
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
        $('#pattern').val('');
        $('#oa_factor').val('');
    })

})
