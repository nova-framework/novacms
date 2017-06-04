$(function () {

    //set scrollbar
    $('.scroll').slimScroll({
        height: '310px'
    });

    //conditionize
    $('.conditional').conditionize();

    //datepicker
    $('body').on('click', '.datepicker', function() {
        $(this).not('.hasDatePicker').datepicker({
            controlType: 'select',
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-mm-yy",
            timeFormat: 'HH:mm',
            yearRange: "1900:+10",
            showOn:'focus',
            firstDay: 1
        }).focus();
    });

    //datetimepicker
    $('body').on('click', '.datetimepicker', function() {
        $(this).not('.hasDateTimePicker').datetimepicker({
            controlType: 'select',
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-mm-yy",
            timeFormat: 'HH:mm',
            yearRange: "1900:+10",
            showOn:'focus',
            firstDay: 1
        }).focus();
    });

    //timepicker
    $('body').on('click', '.timepicker', function() {
        $(this).not('.hasTimePicker').timepicker().focus();
    });

    //daterangepicker
    $('.daterange').daterangepicker({
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
           'Last 7 Days': [moment().subtract('days', 6), moment()],
           'Last 30 Days': [moment().subtract('days', 29), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Next Month': [moment().add('month', 1).startOf('month'), moment().add('month', 1).endOf('month')],
           'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
        },
        startDate: moment().subtract('days', 29),
        endDate: moment(),
        format: 'YYYY-MM-DD'
        },
        function(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    });

    //colorpicker
    $(".colorpicker").colorpicker();

    //tags
    $('.tags').tagsinput();

    $(".sort").tablesorter({dateFormat: "uk"});

    //toggle for yes or no
    $(".yestoggle").bootstrapSwitch({
        onText: 'Yes',
        offText: 'No'
    });

    //Tooltips
    $('[data-toggle="tooltip"]').tooltip();

    //select2
    $(".select2").select2({
        minimumResultsForSearch: 5
    });

    //select2 small
    $(".small-select2").select2({
        minimumResultsForSearch: 5,
        containerCssClass: 'small-select'
    });

    //global select2 ajax give a select a class of select2ajax and add a data-url='' to call the ajax url should return an array containing id and text
    $('body').on('click', '.select2ajax', function() {
        var ajaxurl = $(this).data('url');

        $(".select2ajax").select2({
            ajax: {
                url: ajaxurl,
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term // search term
                    };
                },
                processResults: function (data) {
                    // parse the results into the format expected by Select2.
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data
                    return {
                        results: data
                    };
                },
                cache: true
            },
            minimumInputLength: 1
        });
    });

    // for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        // save the latest tab; use cookies if you like 'em better:
        localStorage.setItem('lastTab', $(this).attr('href'));
    });

    // go to the latest tab, if it exists:
    var lastTab = localStorage.getItem('lastTab');
    if (lastTab) {
        $('[href="' + lastTab + '"]').tab('show');
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrfToken"]').attr('content')
        }
    });

    //call editable
    $('.edit').editable();

    $('.editdate').editable({
        format: 'yyyy-mm-dd',
        viewformat: 'dd-mm-yyyy',
        datepicker: {
            weekStart: 1
        }
    });

 });
