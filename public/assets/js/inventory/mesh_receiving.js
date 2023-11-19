$(document).ready(function() {
    $(document).on('click', '.main-table-btn', function (e) {
        if ($(e.target)[0].localName === 'td') {
            let mesh_no = $(e.target).parent().attr('data');

            let obj = objArr.filter(item => item.mesh_no == mesh_no)[0];
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
        $('#mesh_no').val(obj.mesh_no);
        $('#supplier').val(obj.supplier);
        $('#allocated').prop('checked', obj.allocated === 1 ? true : false);
        $('#job').val(obj.job);
        $('#tpm_po').val(obj.tpm_po);
        $('#date_received').val(obj.date_received);
        $('#width').val(obj.width);
        $('#length').val(obj.length);
        $('#heat').val(obj.heat);
        $('#mesh').val(obj.mesh).change();
        $('#type').val(obj.type).change();
    }

    $('#main-table-show').click(function() {
        // $('#orders-table').toggleClass("d-table");
        $('#main-table').slideToggle();
    })

    $('#main-table-save').click(function() {
        let obj = {
            job: $('#job').val(),
            mesh_no: $('#mesh_no').val(),
            supplier: $('#supplier').val(),
            tpm_po: $('#tpm_po').val(),
            date_received: $('#date_received').val(),
            allocated: $('#allocated').prop('checked') ? 1 : 0,
            width: $('#width').val(),
            length: $('#length').val(),
            heat: $('#heat').val(),
            mesh: $('#mesh').val(),
            type: $('#type').val()
        }

        let flag = false;
        Object.keys(obj).forEach(key => {
            if (obj[key] === '') flag = true;
        })
        if (flag) alert("Please input all data!");
        else {
            $.ajax({
                url: '/api/v1/mesh_tbl/create',
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
        let mesh_no = $('#mesh_no').val();
        if (mesh_no) {
            $.ajax({
                url: `/api/v1/delete_row/mesh_tbl/mesh_no/${mesh_no}`,
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
        $('#mesh_no').val('');
        $('#supplier').val('');
        $('#tpm_po').val('').change();
        $('#allocated').prop('checked', false);
        $('#width').val('');
        $('#date_received').val('');
        $('#heat').val('');
        $('#mesh').val('').change();
        $('#length').val('');
        $('#type').val('').change();
    })

})
