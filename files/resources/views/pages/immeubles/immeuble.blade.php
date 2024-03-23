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
                            GESTION DES IMMEUBLES
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            <a class="btn btn-success" href="#!" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#formUserBackdrop">
                                Ajouter un nouveau immeuble
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
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Nom du bailleur</th>
                                    <th>Adresse</th>
                                    <th>Nombre de locaux</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($collection as $item)
                                    <tr>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->Bailleur->nom }} {{ $item->Bailleur->prenom }}</td>
                                        <td>{{ $item->adresse }}</td>
                                        <td>{{ $item->nbr_locaux }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('Gestion_immeuble.show', [$item->id]) }}"><i
                                                    class="me-2 text-green" data-feather="eye"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <h6 class="text-danger">Pas d'immeuble disponible !</h6>
                                @endforelse
                            </tbody>
                        </table>
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
                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter un nouveau immeuble</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Tabbed dashboard card example-->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="sbp-preview-content">
                                        <form method="POST" action="{{ route('Gestion_immeuble.store') }}">
                                            @csrf
                                            <div class="p-2 m-1"
                                                style="border: 2px solid rgb(242, 199, 174); border-radius: 5px;">
                                                <h6 class="m-2 text-center text-danger">Information sur l'immeuble</h6>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Nom du bailleur<span class="text-danger">*</span></label>
                                                            <select name="bailleurs_id" class="form-control">
                                                                <option value="">Selectionner ici...</option>
                                                                @foreach ($bailleurs as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->nom }} {{ $item->prenom }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Adresse <span class="text-danger">*</span></label>
                                                            <input class="form-control" name="adresse" type="text" placeholder="Ex: Zagtouli" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Nombre de locaux<span class="text-danger">*</span></label>
                                                            <input class="form-control" name="nbr_locaux" type="number" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Référence de la parcelle</label>
                                                            <textarea name="reference" class="form-control" cols="30" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="mb-3">
                                                            <label>Autres informations</label>
                                                            <textarea name="autres" class="form-control" cols="30" rows="3"></textarea>
                                                        </div>
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
