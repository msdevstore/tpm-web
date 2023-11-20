$(document).ready(function() {
    $(document).on('click', '.main-table-btn', function (e) {
        if ($(e.target)[0].localName === 'td') {
            let id = $(e.target).parent().attr('data');

            let obj = objArr.filter(item => item.id == id)[0];
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
        $('#id').val(obj.id);
        $('#tubmil_log').val(obj['tubmil_log']);
        $('#tubmil_log-2').val(obj['tubmil_log-2']);
        $('#tubmil_log-3').val(obj['tubmil_log-3']);
        $('#tubmil_log-4').val(obj['tubmil_log-4']);
        $('#tubmil_setup').val(obj['tubmil_setup']);
        $('#tubmil_setup-2').val(obj['tubmil_setup-2']);
        $('#tubmil_setup-3').val(obj['tubmil_setup-3']);
        $('#tubmil_setup-4').val(obj['tubmil_setup-4']);
        $('#first_part_drift').val(obj['first_part_drift']);
        $('#first_part_drift-2').val(obj['first_part_drift-2']);
        $('#first_part_drift-3').val(obj['first_part_drift-3']);
        $('#first_part_drift-4').val(obj['first_part_drift-4']);
        $('#welding_station_cklist').val(obj['welding_station_cklist']);
        $('#welding_station_cklist-2').val(obj['welding_station_cklist-2']);
        $('#welding_station_cklist-3').val(obj['welding_station_cklist-3']);
        $('#welding_station_cklist-4').val(obj['welding_station_cklist-4']);
        $('#worksheet').val(obj['worksheet']);
        $('#worksheet-2').val(obj['worksheet-2']);
        $('#worksheet-3').val(obj['worksheet-3']);
        $('#worksheet-4').val(obj['worksheet-4']);
        $('#direct_pack').val(obj['direct_pack']);
        $('#direct_pack-2').val(obj['direct_pack-2']);
        $('#direct_pack-3').val(obj['direct_pack-3']);
        $('#direct_pack-4').val(obj['direct_pack-4']);
        $('#cutoff-station').val(obj['cutoff-station']);
        $('#cutoff-station-2').val(obj['cutoff-station-2']);
        $('#cutoff-station-3').val(obj['cutoff-station-3']);
        $('#cutoff-station-4').val(obj['cutoff-station-4']);
        $('#inspection-station').val(obj['inspection-station']);
        $('#inspection-station-2').val(obj['inspection-station-2']);
        $('#inspection-station-3').val(obj['inspection-station-3']);
        $('#inspection-station-4').val(obj['inspection-station-4']);
        $('#ring_station').val(obj['ring_station']);
        $('#ring_station-2').val(obj['ring_station-2']);
        $('#ring_station-3').val(obj['ring_station-3']);
        $('#ring_station-4').val(obj['ring_station-4']);
        $('#geoform').val(obj['geoform']);
        $('#geoform-2').val(obj['geoform-2']);
        $('#geoform-3').val(obj['geoform-3']);
        $('#geoform-4').val(obj['geoform-4']);
        $('#geoform_ring_concentric').val(obj['geoform_ring_concentric']);
        $('#geoform_ring_concentric-2').val(obj['geoform_ring_concentric-2']);
        $('#geoform_ring_concentric-3').val(obj['geoform_ring_concentric-3']);
        $('#geoform_ring_concentric-4').val(obj['geoform_ring_concentric-4']);
        $('#coil_alloc').val(obj['coil_alloc']);
        $('#coil_alloc-2').val(obj['coil_alloc-2']);
        $('#coil_alloc-3').val(obj['coil_alloc-3']);
        $('#coil_alloc-4').val(obj['coil_alloc-4']);
        $('#mesh_alloc').val(obj['mesh_alloc']);
        $('#mesh_alloc-2').val(obj['mesh_alloc-2']);
        $('#mesh_alloc-3').val(obj['mesh_alloc-3']);
        $('#mesh_alloc-4').val(obj['mesh_alloc-4']);
        $('#final_inspection').val(obj['final_inspection']);
        $('#final_inspection-2').val(obj['final_inspection-2']);
        $('#final_inspection-3').val(obj['final_inspection-3']);
        $('#final_inspection-4').val(obj['final_inspection-4']);
    }

    $('#main-table-show').click(function() {
        // $('#orders-table').toggleClass("d-table");
        $('#main-table').slideToggle();
    })

    $('#main-table-save').click(function() {
        let obj = {
            id: $('#id').val(),
            tubmil_log: $('#tubmil_log').val(),
            tubmil_log_2: $('#tubmil_log-2').val(),
            tubmil_log_3: $('#tubmil_log-3').val(),
            tubmil_log_4: $('#tubmil_log-4').val(),
            tubmil_setup: $('#tubmil_setup').val(),
            tubmil_setup_2: $('#tubmil_setup-2').val(),
            tubmil_setup_3: $('#tubmil_setup-3').val(),
            tubmil_setup_4: $('#tubmil_setup-4').val(),
            first_part_drift: $('#first_part_drift').val(),
            first_part_drift_2: $('#first_part_drift-2').val(),
            first_part_drift_3: $('#first_part_drift-3').val(),
            first_part_drift_4: $('#first_part_drift-4').val(),
            welding_station_cklist: $('#welding_station_cklist').val(),
            welding_station_cklist_2: $('#welding_station_cklist-2').val(),
            welding_station_cklist_3: $('#welding_station_cklist-3').val(),
            welding_station_cklist_4: $('#welding_station_cklist-4').val(),
            worksheet: $('#worksheet').val(),
            worksheet_2: $('#worksheet-2').val(),
            worksheet_3: $('#worksheet-3').val(),
            worksheet_4: $('#worksheet-4').val(),
            direct_pack: $('#direct_pack').val(),
            direct_pack_2: $('#direct_pack-2').val(),
            direct_pack_3: $('#direct_pack-3').val(),
            direct_pack_4: $('#direct_pack-4').val(),
            cutoff_station: $('#cutoff-station').val(),
            cutoff_station_2: $('#cutoff-station-2').val(),
            cutoff_station_3: $('#cutoff-station-3').val(),
            cutoff_station_4: $('#cutoff-station-4').val(),
            inspection_station: $('#inspection-station').val(),
            inspection_station_2: $('#inspection-station-2').val(),
            inspection_station_3: $('#inspection-station-3').val(),
            inspection_station_4: $('#inspection-station-4').val(),
            ring_station: $('#ring_station').val(),
            ring_station_2: $('#ring_station_2').val(),
            ring_station_3: $('#ring_station_3').val(),
            ring_station_4: $('#ring_station_4').val(),
            geoform: $('#geoform').val(),
            geoform_2: $('#geoform-2').val(),
            geoform_3: $('#geoform-3').val(),
            geoform_4: $('#geoform-4').val(),
            geoform_ring_concentric: $('#geoform_ring_concentric').val(),
            geoform_ring_concentric_2: $('#geoform_ring_concentric-2').val(),
            geoform_ring_concentric_3: $('#geoform_ring_concentric-3').val(),
            geoform_ring_concentric_4: $('#geoform_ring_concentric-4').val(),
            coil_alloc: $('#coil_alloc').val(),
            coil_alloc_2: $('#coil_alloc-2').val(),
            coil_alloc_3: $('#coil_alloc-3').val(),
            coil_alloc_4: $('#coil_alloc-4').val(),
            mesh_alloc: $('#mesh_alloc').val(),
            mesh_alloc_2: $('#mesh_alloc-2').val(),
            mesh_alloc_3: $('#mesh_alloc-3').val(),
            mesh_alloc_4: $('#mesh_alloc-4').val(),
            final_inspection: $('#final_inspection').val(),
            final_inspection_2: $('#final_inspection-2').val(),
            final_inspection_3: $('#final_inspection-3').val(),
            final_inspection_4: $('#final_inspection-4').val(),
        }

        let flag = false;
        Object.keys(obj).forEach(key => {
            if (obj[key] === '') flag = true;
        })
        if (flag) alert("Please input all data!");
        else {
            $.ajax({
                url: '/api/v1/footer_for_pdf/create',
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
                url: `/api/v1/delete_row/ship_method/id/${id}`,
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
        $('#id').val('');
        $('#tubmil_log').val('');
        $('#tubmil_log_2').val('');
        $('#tubmil_log_3').val('');
        $('#tubmil_log_4').val('');
    })

})
