<header>
    <nav class=" my-navbar navbar navbar-expand-lg navbar-light fixed-top" style="position:relative;">
      <div class="container d-flex">
        <div class="logo d-flex justify-content-center aling-items-center">
          <a class="" href="{{route('home')}}"><img src="{{URL::to('/img/logoicon.png')}}" class="logo" alt="logo">We Fashion</a>
        </div>  
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{route('state')}}">Soldes</a>
            </li>
            
            @foreach ($categoryall as $category)
            
            <li class="nav-item ">
              <a class="nav-link" href="{{route('categorie',["id"=>$category->id])}}">{{$category->name}}</a>
            </li>
            @endforeach
            
            
      
          </ul>
        </div>
        <div class="div-panier" style="margin-left:40px">
          <a href="" style=""><i class="fa-solid fa-cart-shopping" style="color: #262626; font-size:17px; Margin: 0px 10px"></i> Mon panier</a>
        </div>
        
        @if(auth()->check())
        {{-- si l'utilisateur est connecté, alors le bouton devient "se déconnecter" --}}
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="margin-left:40px;" class="btn-connexion">Se déconnecter</button>
        </form>
        @else
        {{-- si l'utilisateur n'est, alors le bouton devient "se connecter" --}}
        <div class="connexion" style="margin-left:40px;">
          <a href="{{route('login')}}" class="btn-connexion">Se connecter</a>
        </div>
        @endif
      </div>
    </nav>
  </header>