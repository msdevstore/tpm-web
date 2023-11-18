$(document).ready(function() {
    $(document).on('click', '.main-table-btn', function (e) {
        if ($(e.target)[0].localName === 'td') {
            let work = $(e.target).parent().attr('data');

            let obj = objArr.filter(item => item.work == work)[0];
            updateValues(obj);

            $('#main-table').slideToggle();
            $('#control-panel').css('display', 'flex');
            // console.log(order);
        }
    })

    $('#forward-btn').click(function () {
        const job = $('#job').val();
        let index = orders.findIndex(order => order.job == job);
        if (index - 1 < 0) index = orders.length - 1;
        updateValues(orders[index - 1]);
    })

    $('#backward-btn').click(function () {
        const job = $('#job').val();
        let index = orders.findIndex(order => order.job == job);
        if (index + 1 >= orders.length) index = 0;
        updateValues(orders[index + 1]);
    })

    function updateValues(obj) {
        $('#work').val(obj.work);
        $('#material').val(obj.material).change();
        $('#gage').val(obj.gage).change();
        $('#width').val(obj.width);
        $('#heat').val(obj.heat);
        $('#pattern').val(obj.pattern).change();
        $('#holes').val(obj.holes).change();
        $('#centers').val(obj.centers).change();
        $('#tpm_po').val(obj.tpm_po);
        $('#tpm_job').prop('checked', obj.tpm_job === 1 ? true : false);
    }

    $('#main-table-show').click(function() {
        // $('#orders-table').toggleClass("d-table");
        $('#main-table').slideToggle();
    })

    $('#main-table-save').click(function() {
        let obj = {
            work: $('#work').val(),
            material: $('#material').val(),
            gage: $('#gage').val(),
            width: $('#width').val(),
            heat: $('#heat').val(),
            pattern: $('#pattern').val(),
            holes: $('#holes').val(),
            centers: $('#centers').val(),
            tpm_po: $('#tpm_po').val(),
            tpm_job: $('#tpm_job').prop('checked') ? 1 : 0,
        }

        let flag = false;
        Object.keys(obj).forEach(key => {
            if (obj[key] === '') flag = true;
        })
        if (flag) alert("Please input all data!");
        else {
            $.ajax({
                url: '/api/v1/steel_tbl/create',
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
        let work = $('#work').val();
        if (work) {
            $.ajax({
                url: `/api/v1/delete_row/steel_tbl/work/${work}`,
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
        $('#work').val('');
        $('#material').val('').change();
        $('#gage').val('').change();
        $('#width').val('');
        $('#heat').val('');
        $('#pattern').val('').change();
        $('#holes').val('').change();
        $('#centers').val('').change();
        $('#tpm_po').val('');
        $('#tpm_job').val('');
    })

})
