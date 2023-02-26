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
            <a href="{{route('new_category')}}" class="add-btn"><i class="bi bi-plus-lg" style="margin-right: 10px"></i>
                Nouveau</a>
        </div>
        <table class="table table-responsive my-5">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nom des catégories</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $c)
                    <tr class="elm">
                        <th scope="row">{{$c->name}}</th>
                        <td>
                            
                            <div class="d-flex" style="">
                                <form class="form-delete" action="{{ route('destroy_category') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $c->id }}">
                                    <button class="supprimer mx-3" style="border:none"><i class="bi bi-trash-fill"></i></button>
                                </form>
                                <a href="{{route('edit_category',["id"=>$c->id])}}" class="modifier"><i
                                        class="bi bi-pencil-square"></i></a>
                            </div>
                        </td>
            </tr>
                @endforeach

            </tbody>
        </table>
        <div class="d-flex justify-content-center paginator">
            {{ $category->links() }}
        </div>



    </section>


@endsection