<!DOCTYPE html>
<html lang="fr">

<head>
    @include('partials.meta')
    @yield('title')
    <title>Gestion Immobilier</title>
    @yield('style')
    @include('partials.style')
    <style>
        .inset-0 {
            z-index: 999999999 !important;
        }
    </style>

<body class="nav-fixed">
    <div class="container-fluid mt-1">
        <div class="row mt-3">
            <div class="col-12">
                <!-- Tabbed dashboard card example-->
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="text-center mb-3">Etat général des paiement</h2>
                        <table class="table table-bordered table-responsive">
                            @foreach ($bailleurs as $baill)
                            <tr>
                                <th>{{ $baill->nom }}</th>
                                <td>
                                    <tr class="text-center">
                                        <th></th>
                                        <th>Code location</th>
                                        <th>Nom locataire</th>
                                        <th>Num téléphone</th>
                                        <th>Loyer</th>
                                        <th>Dernier mois</th>
                                        <th>Année</th>
                                        <th>Retard</th>
                                    </tr>
                                    @foreach ($encaissement as $item)
                                    <tr class="text-center">
                                        <td></td>
                                        <td>{{ $item->Location->code }}</td>
                                        <td>{{ $item->Location->Locataire->nom }}</td>
                                        <td>{{ $item->Location->Locataire->telephone }}</td>
                                        <td>{{ $item->Location->Maison->loyer }}</td>
                                        <td>{{ $item->periode }}</td>
                                        <td>{{ $item->annee }}</td>
                                        <td>0 Mois</td>
                                    </tr>
                                    @endforeach
                                </td>
                                <td colspan="8">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-6 p-3 bg-dark">
                                            <h4 class="text-light"><strong>TOTAL</strong></h4>
                                        </div>
                                        <div class="col-lg-3 col-md-6 p-3 bg-danger">
                                            <h4 class="text-light"><strong>390000 FCFA</strong></h4>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
