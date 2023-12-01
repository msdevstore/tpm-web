$(document).ready(function() {
    let calculation;

    $('#part').change(function() {
        $.ajax({
            url: '/api/v1/get_part_specs/' + $(this).val(),
            type: 'GET',
            success: function(res) {
                calculation = res;
                console.log($('#quantity').val());
                $.each(res, function(i, j) {
                    console.log($('#quantity').val() !== '')
                    if ($('#quantity').val() !== '') {
                        $('#' + i).val((parseFloat(j) * parseFloat($('#quantity').val())).toFixed(3));
                    } else {
                        $('#' + i).val(j.toFixed(3));
                    }
                })
            },
            error: function(err) {
                console.log(err);
                toastr.error('Failed fetching data!');
            }
        })
    })

    $('#quantity').keyup(function() {
        // let quantity = $(this).val();
        // let revenue = $('#price').val() * quantity;
        // $('#PO_total').prop('value', revenue);
        // $("#quantity").val(quantity);
        // $("#modal_from").attr("max", quantity);
        // $("#modal_to").attr("max", quantity);
        // $("#modal_to").val(quantity);
        let $thisval = $(this).val();
        if (typeof calculation === 'object') {
            $.each(calculation, function(i, j) {
                $('#' + i).val((parseFloat(j.toFixed(3)) * parseFloat($thisval)).toFixed(3));
            });
        }
    })

    $('#price').keyup(function() {
        let revenue = $('#quantity').val() * $(this).val();
        $('#PO_total').prop('value', revenue);
    })

    $('#cust_id').change(function() {
        $.ajax({
            url: '/api/v1/get_parts_by_cust/' + $(this).val(),
            type: 'get',
            success: function(res) {
                console.log(res);
                if (res.length) {
                    let content = '';
                    res.forEach(item => {
                        content += `<option value="${item['part']}">${item['part']}</option>`
                    })
                    $('#part').empty().append(content);
                    $("#part").val($("#part option:first").val()).change();
                } else toastr.warning("There is no part for this customer");
            },
            error: function(err) {
                console.log(err);
                toastr.error("Getting parts by company is failed!");
            }
        })
    })

    $(document).on('click', '.order-btn', function(e) {
        if ($(e.target)[0].localName === 'td') {
            let job = $(e.target).parent().attr('data');

            let order = orders.filter(order => order.job == job)[0];
            updateValues(order);

            $.ajax({
                url: '/api/v1/get_weight/' + order.job,
                type: 'get',
                success: function(res) {
                    // console.log(res);
                    const temp = `Weight Allocated: ${res.tw} <br>
                                    Weight already used: ${res.used} <br>
                                    Total Weight dedicated to job: ${Number(res.tw) + Number(res.used)}`;
                    $('#weight_allocated_alert').empty().append(temp);
                },
                error: function(err) {
                    console.log(err);
                }
            })

            $.ajax({
                url: '/api/v1/get_mesh_total/' + order.job,
                type: 'get',
                success: function(res) {
                    console.log(res);
                    const temp = `Length Allocated: ${res.ML} <br>
                                    Length already used: ${res.EL} <br>
                                    Total Required Length: ${Number(res.ML) + Number(res.EL)}`;
                    $('#length_allocated_alert').empty().append(temp);
                },
                error: function(err) {
                    console.log(err);
                }
            })

            $('#orders-table').slideToggle();
            $('#control-panel').css('display', 'flex');
            // console.log(order);
        }
    })

    $('#started-check').change(function() {
        $('#began').parent().parent().toggleClass('d-none');
        let job = $('#job').val();
        console.log('job: ', job);
        $.ajax({
            url: '/api/v1/get_job_detail/' + job,
            type: 'get',
            success: function(res) {
                console.log('res: ', res);
                $('#modal_job').val(job);
                $('#jobModalCenterBtn').click();
            },
            error: function(err) {
                console.log(err);
            }
        })
    })

    $('#finished-check').change(function() {
        $('#finished').parent().parent().toggleClass('d-none');
    })

    $('#shipped-check').change(function() {
        $('#shipped').parent().parent().toggleClass('d-none');
    })

    $('#add_btn').click(function() {
        const temp = `<div class="col-lg-3 gutter-b">
                                <div class="grid-container-3">
                                    <div class="grid-label"><label>Ship Date</label></div>
                                    <div class="grid-input"><input name="ship_dates[]" type="text"></div>
                                    <div class="grid-label"><label>Quantity</label></div>
                                    <div class="grid-input"><input name="ship_quantities[]" type="number"></div>
                                </div>
                            </div>`;
        $('#additional-container').append(temp);
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
        $('#po').val(obj.po);
        $('#quantity').val(obj.quantity);
        $('#ordered').val(obj.ordered.substring(0,10));
        $('#due').val(obj.due.substring(0,10));
        $('#ship_date').val(obj.ship_date.substring(0,10));
        $('#mill_operator').val(obj.mill_operator).change();
        $('#cutoff_operator').val(obj.cutoff_operator).change();
        $('#repair_welder').val(obj.repair_welder).change();
        $('#inspector').val(obj.inspector).change();
        $('#cont_type').val(obj.cont_type).change();
        $('#ship_method').val(obj.ship_method).change();
        $('#weld_spec_mill').val(obj.weld_spec_mill).change();
        $('#weld_spec_repair').val(obj.weld_spec_repair).change();
    }

    $('#main-table-save').click(function() {
        let obj = {
            job: $('#job').val(),
            cust_id: $('#cust_id').val(),
            po: $('#po').val(),
            part: $('#part').val(),
            quantity: $('#quantity').val(),
            ordered: $('#ordered').val(),
            due: $('#due').val(),
            ship_date: $('#ship_date').val(),
            mill_operator: $('#mill_operator').val(),
            cutoff_operator: $('#cutoff_operator').val(),
            repair_welder: $('#repair_welder').val(),
            inspector: $('#inspector').val(),
            cont_type: $('#cont_type').val(),
            ship_method: $('#ship_method').val(),
            weld_spec_mill: $('#weld_spec_mill').val(),
            weld_spec_repair: $('#weld_spec_repair').val(),
        }

        obj['item'] = $('#item').val();
        if (!$('#began').parent().parent().hasClass('d-none')) {
            obj['began'] = $('#began').val();
        }
        if (!$('#finished').parent().parent().hasClass('d-none')) {
            obj['finished'] = $('#finished').val();
        }
        if (!$('#shipped').parent().parent().hasClass('d-none')) {
            obj['shipped'] = $('#shipped').val();
        }

        let flag = false;
        Object.keys(obj).forEach(key => {
            if (obj[key] === '') flag = true;
        })
        if (flag) toastr.info("Please input all data!");
        else {
            $.ajax({
                url: '/orders/create',
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: obj,
                success: function(res) {
                    console.log(res);
                    if (res === '1') {
                        toastr.success(
                            "The information is created successfully!",
                            "Success",
                            {
                                timeOut: 1000,
                                fadeOut: 1000,
                                onHidden: function () {
                                    window.location.reload();
                                }
                            });
                    } else if (res === '2') toastr.success(
                        "The information is updated successfully!!",
                        "Success",
                        {
                            timeOut: 1000,
                            fadeOut: 1000,
                            onHidden: function () {
                                window.location.reload();
                            }
                        });
                    else toastr.warning("Something went wrong!");
                },
                error: function(err) {
                    console.log(err);
                    toastr.error("Failed!");
                }
            })
        }
    })

    $('#main-table-delete').click(function() {
        let job = $('#job').val();
        $.ajax({
            url: `/orders/${job}`,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res) {
                console.log(res);
                if (res) {
                    toastr.success(
                        "Deleted successfully!",
                        "Success",
                        {
                            timeOut: 1000,
                            fadeOut: 1000,
                            onHidden: function () {
                                window.location.reload();
                            }
                        });
                } else toastr.warning("Something went wrong!");
            },
            error: function(err) {
                console.log(err);
                toastr.error("Failed!");
            }
        })
    })

    $('.tab-list-item').click(function() {
        $('.tab-list-item.active').removeClass('active');
        $(this).addClass('active');
    })

    $('#main-table-show').click(function() {
        // $('#orders-table').toggleClass("d-table");
        $('#orders-table').slideToggle();
    })

    $('input.coil_option').change(function() {
        const type = $(this).val();
        const part = $('#part').val();
        const job = $('#job').val();
        $.ajax({
            url: '/api/v1/order_list_coil',
            type: 'post',
            data: {
                type: type,
                part: part,
                job: job
            },
            success: function(res) {
                let tbodyContent = `<tr><td colspan="8" style="vertical-align: middle;">No data to display!</td></tr>`;
                if(res.length > 0) {
                    tbodyContent = '<tr>';
                    if (type == "1") {
                        res.forEach((obj, index) => {
                            tbodyContent += `<td>${obj.hasOwnProperty('coil_no') ? obj['coil_no'] : ''}</td>
                            <td>${obj.hasOwnProperty('weight') ? obj['weight'] : ''}</td>
                            <td>${obj.hasOwnProperty('width') ? obj['width'] : ''}</td>
                            <td>${obj.hasOwnProperty('operator') ? obj['operator'] : ''}</td>
                            <td>${obj.hasOwnProperty('heat') ? obj['heat'] : ''}</td>
                            <td>${obj.hasOwnProperty('job') ? obj['job'] : ''}</td>
                            <td>${obj.hasOwnProperty('allocated') ? obj['allocated'] : ''}</td></tr>`
                            // Object.keys(obj).forEach(key => {
                            //     tbodyContent += `<td>${obj[key]}</td>`
                            // });
                        })
                    } else {
                        res.forEach(obj => {
                            tbodyContent += `<td style="text-align: left"><input type="checkbox" name="coil_data_select" value="${obj.hasOwnProperty('coil_no') ? obj['coil_no'] : ''}" />
                            ${obj.hasOwnProperty('coil_no') ? obj['coil_no'] : ''}</td>
                            <td>${obj.hasOwnProperty('weight') ? obj['weight'] : ''}</td>
                            <td>${obj.hasOwnProperty('width') ? obj['width'] : ''}</td>
                            <td>${obj.hasOwnProperty('operator') ? obj['operator'] : ''}</td>
                            <td>${obj.hasOwnProperty('heat') ? obj['heat'] : ''}</td>
                            <td>${obj.hasOwnProperty('job') ? obj['job'] : ''}</td>
                            <td>${obj.hasOwnProperty('allocated') ? obj['allocated'] : ''}</td></tr>`
                            // Object.keys(obj).forEach(key => {
                            //     tbodyContent += `<td>${obj[key]}</td>`
                            // });
                        })
                    }
                }
                $('#coil_data').empty().append(tbodyContent);
            },
            error: function(err) {
                console.log(err);
                toastr.error('Failed!');
            }
        })
    })
})

