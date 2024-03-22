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
        <div style="border-bottom: 1px solid black;">
            <div class="d-flex col-md-12">
                <div class="col-3 mt-3">
                    <img src="{{ asset('images/logo.png') }}" style="width: 35%;" alt="Bassem_logo Logo">
                    <p>L'Immobilier qui rassure !</p>
                </div>
                <div class="col-9">
                    <h1 class="text-center p-2" style="font-size: 25px;">
                        <strong>AGENCE IMMOBILIER BASSEM-YAM</strong>
                    </h1>
                    <h5>Située à Ouagadougou secteur 28 (Coté Est de la pédiatrie Charles de Gaule)</h5>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <p>Tel : 25 36 50 81 / 70 24 04 65 / 78 20 01 70 | email : info@bassem-yam.com</p>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <h5>Ouagadougou, le {{ date('d-m-Y') }}</h5>
        </div>
        <section class="m-5">
            <h3 class="mb-3">Paiement N° : {{ $finds->code }}</h3>
            <h4>Doit : {{ $finds->Location->Locataire->nom }} {{ $finds->Location->Locataire->prenom }}</h4>
        </section>
        <section>
            <table class="table table-bordered">
                <tr>
                    <th class="text-center">Identifiant</th>
                    <th class="text-center">Désignation</th>
                    <th class="text-center">Période</th>
                    <th class="text-center">Montant relgé</th>
                </tr>
                <tr>
                    <td height="100">{{ $finds->code }}</td>
                    <td>
                        <p>Pour le paiement du loyer de mois de
                            <span style="font-style: italic; font-weight: bold;">{{ $finds->periode }}
                                {{ $finds->annee }}</span>
                        </p>
                    </td>
                    <td class="text-center">{{ $finds->periode }} {{ $finds->annee }}</td>
                    <td class="text-center">{{ $finds->montant }} FCFA</td>
                </tr>
            </table>
            <div class="row m-1">
                <div class="col-9 p-3 bg-secondary">
                    <h4 class="text-light"><strong>TOTAL</strong></h4>
                </div>
                <div class="col-3 p-3 bg-danger">
                    <h4 class="text-light"><strong>{{ $finds->montant }} FCFA</strong></h4>
                </div>
            </div>
            <br>
            <h5 class="mt-1">Arreté la présente facture à la somme de : ({{ $finds->montant }}) FRANCS CFA</h5>
        </section>
        <section class="d-flex justify-content-between m-5">
            <h5>Signature Agence</h5>
            <h5>Effectuée par {{ $finds->User->nom }} {{ $finds->User->prenom }}</h5>
        </section>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>
