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
                            GESTION DES ENCAISSEMENTS
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            <a class="btn btn-success" href="#!" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#formUserBackdrop">
                                Ajouter un nouveau encaissement
                            </a>
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
                        <div
                            style="background: linear-gradient(90deg, rgb(160, 240, 195) 0%, rgb(237, 237, 163) 100%); border-radius: 5px;">
                            <form action="{{ route('date_filter') }}" method="GET">
                                <div class="d-flex justify-content-end mb-3">
                                    <div class="col-3 m-2">
                                        <label>Date debut</label>
                                        <input class="form-control" name="date_debut" type="date" required />
                                    </div>
                                    <div class="col-3 m-2">
                                        <label>Date fin</label>
                                        <input class="form-control" name="date_fin" type="date" required />
                                    </div>
                                    <div class="col-1 m-2 pt-4">
                                        <button type="submit" class="btn btn-success">Filtrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Date</th>
                                    <th>Locataire</th>
                                    <th>Maison</th>
                                    <th>Montant reglé</th>
                                    <th>Mois</th>
                                    <th>Année</th>
                                    <th>OT</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($encaissements as $item)
                                    <tr>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->date_encaissement }}</td>
                                        <td>{{ $item->Location->Locataire->nom }} {{ $item->Location->Locataire->prenom }}
                                        </td>
                                        <td>{{ $item->Location->Maison->adresse }}</td>
                                        <td>{{ $item->montant }}</td>
                                        <td>{{ $item->periode }}</td>
                                        <td>{{ $item->annee }}</td>
                                        <td>{{ $item->operation_terrain == 1 ? "Oui" : "Non" }}</td>
                                        <td class="text-center">
                                            <a class="text-center" href="{{ route('Gestion_encaissements.show', [$item->id]) }}">
                                                <i class="me-2 text-green" data-feather="eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-lg-9 col-md-6 p-3 bg-secondary">
                                <h4 class="text-light"><strong>TOTAL</strong></h4>
                            </div>
                            <div class="col-lg-3 col-md-6 p-3 bg-danger">
                                <h4 class="text-light"><strong>{{ $total }} FCFA</strong></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="formUserBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter un nouveau encaissement</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Tabbed dashboard card example-->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="sbp-preview-content">
                                        <form method="POST" action="{{ route('Gestion_encaissements.store') }}">
                                            @csrf
                                            <input type="text" name="users_id" class="form-control" value="{{ Auth::user()->id }}" hidden>
                                            <div class="p-2 m-1"
                                                style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                                <h6 class="m-2 text-center text-danger">Information sur le locataire</h6>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Code location & nom locataire</label>
                                                            <select name="locations_id" class="form-control">
                                                                @foreach ($locations as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->code }} - {{ $item->Locataire->nom }}
                                                                        {{ $item->Locataire->prenom }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Nom</label>
                                                            <input class="form-control" type="text" readonly />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Prénom</label>
                                                            <input class="form-control" type="text" readonly />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>N° CNIB ou Passport</label>
                                                            <input class="form-control" type="text" readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Téléphone</label>
                                                            <input class="form-control" type="text" readonly />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Date de naissance</label>
                                                            <input class="form-control" type="date" readonly />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Quartier</label>
                                                            <input class="form-control" type="text" readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Montant encaisée</label>
                                                        <input class="form-control" name="montant" type="number" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Periode</label>
                                                        <select class="form-control" name="periode" id="">
                                                            <option value="Janvier">Janvier</option>
                                                            <option value="Février">Février</option>
                                                            <option value="Mars">Mars</option>
                                                            <option value="Avril">Avril</option>
                                                            <option value="Mais">Mais</option>
                                                            <option value="Juin">Juin</option>
                                                            <option value="Juillet">Juillet</option>
                                                            <option value="Aout">Aout</option>
                                                            <option value="Septembre">Septembre</option>
                                                            <option value="Octobre">Octobre</option>
                                                            <option value="Novembre">Novembre</option>
                                                            <option value="Décembre">Décembre</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Année</label>
                                                        <select class="form-control" name="annee">
                                                            <option>Selectionner ici</option>
                                                            <?php $years = range(1900, strftime('%Y', time())); ?>
                                                            <?php foreach($years as $year) : ?>
                                                            <option value="<?php echo $year; ?>"><?php echo $year; ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Date encaissement</label>
                                                        <input class="form-control" name="date_encaissement" type="date" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-12">
                                                    <div class="mb-3">
                                                        <label class="container">Operation terrain
                                                            <input type="checkbox" name="operation_terrain" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-success">Enregistrer</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                            </div>
                                        </form>
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