function updateAllocation(num, self) {
    const job = $('#job').val();
    if (num === 1 || num === 2 || num === 3) {
        const itemArr = $('tbody#coil_data input[type="checkbox"]:checked');
        if (itemArr.length) {
            let ids = [];
            itemArr.each(function(index, item) {
                ids[index] = $(item).val();
            });
            $.ajax({
                url: '/api/v1/update_allocation',
                type: 'post',
                data: {
                    ids: ids,
                    type: num,
                    job: job
                },
                success: function(res) {
                    if (res.length) {
                        toastr.success(
                            res.length + ' lists are updated!',
                            "Success",
                            {
                                timeOut: 1000,
                                fadeOut: 1000,
                                onHidden: function () {
                                    window.location.reload();
                                }
                            });
                    } else {
                        toastr.warning('No change!');
                    }
                },
                error: function(err) {
                    console.log(err);
                    toastr.error('Failed!');
                }
            })
        } else {
            toastr.info("No content selected!");
        }
    } else if (num === 4 || num === 5) {
        const itemArr = $('tbody#mesh_data input[type="checkbox"]:checked');
        if (itemArr.length) {
            let ids = [];
            itemArr.each(function(index, item) {
                ids[index] = $(item).val();
            });
            $.ajax({
                url: '/api/v1/update_allocation',
                type: 'post',
                data: {
                    ids: ids,
                    num: num,
                    job: job
                },
                success: function(res) {
                    if (res.length) {
                        toastr.success(
                            res.length + ' lists are updated!',
                            "Success",
                            {
                                timeOut: 1000,
                                fadeOut: 1000,
                                onHidden: function () {
                                    window.location.reload();
                                }
                            });
                    } else {
                        toastr.warning('No change!');
                    }
                },
                error: function(err) {
                    console.log(err);
                    toastr.error('Failed!');
                }
            })
        } else {
            toastr.info("No content selected!");
        }
    }
}

