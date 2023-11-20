$(document).ready(function() {
    $(document).on('click', '.main-table-btn', function (e) {
        if ($(e.target)[0].localName === 'td') {
            let drift_od = $(e.target).parent().attr('data');

            let obj = objArr.filter(item => item.drift_od == drift_od)[0];
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
        $('#drift_od').val(obj.drift_od);
        $('#dift').val(obj.dift);
    }

    $('#main-table-show').click(function() {
        // $('#orders-table').toggleClass("d-table");
        $('#main-table').slideToggle();
    })

    $('#main-table-save').click(function() {
        let obj = {
            drift_od: $('#drift_od').val(),
            dift: $('#dift').val()
        }

        let flag = false;
        Object.keys(obj).forEach(key => {
            if (obj[key] === '') flag = true;
        })
        if (flag) alert("Please input all data!");
        else {
            $.ajax({
                url: '/api/v1/create/drifts/drift_od',
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
        let drift_od = $('#drift_od').val();
        if (drift_od) {
            $.ajax({
                url: `/api/v1/delete_row/drifts/drift_od/${drift_od}`,
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
        $('#drift_od').val('');
        $('#dift').val('');
    })

})
