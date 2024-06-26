@extends('layouts.master')
@section('content')
    <header class="page-header page-header-dark pb-10"
        style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 50%, rgba(0,212,255,1) 100%);">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="activity"></i></div>
                            Fiche du bailleur N°: {{ $finds->code }}
                        </h1>
                        <div class="page-header-subtitle mt-4 text-warning">Tout les traitements effectués ici ne concerne
                            que sur cet bailleur</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                            <span class="input-group-text"><i class="text-primary" data-feather="calendar"></i></span>
                            <div class="form-control ps-0 pointer">
                                {{ Carbon\Carbon::now()->format('d-m-Y') }}
                            </div>
                        </div>
                        {{-- <div class="mt-3 bg-danger p-2 text-center" style="border-radius: 5px;">
                            <h5 class="text-light mt-1">{{ $total }} FCFA</h5>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-8">
                <!-- Tabbed dashboard card example-->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="sbp-preview-content">
                            <div class="row">
                                <table class="table table-bordered" style="width: 100%;">
                                    <tr>
                                        <th>Code bailleur</th>
                                        <td>{{ $finds->code }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nom</th>
                                        <td>{{ $finds->nom }}</td>
                                    </tr>
                                    <tr>
                                        <th>Prenom</th>
                                        <td>{{ $finds->prenom }}</td>
                                    </tr>
                                    <tr>
                                        <th>CNIB ou Passport</th>
                                        <td>{{ $finds->cnib }}</td>
                                    </tr>
                                    <tr>
                                        <th>Téléphone</th>
                                        <td>{{ $finds->telephone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Quartier</th>
                                        <td>{{ $finds->quartier }}</td>
                                    </tr>
                                    <tr>
                                        <th>Situation</th>
                                        <td>{{ $finds->situation }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date d'engagement</th>
                                        @foreach ($contrat_bailleur as $item)
                                            <td>{{ $item->date }}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td class="text-center text-danger" colspan="2">Personne a prevenir en cas de besoin</td>
                                    </tr>
                                    <tr>
                                        <th>Nom & prénom</th>
                                        <td>{{ $finds->prevent_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Téléphone</th>
                                        <td>{{ $finds->prevent_phone }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card mb-4">
                    <div class="card-header text-center">Plus d'actions</div>
                    <div class="list-group list-group-flush small">
                        <a class="list-group-item list-group-item-action" href="#!">
                            <i class="fas fa-dollar-sign fa-fw text-blue me-2"></i>
                            Faire un retrait
                        </a>
                        <a class="list-group-item list-group-item-action" href="{{ url('Contrat/contrat_bailleur/' . $finds->id) }}">
                            <i class="fas fa-tag fa-fw text-purple me-2"></i>
                            Afficher le contrat
                        </a>
                        <a class="list-group-item list-group-item-action" href="#!">
                            <i class="fas fa-mouse-pointer fa-fw text-green me-2"></i>
                            Modifier le bailleur
                        </a>
                        <a class="list-group-item list-group-item-action" href="#!">
                            <i class="fas fa-percentage fa-fw text-yellow me-2"></i>
                            Supprimer le bailleur
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