function meshRequest(num) {
    const part = $('#part').val();
    const job = $('#job').val();
    const type = $("input[name='mesh_data']:checked").val();

    $.ajax({
        url: '/api/v1/order_list_mesh_order',
        type: 'post',
        data: {
            part: part,
            job: job,
            type: type,
            num: num
        },
        success: function(res) {
            console.log(res);
            let tbodyContent = `<tr><td colspan="9" style="vertical-align: middle;">No data to display!</td></tr>`;
            if (res.length > 0) {
                if (type === "1") {
                    tbodyContent = '<tr>';
                    res.forEach((obj, index) => {
                        tbodyContent += `<td>${index + 1}</td>
                            <td>${obj.hasOwnProperty('mesh') ? obj['mesh'] : ''}</td>
                            <td>${obj.hasOwnProperty('type') ? obj['type'] : ''}</td>
                            <td>${obj.hasOwnProperty('date_received') ? obj['date_received'] : ''}</td>
                            <td>${obj.hasOwnProperty('width') ? obj['width'] : ''}</td>
                            <td>${obj.hasOwnProperty('length') ? obj['length'] : ''}</td>
                            <td>${obj.hasOwnProperty('allocated') ? obj['allocated'] : ''}</td>
                            <td>${obj.hasOwnProperty('TPM_JOB') ? obj['TPM_JOB'] : ''}</td>
                            <td>${obj.hasOwnProperty('heat') ? obj['heat'] : ''}</td></tr>`
                    })
                } else {
                    tbodyContent = '<tr>';
                    res.forEach(obj => {
                        tbodyContent += `<td><input type="checkbox" name="mesh_data_select" value="${obj.hasOwnProperty('mesh_no') ? obj['mesh_no'] : ''}" /> </td>
                            <td>${obj.hasOwnProperty('mesh') ? obj['mesh'] : ''}</td>
                            <td>${obj.hasOwnProperty('type') ? obj['type'] : ''}</td>
                            <td>${obj.hasOwnProperty('date_received') ? obj['date_received'] : ''}</td>
                            <td>${obj.hasOwnProperty('width') ? obj['width'] : ''}</td>
                            <td>${obj.hasOwnProperty('length') ? obj['length'] : ''}</td>
                            <td>${obj.hasOwnProperty('allocated') ? obj['allocated'] : ''}</td>
                            <td>${obj.hasOwnProperty('TPM_JOB') ? obj['TPM_JOB'] : ''}</td>
                            <td>${obj.hasOwnProperty('heat') ? obj['heat'] : ''}</td></tr>`
                    })
                }
            }
            $('#mesh_data').empty().append(tbodyContent);
        },
        error: function(err) {
            console.log(err);
        }
    })
}
