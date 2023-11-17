$(document).ready(function() {

    $('.tab-list-item').click(function() {
        $('.tab-list-item.active').removeClass('active');
        $(this).addClass('active');
    })

    $('#orders-show').click(function() {
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
                            tbodyContent += `<td> ${index + 1} </td>
                            <td>${obj.hasOwnProperty('coil_no') ? obj['coil_no'] : ''}</td>
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
                            tbodyContent += `<td><input type="checkbox" name="coil_data_select" value="${obj.hasOwnProperty('coil_no') ? obj['coil_no'] : ''}" /> </td>
                            <td>${obj.hasOwnProperty('coil_no') ? obj['coil_no'] : ''}</td>
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
                alert('Failed!');
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
                        alert(res.length + ' lists are updated!');
                    } else {
                        alert('No change!');
                    }
                },
                error: function(err) {
                    console.log(err);
                    alert('Failed!');
                }
            })
        } else {
            alert("No content selected!");
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
                        alert(res.length + ' lists are updated!');
                    } else {
                        alert('No change!');
                    }
                },
                error: function(err) {
                    console.log(err);
                    alert('Failed!');
                }
            })
        } else {
            alert("No content selected!");
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
                        // Object.keys(obj).forEach(key => {
                        //     tbodyContent += `<td>${obj[key]}</td>`
                        // });
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
                        // Object.keys(obj).forEach(key => {
                        //     tbodyContent += `<td>${obj[key]}</td>`
                        // });
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
