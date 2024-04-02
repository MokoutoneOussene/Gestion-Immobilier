<script src="{{ asset('cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js') }}"
    crossorigin="anonymous"></script>
<script src="{{ asset('asset/js/scripts.js') }}"></script>
<script src="{{ asset('js/latest.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('asset/js/datatables/datatables-simple-demo.js') }}"></script>
<script src="{{ asset('cdn.jsdelivr.net/npm/litepicker/dist/bundle.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('asset/js/litepicker.js') }}"></script>
<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{ asset('js/jqueryDataTable.min.js') }}"></script>
<script src="{{ asset('js/jqueryDataTableButtons.min.js') }}"></script>
<script src="{{ asset('js/jszip.min.js') }}"></script>
<script src="{{ asset('js/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/vfs_fonts.min.js') }}"></script>
<script src="{{ asset('js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/buttons.colvis.min.js') }}"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>

<!--   <script type="text/javascript">
    function imprimer(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
 -->

<script type="text/javascript">
    $('#datatablesSimple').DataTable({
        dom: 'Bfrtip',
        buttons: [

            {
                extend: 'colvis',
                text: 'Visibilité des colonnes',

            },
            {
                extend: 'print',
                text: 'Imprimer',
                exportOptions: {
                    columns: ':visible:not(:last-child)'
                }
            },

            {
                extend: 'pdfHtml5',
                text: ' PDF',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: ':visible:not(:last-child)'
                }
            },

            {
                extend: 'excelHtml5',
                text: 'EXCEL<br>',
                exportOptions: {
                    columns: ':visible:not(:last-child)'
                }
            },
        ]

    });
</script>
<script src="{{ asset('assets.startbootstrap.com/js/sb-customizer.js') }}"></script>

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        $("select[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
    });
</script>

{{-- <script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script> --}}

<sb-customizer project="sb-admin-pro"></sb-customizer>

<x-notify::notify />
@notifyJs

<script>
  $(document).ready(function() {
    $('.js-example-basic-single').select2({
        ajax: {
            url: '/api/search-locataires',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term,
                    page: params.page
                };
            },
            processResults: function(data, params) {
                params.page = params.page || 1;
                return {
                    results: $.map(data.items, function(item) {
                        return {
                            id: item.id,
                            text: item.nom + ' ' + item.prenom,
                            nom: item.nom,
                            prenom: item.prenom,
                            cnib: item.cnib,
                            telephone: item.telephone,
                            profession: item.profession,
                            quartier: item.quartier,
                            code: item.code,
                            adresse: item.adresse,
                            loyer: item.loyer
                        };
                    }),
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true
        },
        placeholder: 'Rechercher un locataire...',
        minimumInputLength: 2,
    }).on('select2:select', function (e) {
        var data = e.params.data;
        $('#nom').val(data.nom);
        $('#prenom').val(data.prenom);
        $('#cnib').val(data.cnib);
        $('#telephone').val(data.telephone);
        $('#profession').val(data.profession);
        $('#quartier').val(data.quartier);
        $('#code').val(data.code);
        $('#adresse').val(data.adresse);
        $('#loyer').val(data.loyer);
    });
});


</script>