var meshList = [],
    temp_uni = [],
    layer_count = 0;
lt = 0,

    is_g = 0,   // gage
    is_id = 0,
    is_od = 0,

    os_s = 0,   // strip
    os_g = 0,
    os_id = 0,
    os_od = 0;


$(document).ready(function () {

    function deleteTable() {
        $('#layer-table').find('tbody').html('');
        layer_count = 0;
        lt = 0;
        $('#lt-disp').html(lt);
        calc_os_id();
        temp_uni = [];
    }

    function calc_is_od() {
        is_od = parseFloat(parseFloat(is_id) + 2 * is_g).toFixed(4);
        $('#is-od-disp').html(is_od);
        calc_os_id();
    }

    function set_is_id(val) {
        is_id = parseFloat(val).toFixed(4);
        $('#is-id-disp').html(is_id);
        calc_is_od();
    }

    function set_is_g(val) {
        is_g = parseFloat(val).toFixed(4);
        calc_is_od();
    }

    function set_os_s(val) {
        os_s = parseFloat(val).toFixed(4);
    }

    function set_os_g(val) {
        os_g = parseFloat(val).toFixed(4);
        calc_os_od();
    }

    function calc_os_od() {
        os_od = parseFloat(os_g * 2 + parseFloat(os_id)).toFixed(4);
        $('#os-od-disp').html(os_od);
    }

    function calc_os_id() {
        os_id = parseFloat(lt * 2 + parseFloat(is_od)).toFixed(4);
        $('#os-id-disp').html(os_id);
        calc_os_od();
    }

    function calc_gaps() {
        var side = Math.sqrt(Math.pow(4 * Math.atan(1) * os_od, 2) - Math.pow(os_s, 2));
        var angle = 90 - (Math.atan(side / os_s) * 180 / (4 * Math.atan(1)));
        var tod = is_od;
        for (var i = 1; i < temp_uni.length; i++) {
            temp_uni[i]["width"] = $("#layer-" + i + "-width").val();
            temp_uni[i]["od"] = (parseFloat(tod) + 2 * temp_uni[i]["thickness"]).toFixed(4);
            tod = (parseFloat(tod) + 2 * temp_uni[i]["thickness"]);
            var full_width = Math.sin(angle / 180 * 4 * Math.atan(1)) * 4 * Math.atan(1) * temp_uni[i]["od"];
            temp_uni[i]["gap"] = (full_width - temp_uni[i]["width"]).toFixed(5);
            $("#layer-" + i + "-gap").val(temp_uni[i]["gap"]);
            temp_uni[i]["lft_ft"] = (4 * Math.atan(1) * temp_uni[i]["od"] / full_width).toFixed(4);
            temp_uni[i]["wt_tube_ft"] = (temp_uni[i]["weight"] * temp_uni[i]["lft_ft"] * temp_uni[i]["width"] / 12).toFixed(4);
        }

    }

    function calc_widths() {

        var side = Math.sqrt(Math.pow(4 * Math.atan(1) * os_od, 2) - Math.pow(os_s, 2));
        var angle = 90 - (Math.atan(side / os_s) * 180 / (4 * Math.atan(1)));

        var tod = is_od;
        for (var i = 1; i < temp_uni.length; i++) {
            temp_uni[i]["gap"] = $("#layer-" + i + "-gap").val();
            temp_uni[i]["od"] = (parseFloat(tod) + 2 * temp_uni[i]["thickness"]);
            tod = (parseFloat(tod) + 2 * temp_uni[i]["thickness"]);

            var full_width = Math.sin(angle / 180 * 4 * Math.atan(1)) * 4 * Math.atan(1) * temp_uni[i]["od"];
            temp_uni[i]["width"] = (full_width - temp_uni[i]["gap"]).toFixed(4);
            $("#layer-" + i + "-width").val(temp_uni[i]["width"]);
            temp_uni[i]["lft_ft"] = (4 * Math.atan(1) * temp_uni[i]["od"] / full_width).toFixed(4);
            temp_uni[i]["wt_tube_ft"] = (temp_uni[i]["weight"] * temp_uni[i]["lft_ft"] * temp_uni[i]["width"] / 12).toFixed(4);
        }

    }

    function addToTable(i) {
        var tb = $('#layer-table').find('tbody');
        tb.append(
            '<tr>' +
            '<td>' + (++layer_count) + '</td>' +
            '<td>' + meshList[i].mesh + '</td>' +
            '<td>' + meshList[i].wires + '</td>' +
            '<td>' + meshList[i].weave + '</td>' +
            '<td>' + parseFloat(meshList[i].thickness).toFixed(4) + '</td>' +
            '<td>' + parseFloat(meshList[i].weight).toFixed(5) + '</td>' +
            '<td><input width value="0" id="layer-' + layer_count + '-width" type="text"></td>' +
            '<td><input gap value="0" id="layer-' + layer_count + '-gap" type="text"></td>' +
            '</tr>' +
            '<tr class="danger"><td colspan="8" id="layer-' + layer_count + '-error" style="display:none;"></td></tr>'
        );
        temp_uni[layer_count] = JSON.parse(JSON.stringify(meshList[i]));
        temp_uni[layer_count]["layer"] = layer_count;
        lt += parseFloat(meshList[i].thickness);
        $('#lt-disp').html(parseFloat(lt).toFixed(4));
        calc_os_id();
    }

    // request('table/mesh/fetch', {})
    //     .done(function (res) {
    //         meshList = res.list;
    //         for (var i = 0; i < meshList.length; i++) {
    //             var elm = $('<div>' + meshList[i].mesh + '</div>');
    //             (function (i) {
    //                 elm.dblclick(function () {
    //                     addToTable(i);
    //                 })
    //             })(i);
    //             $('#list-view').append(elm);
    //         }
    //     })

    function calc_matl_req() {
        var lwt = 0;
        var tb = $('#matl-tab').find('tbody');
        var uni = $('#UniL').val();
        var data = '';
        for (var i = 1; i < temp_uni.length; i++) {
            tb.append(
                '<tr>' +
                '<td>' + temp_uni[i].layer + '</td>' +
                '<td>' + temp_uni[i].mesh + '</td>' +
                '<td>' + (temp_uni[i].lft_ft * uni / 12).toFixed(4) + '</td>' +
                '<td>' + (temp_uni[i].wt_tube_ft * uni / 12).toFixed(4) + '</td>' +
                '</tr>'
            );

            lwt += parseFloat(temp_uni[i]["wt_tube_ft"]);
        }

        var i_oa = 0;
        var o_oa = 0;

        if ($('#InnerShroudPattern').val() != 0)
            i_oa = Math.pow($('#InnerShroudHoles').val(), 2) / Math.pow($('#InnerShroudCenter').val(), 2) * $('#InnerShroudPattern').val();
        console.log(lwt);

        if ($('#OuterShroudPattern').val() != 0)
            o_oa = Math.pow($('#OuterShroudHoles').val(), 2) / Math.pow($('#OuterShroudCenter').val(), 2) * $('#OuterShroudPattern').val();

        var i_wt = 0.29 * is_g * 4 * Math.atan(1) * is_od * uni * (100 - i_oa) / 100;
        var o_wt = 0.29 * os_g * 4 * Math.atan(1) * os_od * uni * (100 - o_oa) / 100;

        lwt = lwt * uni / 12;

        var twt = parseFloat(i_wt) + parseFloat(o_wt) + parseFloat(lwt);

        $('#v1').html(i_wt.toFixed(4));
        $('#v2').html(lwt.toFixed(4));
        $('#v3').html(o_wt.toFixed(4));
        $('#v4').html(twt.toFixed(4));

    }
});