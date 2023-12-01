"use strict";
var KTDatatablesAdvancedColumnVisibility = function() {

    const init = function () {
        const table = $('#my_table').DataTable();

        $('#my_search_btn').on('click', function () {
            $('#my_table thead tr:eq(0) th').each(function (i) {
                if ($(this).html() === $('#my_search_field').val()) {
                    table.column(i).search($('#my_search_query').val()).draw();
                }
            });
        });
    };

    return {

        //main function to initiate the module
        init: function() {
            init();
        },

    };

}();

jQuery(document).ready(function() {
    KTDatatablesAdvancedColumnVisibility.init();
});
