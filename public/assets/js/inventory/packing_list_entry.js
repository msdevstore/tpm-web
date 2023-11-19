$(document).ready(function() {
    $(document).on('click', '.main-table-btn', function (e) {
        if ($(e.target)[0].localName === 'td') {
            let po = $(e.target).parent().attr('data');

            let obj = objArr.filter(item => item.po == po)[0];
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
        $('#heat_num').val(obj.heat_num);
        $('#po').val(obj.po);
        $('#type_mat').val(obj.type_mat).change();
        $('#mesh').val(obj.mesh).change();
        $('#width').val(obj.width);
        $('#tot_len').val(obj.tot_len);
        $('#allocated').prop('checked', obj.allocated === 1 ? true : false);
        $('#job').val(obj.job);
        $('#length').val(obj.length);
        $('#crate').val(obj.crate);
    }

    $('#main-table-show').click(function() {
        // $('#orders-table').toggleClass("d-table");
        $('#main-table').slideToggle();
    })

    $('#main-table-save').click(function() {
        let obj = {
            heat_num: $('#heat_num').val(),
            po: $('#po').val(),
            supplier: $('#supplier').val(),
            type_mat: $('#type_mat').val(),
            mesh: $('#mesh').val(),
            width: $('#width').val(),
            tot_len: $('#tot_len').val(),
            allocated: $('#allocated').prop('checked') ? 1 : 0,
            job: $('#job').val(),
            length: $('#length').val(),
            crate: $('#crate').val()
        }

        let flag = false;
        Object.keys(obj).forEach(key => {
            if (obj[key] === '') flag = true;
        })
        if (flag) alert("Please input all data!");
        else {
            $.ajax({
                url: '/api/v1/packing_list_entry/create',
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
        let po = $('#po').val();
        if (po) {
            $.ajax({
                url: `/api/v1/delete_row/packing_list_entry/po/${po}`,
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
        $('#heat_num').val('');
        $('#po').val('');
        $('#supplier').val('');
        $('#type_mat').val('').change();
        $('#width').val('');
        $('#mesh').val('');
        $('#tot_len').val('');
        $('#job').val('').change();
        $('#length').val('');
        $('#allocated').prop('checked', false);
        $('#crate').val('');
    })

})
