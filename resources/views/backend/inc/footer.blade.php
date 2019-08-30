<!-- <footer class="footer">
            © 2018 Eliteadmin by themedesigner.in
        </footer> -->
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<script src="{{url('/')}}/back/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
<!-- Bootstrap popper Core JavaScript -->
<script src="{{url('/')}}/back/assets/node_modules/popper/popper.min.js"></script>
<script src="{{url('/')}}/back/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{url('/')}}/back/js/perfect-scrollbar.jquery.min.js"></script>
<!--Wave Effects -->
<script src="{{url('/')}}/back/js/waves.js"></script>
<!--Menu sidebar -->
<script src="{{url('/')}}/back/js/sidebarmenu.js"></script>
<!-- fontIconPicker JS -->
<script type="text/javascript" src="{{url('/')}}/back/fontIconPicker/jquery.fonticonpicker.min.js"></script>
<!--Custom JavaScript -->
<script src="{{url('/')}}/back/js/custom.min.js"></script>
<script src="{{url('/')}}/back/assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
<script src="{{url('/')}}/back/assets/node_modules/gauge/gauge.min.js"></script>

<script src="{{url('/')}}/back/js/pages/widget-data.js"></script>

<!-- bt-switch -->
<script src="{{url('/')}}/back/assets/node_modules/bootstrap-switch/bootstrap-switch.min.js"></script>
<!-- icheck -->
<script src="{{url('/')}}/back/assets/node_modules/icheck/icheck.min.js"></script>
<script src="{{url('/')}}/back/assets/node_modules/icheck/icheck.init.js"></script>

<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<script src="{{url('/')}}/back/assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
<script src="{{url('/')}}/back/assets/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript">
</script>
<!--morris JavaScript -->
<script src="{{url('/')}}/back/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript" src="{{url('/')}}/back/assets/node_modules/multiselect/js/jquery.multi-select.js">
</script>
<script src="{{url('/')}}/back/assets/node_modules/tinymce/plugins/pagebreak/plugin.min.js"></script>
<script src="{{url('/')}}/back/assets/node_modules/tinymce/plugins/visualblocks/plugin.min.js"></script>
<script src="{{url('/')}}/back/assets/node_modules/raphael/raphael-min.js"></script>
<script src="{{url('/')}}/back/assets/node_modules/morrisjs/morris.min.js"></script>
<script src="{{url('/')}}/back/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
<!-- Popup message jquery -->
<script src="{{url('/')}}/back/assets/node_modules/toast-master/js/jquery.toast.js"></script>
<!-- Chart JS -->
<script src="{{url('/')}}/back/js/dashboard1.js"></script>

<script src="{{url('/')}}/back/assets/node_modules/moment/min/moment.min.js"></script>
<script src="{{url('/')}}/back/assets/node_modules/wizard/jquery.steps.min.js"></script>
<script src="{{url('/')}}/back/assets/node_modules/wizard/jquery.validate.min.js"></script>
<script src="{{url('/')}}/back/assets/node_modules/tinymce/plugins/paste/plugin.min.js"></script>

<script src="{{url('/')}}/back/assets/node_modules/wizard/steps.js"></script>
<script src="{{url('/')}}/back/assets/node_modules/dropify/dist/js/dropify.min.js"></script>
<script src="{{url('/')}}/back/assets/node_modules/tinymce/tinymce.min.js"></script>
<script src="{{url('/')}}/back/assets/node_modules/sweetalert/sweetalert.min.js"></script>
<script src="{{url('/')}}/back/assets/node_modules/sweetalert/jquery.sweet-alert.custom.js"></script>
<script src="{{url('/')}}/back/assets/node_modules/datatables/jquery.dataTables.min.js"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="{{url('/')}}/back/js/pages/jquery.PrintArea.js" type="text/JavaScript"></script>
<script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup 
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
    </script>
<script>
    $(document).ready(function () {
        // Basic
        $('.dropify').dropify();

    });

</script>
<script>
    jQuery(document).ready(function () {
        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
    });

</script>
<script>
    $(document).ready(function () {
        $(".alert").fadeOut(5000);
    });

</script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('#mytext').fontIconPicker({
            source: ['icon-heart', 'icon-search', 'icon-user', 'icon-tag', 'icon-help',
                'icon-thumbs-up-alt', 'icon-left-dir', 'icon-up-dir', 'icon-down-dir',
                'icon-volume-down',
                'icon-wrench', 'icon-cog', 'icon-phone-squared', 'icon-upload-cloud',
                'icon-thumbs-down-alt', 'icon-bookmark', 'icon-eye', 'icon-info-circled',
                'icon-help-circled',
                'icon-cancel', 'icon-star', 'icon-right-dir', 'icon-home', 'icon-doc',
                ' icon-coffee', 'icon-windows', 'icon-bitbucket', 'icon-youtube', 'icon-android',
                'icon-male', 'icon-skype',
                'icon-book', 'icon-desktop', 'icon-food', 'icon-flag', 'icon-gift', 'icon-moon',
                'icon-laptop', 'icon-key', 'icon-plane', 'icon-signal', 'icon-umbrella',
                'icon-truck', 'icon-hospital', 'icon-apple', 'icon-suitcase', 'icon-money',
                'icon-lightbulb', 'icon-fire',
                'icon-folder-open', 'icon-headphones', 'icon-gamepad', 'icon-music',
            ],
            emptyIcon: true,
            hasSearch: true,

        });
    });

</script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
        $(document).ready(function () {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function (settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function (group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td colspan="5">' + group +
                                '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

</script>
@yield('js')
</body>

</html>
