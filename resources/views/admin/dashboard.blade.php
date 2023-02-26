@extends('layout.layout')
@section('fils')
    {{-- header de la page --}}
    <header>
        <nav class=" my-navbar navbar navbar-expand-lg navbar-light fixed-top" style="position:relative;">
            <div class="container d-flex">
                <div class="logo">
                    <h3 class="logo-title"><img src="{{ URL::to('/img/logoicon.png') }}" class="logo" alt="logo">We
                        Fashion</h3>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse collapse-admin " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard')}}">Produits</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('dashboard_category')}}">Catégories</a>
                        </li>
                    </ul>
                </div>
                <div class="retour-accueil" style="margin-left:40px;">
                    <a href="{{ route('home') }}" class="retour-accueil-btn"><i class="bi bi-house-door-fill"></i></a>
                </div>
            </div>
        </nav>
    </header>
    {{-- Table des produits --}}
    <section class="table-section p-5" style="">
        <div class="new">
            <a href="{{ route('new_product') }}" class="add-btn"><i class="bi bi-plus-lg" style="margin-right: 10px"></i>
                Nouveau</a>
        </div>
        <table class="table table-responsive my-5">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Etat</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="elm">
                        <th scope="row">{{ $product->name }}</th>
                        <td>{{ $product->CategorieProduct->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->state }}</td>
                        <td>
                            <div class="d-flex" style="">
                                <button class="supprimer mx-3" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    style="border:none"><i class="bi bi-trash-fill"></i></button>
                                <a href="{{ route('edit_product', ['id' => $product->id]) }}" class="modifier"><i
                                        class="bi bi-pencil-square"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach

                    <!-- Fenêtre Modale quand on clique sur supprimer-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" style="font-weight:bold" id="exampleModalLabel">
                                        Confirmation</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <span style="color:#E74C3C" class="fw-bold">ATTENTION :</span> Vous êtes sur le point de supprimer un produit, voulez vous confirmer cette action ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Annuler</button>
                                    <form action="{{ route('destroy_product') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-danger">Confirmer</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
            </tbody>
        </table>
        <div class="d-flex justify-content-center paginator">
            {{ $products->links() }}
        </div>



    </section>

    @include('portion.footer');
@endsection
