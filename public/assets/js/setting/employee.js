$(document).ready(function() {
    $(document).on('click', '.main-table-btn', function (e) {
        if ($(e.target)[0].localName === 'td') {
            let ID = $(e.target).parent().attr('data');

            let obj = objArr.filter(item => item.ID == ID)[0];
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
        $('#ID').val(obj.ID);
        $('#name').val(obj.name);
        $('#mill_operator').prop('checked', obj.mill_operator === 1 ? true : false);
        $('#cutoff_operator').prop('checked', obj.cutoff_operator === 1 ? true : false);
        $('#repair_welder').prop('checked', obj.repair_welder === 1 ? true : false);
        $('#inspector').prop('checked', obj.inspector === 1 ? true : false);
        $('#general_laborer').prop('checked', obj.general_laborer === 1 ? true : false);
        $('#Shipping').val(obj.Shipping).change();
        $('#Stamping').val(obj.Stamping).change();
        $('#Fab').val(obj.Fab).change();
        $('#Direct_Pak').val(obj.Direct_Pak).change();
        $('#Geo_Form').val(obj.Geo_Form).change();
    }

    $('#main-table-show').click(function() {
        // $('#orders-table').toggleClass("d-table");
        $('#main-table').slideToggle();
    })

    $('#main-table-save').click(function() {
        let obj = {
            ID: $('#ID').val(),
            name: $('#name').val(),
            mill_operator: $('#mill_operator').prop('checked') === true ? 1 : 0,
            cutoff_operator: $('#cutoff_operator').prop('checked') === true ? 1 : 0,
            repair_welder: $('#repair_welder').prop('checked') === true ? 1 : 0,
            inspector: $('#inspector').prop('checked') === true ? 1 : 0,
            general_laborer: $('#general_laborer').prop('checked') === true ? 1 : 0,
            Shipping: $('#Shipping').val(),
            Stamping: $('#Stamping').val(),
            Fab: $('#Fab').val(),
            Direct_Pak: $('#Direct_Pak').val(),
            Geo_Form: $('#Geo_Form').val()
        }

        let flag = false;
        Object.keys(obj).forEach(key => {
            if (obj[key] === '') flag = true;
        })
        if (flag) alert("Please input all data!");
        else {
            $.ajax({
                url: '/api/v1/create/ship_method/ID',
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
        let ID = $('#ID').val();
        if (ID) {
            $.ajax({
                url: `/api/v1/delete_row/ship_method/ID/${ID}`,
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
        $('#ID').val('');
        $('#name').val('');
        $('#mill_operator').prop('checked', false);
        $('#cutoff_operator').prop('checked', false);
        $('#repair_welder').prop('checked', false);
        $('#inspector').prop('checked', false);
        $('#general_laborer').prop('checked', false);
        $('#Shipping').val('').change();
        $('#Stamping').val('').change();
        $('#Fab').val('').change();
        $('#Direct_Pak').val('').change();
        $('#Geo_Form').val('').change();
    })

})
