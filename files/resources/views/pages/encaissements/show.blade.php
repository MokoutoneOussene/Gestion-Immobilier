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
                            Fiche d'encaissement N°: {{ $finds->code }}
                        </h1>
                        <div class="page-header-subtitle mt-4 text-warning">Tout les traitements effectués ici ne concerne
                            que sur cette la location
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                            <span class="input-group-text"><i class="text-primary" data-feather="calendar"></i></span>
                            <div class="form-control ps-0 pointer">
                                {{ Carbon\Carbon::now()->format('d-m-Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-lg-12">
                <!-- Tabbed dashboard card example-->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="sbp-preview-content">
                            <div class="row">
                                <table class="table table-bordered" style="width: 100%;">
                                    <tr>
                                        <th>Code encaissement</th>
                                        <td>{{ $finds->code }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date encaissement</th>
                                        <td>{{ $finds->date_encaissement }}</td>
                                    </tr>
                                    <tr>
                                        <th>Locataire</th>
                                        <td>{{ $finds->Location->Locataire->nom }} {{ $finds->Location->Locataire->prenom }}</td>
                                    </tr>
                                    <tr>
                                        <th>Maison</th>
                                        <td>{{ $finds->Location->Maison->adresse }} - {{ $finds->Location->Maison->type_maison }}</td>
                                    </tr>
                                    <tr>
                                        <th>Montant reglé</th>
                                        <td>{{ $finds->montant }} FCFA</td>
                                    </tr>
                                    <tr>
                                        <th>Mois concerné</th>
                                        <td>{{ $finds->periode }}</td>
                                    </tr>
                                    <tr>
                                        <th>Année concernée</th>
                                        <td>{{ $finds->annee }}</td>
                                    </tr>
                                </table>
                                <div class="row no-print">
                                    <div class="col-12">
                                        <a href="{{ url('Impression/print_encaissement/' . $finds->id) }}" type="button" class="btn btn-success"><i class="fas fa-print" style="margin-right: 5px;"></i>
                                            Imprimer ou Générer un pdf
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
