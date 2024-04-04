<script src="{{ asset('cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js') }}"
    crossorigin="anonymous"></script>
<script src="{{ asset('asset/js/scripts.js') }}"></script>
<script src="{{ asset('js/latest.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('asset/js/datatables/datatables-simple-demo.js') }}"></script>
<script src="{{ asset('cdn.jsdelivr.net/npm/litepicker/dist/bundle.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('asset/js/litepicker.js') }}"></script>
<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
{{-- <script src="{{ asset('js/jqueryDataTable.min.js') }}"></script> --}}
<script src="{{ asset('js/jqueryDataTableButtons.min.js') }}"></script>
<script src="{{ asset('js/jszip.min.js') }}"></script>
<script src="{{ asset('js/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/vfs_fonts.min.js') }}"></script>
<script src="{{ asset('js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/buttons.colvis.min.js') }}"></script>

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

    $('#datatablesSimple1').DataTable({
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
<sb-customizer project="sb-admin-pro"></sb-customizer>


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
    $('.locaraireList').select2({
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