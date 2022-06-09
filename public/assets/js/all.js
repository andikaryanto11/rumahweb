(function () {

    // $('[data-toggle="tooltip"]').tooltip()
    // var oTable = $('#table').DataTable({
    //     "dom": '<<"dt-topbar" if><"t-scool" <t>><"dt-bot-bar" lp>>',
    //     "language": {
    //         "emptyTable": "Data kosong",
    //         "zeroRecords": "Data tidak ditemukan",
    //         "paginate": {
    //             "previous": "<span class='icon-fi-sr-caret-left'></span>",
    //             "next": "<span class='icon-fi-sr-caret-right'></span>",
    //         }
    //     },
    //     "info": false,
    //     // "searching": false,
    //     "bLengthChange": false,
    //     // "pageLength": 3,
    //     // "ordering": false,

    // });
    // $('#searchField').keyup(function () {
    //     oTable.search($(this).val()).draw();
    // })
    $('.menu-btn').click(function () {
        $('.sidebar').addClass('show');
        $('body').append('<div class="sidebar-overlay"></div>');
    });
    $(document).on('click', '.sidebar-overlay', function () {
        $('.sidebar').removeClass('show');
        $(this).remove();
    })
    $('select').select2({
        theme: 'bootstrap4 main-form-control',
        placeholder: "",
    });
    $('.address').select2({
        theme: 'bootstrap4 main-form-control',
        placeholder: "Pilih",
    });
    $('.searchless').select2({
        theme: 'bootstrap4 main-form-control',
        placeholder: "Pilih",
        minimumResultsForSearch: -1
    });
    $('.single-file-upload').click(function () {
        var x = $(this).find('input[type="file"]').attr("id");
        $("#" + x).change(function () {
            var x = $(this).val().replace(/.*(\/|\\)/, '');
            var filename = $(this).closest('.single-file-upload').find('.filename');
            $(filename).html(x);
        })
    })
    $('.del-img').click(function () {
        $(this).closest('.img-container').css('display', 'none');
        $('.fileupload-edit').css('display', 'block');
    })
    $('.eye-btn').click(function () {
        var input = $(this).closest('.form-inline-group').find('.pass-form');
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    $('.dropdown-arrow').click(function () {
        var idMenu = $(this).attr('aria-expanded');
        if (typeof idMenu !== typeof undefined && idMenu !== false) {
            $(this).addClass('active')
        }

    })
})();