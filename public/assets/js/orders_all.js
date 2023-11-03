$(document).ready(function () {
    function request1(type) {
        //alert(setting.server+ api);
        $('#coildata_get').val(type);
        var part_id = $('#part_id').val();
        var job = $('#job').val();

        $('#coil_data').html('<tr><td colspan="7">Loading....</td></tr>');

        // $.post(setting.server + "index.php?url=order_list_coil&type=" + type + "&part_id=" + part_id + "&job=" + job, function (data) {
        //     if (data['done'] == null) {
        //         $('#coil_data').html('<tr><td colspan="7">No Matching Records Found</td></tr>');
        //     } else {
        //         $('#coil_data').html(data['done']);
        //     }
        //     //refresh right weight
        //     get_weight($('#job').val());
        // })

    }

    request1(4);

    //weight
    $('.inputweight input[type="radio"]').on('change', function () {


        $(document).off('change', '#coil_data input[type="checkbox"]');

        if ($(this).hasClass('Allocated')) {
            $(document).on('change', '#coil_data input[type="checkbox"]', function () {
                let $this = $(this);
                $('#coil_data input[type="checkbox"]').not($this).attr('checked', false);
                if ($this.is(':checked')) {
                    let $this = $(this), valuehold = $this.parents('tr').find('td').eq(2).text(),
                        coilno = $this.parents('tr').find('td').eq(1).text();
                    $('.inputWeightParent input[type="text"]').css('border-color', '');
                    $('.inputWeightParent').css('display', 'inline-block');
                    $('.inputWeightParent input[type="text"]').val('0').attr('data-vall', valuehold).attr('data-coilno', coilno).attr('data-updateable', 'false');
                } else {
                    $('.inputWeightParent').css('display', 'none');
                }

            });

        } else {
            $('.inputWeightParent').hide();

        }
    });//change close here

    $('.inputWeightParent input[type="text"]').on('keyup', function () {
        $(this).css('border-color', '');
        let $this = $(this);
        this.value = this.value.replace(/[^0-9\.]/g, '');
        if (parseInt($this.val()) > parseInt($this.attr('data-vall'))) {
            $(this).css('border-color', 'red');
            $(this).attr('data-updateable', 'false');
        } else {
            $(this).attr('data-updateable', 'true');
        }

    });//input update
    $('#Enter_as_Used').on('click', function () {
        let textf = $('.inputWeightParent input[type="text"]');
        if (textf.attr('data-updateable') == 'true') {
            // $.post(setting.server + "index.php?url=Enter_as_Used&newval=" + textf.val() + "&coil=" + textf.attr('data-coilno') + "&oldone=" + textf.attr('data-vall'),
            //     function (data) {
            //         if (data.done.query == 1) {
            //             let old = textf.attr('data-vall'), newone = textf.val();
            //             let radio = $('#coil_data input[type="radio"]:checked');
            //             radio.parents('tr').find('td').eq(2).text(old - newone);
            //             let valuehold = radio.parents('tr').find('td').eq(2).text(),
            //                 coilno = radio.parents('tr').find('td').eq(1).text();
            //             $('.inputWeightParent input[type="text"]').val('0').attr('data-vall', valuehold).attr('data-coilno', coilno).attr('data-updateable', 'false');
            //             ;
            //             get_weight($('#job').val());
            //         } else if (data.done.query == 2) {
            //             $('#coil_data input[type="radio"]:checked').parents('tr').remove();
            //             get_weight($('#job').val());
            //         } else {
            //             alert("something wrong!");
            //         }
            //     })
        } else {
            alert('Please Fill Value it does not same or not greater than last vlaue!');
        }
    });

    function request2(type) {

        //console.log(setting.server);

        $('#layer_get').val(type);
        var part_id = $('#part_id').val();
        var rdchecked = $("input[name='meshdata']:checked").val();
        var job = $('#job').val();

        $('#mesh_data' + type).html('<tr><td colspan="8">Loading....</td></tr>');

        if (rdchecked != undefined) {
            // $.post(setting.server + "index.php?url=order_list_mesh_order&type=" + type + "&part_id=" + part_id + "&rdchecked=" + rdchecked + "&job=" + job,
            //     function (data1) {
            //         //console.log(data1);
            //         if (data1['done'] == null) {
            //             $('#mesh_data' + type).html('<tr><td colspan="9">No Matching Records Found</td></tr>');
            //         } else {
            //             $('#mesh_data' + type).html(data1['done']);
            //         }
            //         preview_length();
            //     })
        }


    }

    $(document).ready(function () {


        $('.mesh_length input[type="radio"]').on('click', function () {

            var id_data1 = $('#layer_get').val();
            // console.log('aaa-------->',id_data1)
            request2(id_data1);


            //length
            var id_data1 = $('#layer_get').val();
            $(document).on('change', '#layer_get', function () {
                var id_data1 = $(this).val();
            });
            // var selector = "#mesh_data" +id_data1+ ' input[type="'+'checkbox"'+ "]";
            var selector = '.mesh_datas input[type="checkbox"]';
            //console.log(id_data1);

            $(document).off('change', selector);

            if ($(this).hasClass('Allocated')) {
                $(document).on('change', selector, function () {
                    let $this = $(this);
                    $(selector).not($this).attr('checked', false);
                    if ($this.is(':checked')) {
                        let $this = $(this), valuehold = $this.parents('tr').find('td').eq(5).text(), mesh_no = $this.val();
                        $('.inputlengthParent input[type="text"]').css('border-color', '');
                        $('.inputlengthParent').css('display', 'inline-block');
                        $('.inputlengthParent input[type="text"]').val('0').attr('data-vall', valuehold).attr('data-mesh_no', mesh_no).attr('data-updateable', 'false');
                    } else {
                        $('.inputlengthParent').css('display', 'none');
                    }

                });
//event.preventDefault();
            } else {
                $('.inputlengthParent').hide();

            }
        });//change close here

        $('.inputlengthParent input[type="text"]').on('keyup', function () {
            $(this).css('border-color', '');
            let $this = $(this);
            this.value = this.value.replace(/[^0-9\.]/g, '');
            if (parseInt($this.val()) > parseInt($this.attr('data-vall'))) {
                $(this).css('border-color', 'red');
                $(this).attr('data-updateable', 'false');
            } else {
                $(this).attr('data-updateable', 'true');
            }

        });//input update length


    })

    function request3(type) {

        if (type == 1) {
            if ($('.startedcls').is(":checked")) {
                $("#databegan").show();
                $(".checkedbox").show();

            } else {
                $("#databegan").hide();
                $(".checkedbox").hide();
            }

        } else if (type == 2) {
            if ($('.finishedcls').is(":checked")) {
                $("#datefinish").show();
            } else {
                $("#datefinish").hide();
            }
        } else if (type == 3) {
            if ($('.shippedcls').is(":checked")) {
                $("#dateship").show();
            } else {
                $("#dateship").hide();
            }
        }

    }


    function update_allocation(type, self) {

        if (type == 1 || type == 2 || type == 3) {
            if ($('#coil_data input[type="checkbox"]:checked').length != 0) {

                let allfiled = [];
                if ($('#coil_data input[type="checkbox"]:checked').length != 0) {
                    //console.log(type);
                    var job = $('#job').val();
                    $('#coil_data input[type="checkbox"]:checked').each(function (i, j) {
                        allfiled[i] = $(j).val();
                    });
                    // $.post(setting.server + "index.php?url=update_data&type=" + type + "&id=" + JSON.stringify(allfiled) +
                    //     "&job=" + job, function (data) {
                    //     var id_data = $('#coildata_get').val();
                    //     request1(id_data);
                    //     get_weight($('#job').val());
                    // });
                } else {
                    alert('At least 1 item should be selected !');
                }
            }
        }

        if (type == 4 || type == 5) {

            let $this = $(self).attr('data-body');


            let allfiled = [];
            if ($('#' + $this + ' input[type="checkbox"]:checked').length != 0) {
                var job = $('#job').val();
                $('#' + $this + ' input[type="checkbox"]:checked').each(function (i, j) {
                    allfiled[i] = $(j).val();
                });

                // $.post(setting.server + "index.php?url=update_data&type=" + type + "&id=" + JSON.stringify(allfiled) + "&job=" + job, function (data) {
                //     var id_data1 = $('#layer_get').val();
                //     request2(id_data1);
                //     preview_length();//mesh preview legth
                // });

            } else {
                alert('At least 1 item should be selected !');
            }


        }


    }

    function getRadio(id) {
        $('#radio_id').val(id);
    }

    function getMeshRadio(id) {
        $('#mesh_radio_id').val(id);
    }


    function ReverseProg() {
        var Alloc = document.getElementById("AllocRadio");
        Alloc.checked = false;
    }

    function ReverseEver() {
        var Alloc = document.getElementById("AllocRadio");
        Alloc.checked = false;
        Alloc.disabled = true;
    }

    //////////////////////

    var data, cur = 0;

    function deleteDetail() {

        var form_data = parseForm('detail.form'),
            msg  = message('Deleting...');

        request('table/orders_tbl/delete', {id: form_data.id})
            .always(function() {
                msg.remove()
            })
            .done(function(res) {
                message('Deleted', 2000);
                //quoteChanged();
            })
    }

    function resetDetail() {
        resetForm('detail.form');
        var quote = $('[var=quote]').val();
        $('#detail-quote').val(quote);
    }

    function saveDetail() {

        // validate input
        var invalid = $('[form="detail.form"] [mask].invalid').filter(':first')

        if ( invalid.length )
            return message(invalid.attr('field'), 2000)

        var form_data = parseForm('detail.form'),
            msg  = message('Saving...');

        request('table/orders_tbl/save', form_data)
            .always(function(){
                msg.remove()
            })
            .done(function(res){
                message('Saved', 2000);
                //quoteChanged();
            })

    }

    function saveMaster() {

        // validate input
        var invalid = $('[form="table.form"] [mask].invalid').filter(':first')

        if ( invalid.length )
            return message(invalid.attr('field'), 2000)

        var data = parseForm('table.form');
        msg  = message('Saving...'),

            tbl  = $('[form="table.form"]').attr('table-name')
        tblps  = $('[form="table.form"]').attr('tableps')
        data['part'] = $( "#part_id option:selected" ).text();

        var curret = $('#filter tbody tr.active');

        dataps = {
            job : data.job,
            cust_id : data.cust_id,
            quantity : data.quantity,
            ship_date : data.ship_date
        }

        //console.log("my data", data.job, data.cust_id, data.quantity, data.ship_date);
        //console.log("form data", dataps);
        //return false;

        curret.find('td:eq(0)').text(data.job).attr('title',data.job);
        curret.find('td:eq(1)').text(data.cust_id).attr('title',data.cust_id);
        // curret.find('td:eq(2)').text(data.po);
        curret.find('td:eq(3)').text(data.part).attr('title',data.part);
        curret.find('td:eq(4)').text(data.quantity).attr('title',data.quantity);
        curret.find('td:eq(15)').text(data.price).attr('title',data.price);
        curret.find('td:eq(5)').text(data.ordered).attr('title',data.ordered);
        curret.find('td:eq(6)').text(data.due).attr('title',data.due);
        curret.find('td:eq(7)').text(data.has_started).attr('title',data.has_started);
        curret.find('td:eq(8)').text(data.began).attr('title',data.began);
        curret.find('td:eq(9)').text(data.has_finished).attr('title',data.has_finished);
        curret.find('td:eq(10)').text(data.finished).attr('title',data.finished);
        curret.find('td:eq(11)').text(data.has_shipped).attr('title',data.has_shipped);
        curret.find('td:eq(12)').text(data.shipped).attr('title',data.shipped);
        curret.find('td:eq(14)').text(data.item).attr('title',data.item);
        curret.find('td:eq(23)').text(data.inspector).attr('title',data.inspector);
        curret.find('td:eq(20)').text(data.mill_operator).attr('title',data.mill_operator);
        curret.find('td:eq(21)').text(data.cutoff_operator).attr('title',data.cutoff_operator);
        curret.find('td:eq(24)').text(data.weld_spec_mill).attr('title',data.weld_spec_mill);
        curret.find('td:eq(25)').text(data.weld_spec_repair).attr('title',data.weld_spec_repair);
        curret.find('td:eq(26)').text(data.ship_date).attr('title',data.ship_date);
        curret.find('td:eq(33)').text(data.cont_type).attr('title',data.cont_type);
        curret.find('td:eq(33)').text(data.ship_method).attr('title',data.ship_method);
        curret.find('td:eq(22)').text(data.repair_welder).attr('title',data.repair_welder);

        console.log(data)

        request('table/'+ tbl +'/save', data)
            .always(function(){
                //  console.log(' I am hereee');
                msg.remove()
            })
            .done(function(res){
                //alert(JSON.stringify(res));
                // console.log(' I am done with that');
                //console.log(res);
                message('Saved', 2000)

                EVENTS['table.list']();

            })


        request('table/'+ tblps +'/save', dataps)
            .always(function(){
                //  console.log(' I am hereee');
                msg.remove()
            })
            .done(function(res){
                //alert(JSON.stringify(res));
                // console.log(' I am done with that');
                //console.log(res);
                message('Saved', 2000)

                EVENTS['table.list']();

            })
    }


    function resetEverything() {
        resetForm('table.form');
        setTimeout(function() {
            resetDetail();
            $('.detail').hide();
        }, 1000);
    }

    function deleteEverything() {
        var job = $('[var=job]').val(),
            msg  = message('Deleting...');
        request('table/orders_tbl/delete', {'job': job})
            .always(function() {
                msg.remove()
            })
            // .done(function(res) {
            //     message('Deleted', 2000);
            //     var data = parseForm('table.form'),
            //         msg  = message('Deleting...'),
            //         tbl  = $('[form="table.form"]').attr('table-name')

            //     request('table/'+ tbl +'/delete', data)
            //         .always(function(){
            //             msg.remove()
            //         })
            .done(function(response){

                message('Deleted', 2000)

                resetForm('table.form');
                EVENTS['table.list']();
                //setTimeout(function() {
                //  $('.detail').hide();
                //}, 1000);

            })
        //})
    }
    var calculation = [];

    $('.Enter_asUsedmesh').on('click',function(){
        let textf = $('.inputlengthParent input[type="text"]');
        if(textf.attr('data-updateable') == 'true'){
            // $.post(setting.server+"index.php?url=Enter_as_Used_mesh&newval="+textf.val()+"&mesh_n="+textf.attr('data-mesh_no')+"&oldone="+textf.attr('data-vall'),
            //     function(data){
            //         if(data.done.query ==1){
            //             let old = textf.attr('data-vall'),newone = textf.val();
            //             let radio = $('.mesh_datas input[type="radio"]:checked');
            //             radio.parents('tr').find('td').eq(5).text(old-newone);
            //             let valuehold =radio.parents('tr').find('td').eq(5).text(),mesh_no = radio.parents('tr').find('td').eq(0).val();
            //             $('.inputlengthParent input[type="text"]').val('0').attr('data-vall',valuehold).attr('data-mesh_no', mesh_no).attr('data-updateable','false');;
            //             preview_length();
            //         }else if(data.done.query ==2){
            //             $('.mesh_datas input[type="radio"]:checked').parents('tr').remove();
            //             preview_length();
            //         }
            //         else {
            //             alert("something wrong!");
            //         }
            //     })
        }
        else{
            alert('Please Fill Value it does not same or not greater than last vlaue!');
        }
    });
    preview_length();//mesh weight preview




    $('.detail').hide();
    // part detail on change
    // $('#part_id').on('click',function(){
    //     part_update($(this).val());
    // });

    function runfunction(){
        $('.quantity').trigger('keyup');
    }

    getid();

    $(document).on('click','[ev="form.reset"]',function(){
        getid();
    });

    //calculation based on quantity
    $('.quantity').on('keyup',function(){
        let $thisval = $(this).val();
        if (calculation.length !=0){
            $.each(calculation,function(i,j){
                $('.'+i).val((parseFloat(j.toFixed(3))*parseFloat($thisval)).toFixed(3));
            });
        }
    });


    ////////////////////////
    $('select[var="cust_id"]').on('change',function(e){


        onCustomerChange(this);



    });



    // $.post(setting.server+"index.php?url=custorderwise",
    //     function(response){
    //         //console.log(response);
    //         var cust = $('[var="cust_id"]');
    //         for(var i=0; i<response.list.length; i++)
    //         {
    //             cust.append(
    //                 $('<option>'+ response.list[i].customer +'</option>').prop('value', response.list[i].cust_id)
    //             )
    //
    //         }
    //         onCustomerChange(cust);
    //
    //     });

    function onCustomerChange(select) {

        var part = $('.part_id');
        // change value of filter for part_id

        part.attr('filter_value', select.value);

        // remove all options from part_id
        part.find('option').remove();


        // append new options for part_id
        var column = part.attr('column'),
            source = part.attr('data-tablen'),
            value = part.attr('value-field') || column,
            filter_column = part.attr('data-filtercolumn'),
            filter_value = part.attr('filter_value');

        var cust = $('[var="cust_id"]').val();

        // if(e ==1){



        request('table/'+ source +'/fetch', { "cust_id":cust })
            .done(function(response){
                if (!response.list) return;
                part.append(
                    $('<option> Please Select Part No. </option>').prop('value', ''))

                for(var i=0; i<response.list.length; i++)
                {
                    var option = response.list[i];

                    if (filter_column && filter_value) {
                        if (option [ filter_column ] != filter_value) continue;
                    }

                    if (!saved_i) var saved_i = i;

                    part.append(
                        $('<option>'+ option[ column ] +'</option>').prop('value', option[ value ])
                    )
                }
                $('.inputWeightParent').hide();
                get_weight($('#job').val());
                preview_length();
                part_update($('#part_id').val());
                // if(e==1){
                if(response.list.length !=0){
                    onPartNoChange(response.list[saved_i].part);
                }
                // }

            });

        // }
    }
    //weight label
    function get_weight(job){
        let jobid = job ;
        jobid = parseInt(jobid);
        // $.post(setting.server+"index.php?url=weight_show&job="+jobid, function(data){
        //     $('#allocated b').text(data.done.tw);
        //     $('#already b').text(data.done.used);
        //     $('#dedicated b').text((parseInt(data.done.tw) + parseInt(data.done.used)));
        // });
    }
    function part_update(partno){
        let partn = partno;
        if(partn != ''){
            // $.post(setting.server+"index.php?url=part_show&partn="+partn, function(data){
            //     $(".resetRadio input[type='radio']").prop('checked',false);
            //     $('#coil_data').empty();
            //     // $('#coil_data').html(data.done);
            // });
        }
    }
    //partupdate end
    function onPartNoChange(part_no) {

        // console.log('part_no')
        part_no =  $(part_no).find('option:selected').text()
        console.log(part_no)
        // console.log($(part_no).find('option:selected').text())
        if(part_no != ''){
            request('part-specs?part_name='+part_no, {})
                .done(function(response){
                    console.log('response')
                    console.log(response)
                    if (response.length !=0){
                        calculation = response.done;
                        $.each(response.done,function(i,j){
                            if ($('.quantity').val()!=''){
                                $('.'+i).val((parseFloat(j)*parseFloat($('.quantity').val())).toFixed(3));
                            }
                            else{
                                $('.'+i).val(j.toFixed(3));
                            }
                        })

                    }
                });
        }
    }

    function onPriceChange(price) {
        var revenue = $('.quantity').val() * price;
        $('.PO_total').prop('value', revenue);
    }

    function onQuantityChange(quantity) {
        var revenue = $('.price').val() * quantity;
        $('.PO_total').prop('value', revenue);
        $("[name=quantity]").val(quantity);
        $("[var=from]").attr("max", quantity);
        $("[var=to]").attr("max", quantity);
        $("[var=to]").val(quantity);
    }

    // function Enter_as_Used_mesh(self){
    //     let textf = $('.inputlengthParent input[type="text"]');
    //     let tbody  = self.attr('data-body');
    //     let allcheckbox  = $('#'+tbody).find('input[type="checkbox"]:checked');
    //     let meshlist =[];
    //     if (allcheckbox.length !=0){
    //         allcheckbox.each(function(i,j){
    //             meshlist[i] = $(j).val();
    //         });
    //         $.post(setting.server+"index.php?url=Enter_as_Used_mesh&jobno="+$('#job').val()+"&meshlist="+JSON.stringify(meshlist),
    //         function(response){
    //             preview_length();//mesh preview legth
    //             if (response.done.length !=0){
    //                 if(response.done['INSERT']==true){
    //                     $('#'+tbody+' input[type="checkbox"]').attr('checked',false);
    //                 }
    //             }
    //         });
    //     }else{
    //         alert('Select atleast one field !');

    //     }
    // }


    function preview_length(){
        // $.post(setting.server+"index.php?url=meshtotal_show&jobno="+$('#job').val(),
        //     function(r){
        //         if (r.done.length !=0){
        //             $('#allocatedmesh b').text(r.done.ML);
        //             $('#alreadymesh b').text(r.done.EL);
        //             $('#dedicatedmesh b').text(parseInt(r.done.ML) + parseInt(r.done.EL));
        //         }
        //     });
    }
    function validateForPdf()
    {
        var job_value = parseFloat($("#job").val());
        var quantity = parseFloat($('input[var="quantity"]').val());
        //var no_of_items = parseFloat($("#no_of_items").val());
        var start_tube = parseFloat($('#start_tube').val());
        var end_tube = parseFloat($('#end_tube').val());
        if(!job_value || !quantity){
            $(".msg").html('<span>Please fill the Job/Quantity fields</span>');
            return false;
        }
        if(start_tube >= quantity || !start_tube){
            $(".msg").html('<span>start tube value is not valid</span>');
            return false;
        }
        if (end_tube > quantity || !end_tube || end_tube < start_tube){
            $(".msg").html('<span>end tube value is not valid</span>');
            return false;
        }
        var url = "/order_dev.php?job_number="+job_value+"&start="+start_tube+"&end="+end_tube+"&quantity="+quantity;
        var win = window.open(url, '_blank');
        win.focus();
        $(".simplePopupBackground").hide();
        $(".simplePopup").hide();

    }

    // $('.info_pop').simplePopup({
    //     centerPopup: true,
    //     closed: function () {
    //         runfunction();
    //     }
    // });
    calldata($('#part_id'));

    function calldata(d){
        var v = $(d).val();

        var url = '/TPM-master/api/test.php?view=ajax_part_detail&part=' + v;

        $.get(url, function (data, status)
        {
            if (status == "success")
            {
                var jsonResult;
                try
                {
                    jsonResult = JSON.parse(data);
                    //console.log(jsonResult);

                    var len = $.map(jsonResult, function (n, i) {
                        return i;
                    }).length;

                    if (len > 0)
                    {
                        for (var i in jsonResult)
                        {
                            $(".info_pop input[name='" + i + "']").val(jsonResult[i]);
                            $(".info_pop textarea[name='" + i + "']").val(jsonResult[i]);
                            $(".info_pop select[name='" + i + "']").val(jsonResult[i]);
                        }
                    }
                    else
                    {
                        alert("No Data found");

                        $(".info_pop input").not("[name='part']").val("");
                    }
                }
                catch (e)
                {
                    console.log("error: " + e);
                    alert(data);
                }
            }
            else
            {
                alert("failed to get details");
            }

        });
    }
    //$('#overlay').css('display','block');
    //quoteChanged();
    // $(".info_pop input[name='part']").trigger("change");




    $('#prev-page').click(function(e){

        if($('#filter tbody tr:first').hasClass('active')){
            var ne = $('#filter .paginationulorder li.active').prev().find('a');
            ne.trigger('click');
            eventrigger = 0;
        }else{
            $('#filter').hide();
            var da = $('#filter tbody tr.active').prev().trigger('click');

            $('#filter').hide();
            if($('.pagicommon .firstpagina').hasClass('active')){
                if(da.index()==0){
                    $(this).hide();
                }
            }
        }
        $('#next-page').show();
    });

    $('#next-page').click(function(e){



        if($('#filter tbody tr:last').hasClass('active')){
            var ne = $('#filter .paginationulorder li.active').next().find('a');
            ne.trigger('click');
            eventrigger = 1;
        }else{
            $('#filter').hide();
            var lasat = $('#filter tbody tr.active').next().trigger('click');
            $('#filter').hide();
            if($('.pagicommon .lastpagina').hasClass('active')){
                if(lasat.is(':last-child')){
                    $(this).hide();
                }
            }
        }
        $('#prev-page').show();
    });
    var pageno,rowno;
    $(document).on('click','#filter tbody tr',function(){
        var $this = $(this);
        let current = 0;
        $('select[var="cust_id"] option').each(function(){
            if($(this).val() == $this.find('td:eq(1)').text() ){
                current = $(this).attr('value');
            }
        });
        let selectionpar = $this.find('td:eq(3)').text();
        oldvalue1 = current;
        oldvalue2 = selectionpar;

        if(current!=null){
            $.post(setting.server+"index.php?url=part_mat"+"&userid="+current,
                function(res){
                    var output =[];
                    output.push('<option value="">Select Part</option>');
                    $.each(res.list, function(key, value){
                        if(value['part'] == selectionpar){
                            output.push('<option selected value="'+ value['part'] +'">'+ value['part'] +'</option>');
                        }
                        else{
                            output.push('<option value="'+ value['part'] +'">'+ value['part'] +'</option>');
                        }
                    });
                    $('.part_id').html(output.join(''));
                    //console.log('counter1');
                });
            $('select[var="cust_id"]').val(current);
        }
        $('#page-btn').show();

        var part_no = $this.find("td:eq(3)").text();

        if(part_no != ''){
            request('part-specs?part_name='+part_no, {})
                .done(function(response){
                    if (response.length !=0){
                        calculation = response.done;
                        $.each(response.done,function(i,j){
                            if ($('.quantity').val()!=''){
                                $('.'+i).val((parseFloat(j)*parseFloat($('.quantity').val())).toFixed(3));
                            }
                            else{
                                $('.'+i).val(j.toFixed(3));
                            }
                        })

                    }
                });
        }

        $('.mesh_length input').prop('checked', false);
        $('#mesh_data1').html('');


    });


    function quoteChanged() {

        var job = '';
        request('table/orders_tbl/fetch')
            .done(function(res) {
                // if(!job)
                //     return;


                data = res.list;
                if(!data.length) {
                    $('#page-btn').hide();
                    return;
                }


                fillForm('table.form', data[data.length-1], 'var');
                fillForm('table.form', data[data.length-1], 'val');

                cur = 0;

                $('#page-btn').show();
                $('#prev-page').show();
                $('#first-page').show();
                $('#next-page').hide();
                $('#last-page').hide();

                $('#page-no').html($('#job').val());

                //$('#first-page').hide();
                //$('#prev-page').hide();

                if(cur == data.length - 1) {
                    $('#next-page').hide();
                    $('#last-page').hide();
                }

                //calcRateInfo();
                $('#overlay').css('display','none');
            });
    }

    function show(page) {
        cur = page;
        resetForm('table.form');
        $('#overlay').css('display','block');
        fillForm('table.form', data[cur], 'var');
        fillForm('table.form', data[cur], 'val');

        $('#first-page').show();
        $('#prev-page').show();
        $('#next-page').show();
        $('#last-page').show();

        $('#page-no').html($('#job').val());
        $('#overlay').css('display','none');
        if(cur == 0) {
            $('#first-page').hide();
            $('#prev-page').hide();
        }
        if(cur == data.length - 1) {
            $('#next-page').hide();
            $('#last-page').hide();
        }
        //calcRateInfo();
    }
    function getid(){
        $.ajax({
            method:"POST",
            url:"/TPM-master/api/getid?&getidnew="+$('#job').attr('data-hold')+"&coll="+$('#job').attr('data-colla'),
            success:function(res){
                if(res['list'].length !=0){
                    let id = parseInt(res['list'][0][$('#job').attr('data-colla')]);
                    $('#job').val(id+1);

                    //call when job id need
                    $('.mesh_length input').prop('checked', false);
                    $('#mesh_data1').html('');

                    preview_length();//mesh preview length
                }
            }
        });
    }

})



