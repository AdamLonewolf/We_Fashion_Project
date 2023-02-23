@extends('layout.layout')
@section('fils')
{{-- header de la page --}}
<header>
    <nav class=" my-navbar navbar navbar-expand-lg navbar-light fixed-top" style="position:relative;">
      <div class="container d-flex">
        <div class="logo">
            <h3 class="logo-title"><img src="{{URL::to('/img/logoicon.png')}}" class="logo" alt="logo">We Fashion</h3>
        </div>  
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse collapse-admin " id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="">Produits</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="#">Catégories</a>
            </li>
          </ul>
        </div>
        <div class="retour-accueil" style="margin-left:40px;">
            <a href="{{route('home')}}" class="retour-accueil-btn"><i class="bi bi-house-door-fill"></i></a>
          </div>
      </div>
    </nav>
  </header>
  {{-- Table des produits --}}
  <section class="table-section p-5" style="">
    <div class="new">
      <a href="{{route('new')}}" class="add-btn"><i class="bi bi-plus-lg" style="margin-right: 10px"></i> Nouveau</a>
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
        <tr class="elm">
          <th scope="row">fzegzrqteykrrtre</th>
          <td>zrqetrryteertyfstdre</td>
          <td>rtyfqtrezert</td>
          <td>>Srdwtfxgcjh:;fgdf</td>
          <td>
            <div class="d-flex" style="">
              <a href="" class="supprimer mx-3"><i class="bi bi-trash-fill"></i></a>
              <a href="{{route('modify')}}" class="modifier"><i class="bi bi-pencil-square"></i></a>
            </div> 
          </td>
        </tr>
      </tbody>
    </table>
</section>
@endsection