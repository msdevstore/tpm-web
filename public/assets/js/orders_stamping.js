$(document).ready(function() {

    $(document).on('click', '.order-btn', function(e) {
        if ($(e.target)[0].localName === 'td') {
            let job = $(e.target).parent().attr('data');

            let order = orders.filter(order => order.job == job)[0];
            updateValues(order);

            $('#orders-table').slideToggle();
            $('#control-panel').css('display', 'flex');
            // console.log(order);
        }
    })

    $('#forward-btn').click(function() {
        const job = $('#job').val();
        let index = orders.findIndex(order => order.job == job);
        if (index - 1 < 0) index = orders.length - 1;
        updateValues(orders[index - 1]);
    })

    $('#backward-btn').click(function() {
        const job = $('#job').val();
        let index = orders.findIndex(order => order.job == job);
        if (index + 1 >= orders.length) index = 0;
        updateValues(orders[index + 1]);
    })

    function updateValues(obj) {
        $('#job').val(obj.job);
        $('#cust_id').val(obj.cust_id).change();
        $('#part').val(obj.part);
        $('#rouselle').val(obj.rouselle);
        $('#niagara').val(obj.niagara);
        $('#seyi').val(obj.seyi);
        $('#rouselleAlt').val(obj.rouselleAlt);
        $('#niagaraAlt').val(obj.niagaraAlt);
        $('#seyiAlt').val(obj.seyiAlt);
        $('#blank_area').val(obj.blank_area);
        $('#blank_areaAlt').val(obj.blank_areaAlt);
        $('#cycles').val(obj.cycles);
        $('#linear_feet').val(obj.linear_feet);
        $('#strip').val(obj.strip);
        $('#stripAlt').val(obj.stripAlt);
        $('#die').val(obj.die);
        $('#progression').val(obj.progression);
        $('#millJob').val(obj.millJob);
        $('#millCycles').val(obj.millCycles);
        $('#testCycles').prop('checked', obj.testCycles === 1 ? true : false);
        $('#remarks').val(obj.remarks);
        $('#press').val(obj.press).change();
    }

    $('#order-save').click(function() {
        let obj = {
            job: $('#job').val(),
            cust_id: $('#cust_id').val(),
            part: $('#part').val(),
            rouselle: $('#rouselle').val(),
            niagara: $('#niagara').val(),
            seyi: $('#seyi').val(),
            rouselleAlt: $('#rouselleAlt').val(),
            niagaraAlt: $('#niagaraAlt').val(),
            seyiAlt: $('#seyiAlt').val(),
            blank_area: $('#blank_area').val(),
            blank_areaAlt: $('#blank_areaAlt').val(),
            cycles: $('#cycles').val(),
            linear_feet: $('#linear_feet').val(),
            strip: $('#strip').val(),
            stripAlt: $('#stripAlt').val(),
            // die: $('#die').val(),
            progression: $('#progression').val(),
            millJob: $('#millJob').val(),
            millCycles: $('#millCycles').val(),
            testCycles: $('#testCycles').is(":checked") ? 1 : 0,
            remarks: $('#remarks').val(),
            press: $('#press').val()
        }

        let flag = false;
        // Object.keys(obj).forEach(key => {
        //     if (obj[key] === '') flag = true;
        // })
        if (flag) alert("Please input all data!");
        else {
            $.ajax({
                url: '/api/v1/stamping_orders_tbl/create',
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

    $('#order-delete').click(function() {
        let job = $('#job').val();
        $.ajax({
            url: `/stamping_orders_tbl/${job}`,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res) {
                console.log(res);
                if (res) {
                    alert("Deleted successfully!");
                    window.location.reload();
                } else alert("Something went wrong!");
            },
            error: function(err) {
                console.log(err);
            }
        })
    })

    $('#order-format').click(function() {
        $('#job').val('');
        $('#cust_id').val('').change();
        $('#part').val('');
        $('#rouselle').val('');
        $('#niagara').val('');
        $('#seyi').val('');
        $('#rouselleAlt').val('');
        $('#niagaraAlt').val('');
        $('#seyiAlt').val('');
        $('#blank_area').val('');
        $('#blank_areaAlt').val('');
        $('#cycles').val('');
        $('#linear_feet').val('');
        $('#strip').val('');
        $('#stripAlt').val('');
        $('#die').val('');
        $('#progression').val('');
        $('#millJob').val('');
        $('#millCycles').val('');
        $('#testCycles').val('');
        $('#remarks').val('');
        $('#press').val('').change();
    })

    $('#orders-show').click(function() {
        // $('#orders-table').toggleClass("d-table");
        $('#orders-table').slideToggle();
    })
})
