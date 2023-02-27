    @extends('layout.layout')
    @section('fils')
        <!-- Navigation-->
        @include('portion.header')
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                   
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" style="height:550px !important; width:auto" src="{{URL::to($product->picture)}}" alt="" /></div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder product-name" >{{$product->name}}</h1>
                        
                        <div class="fs-5 my-2">
                            <span style="color:#E74C3C " class="price fw-bold" >{{$product->price}} €</span>
                        </div>
                        <div class="badge-wrapper my-1">
                            @if($product->state == 1)
                            <span class="badge rounded-pill" style="background-color:#E74C3C ; padding:10px 16px " >En solde</span>
                            @else
                            <span class="badge rounded-pill bg-dark" style="padding:10px 16px ">Standard</span>
                            @endif
                        </div>
                        <div class="reference-wrapper my-4">
                            <p class="fw-bold fs-5">Référence du produit: <span class="fst-italic">{{$product->reference}}</span></p>
                        </div>
                        <form action="" method="POST">
                            @csrf
                        <label for="size">Choisissez votre taille</label>
                        <select name="size" id="size" class="form-control">
                            @foreach ($product->ProductSizes as $size )
                            <option value="{{$size->id}}">{{$size->type}}</option>
                            @endforeach
                        </select>
                    </form>
                        <p class="lead"></p>
                        <div class="d-flex mt-5">
                        
                            <form action="{{route('addCart')}}" method="POST">
                                @csrf
                                @foreach ($errors->all() as $error)
                                <li>{{$error = "Veuillez remplir le champ"}}</li><br>
                                @endforeach
                                <div class="d-inline-flex justify-center align-items-center" style="">
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                <input class="form-control text-center me-3" id="quantity" name="quantity" type="num" value="" style="max-width: 3rem" />
                                <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                    <i class="bi-cart-fill me-1"></i>
                                    Ajouter au panier
                                </button>
                                </div>
                            </form>  
                        </div>
                    
                </div>
                   
            </div>
            <h3 class="my-4 fw-bold ">Description du produit</h3>
            <p class="product-description" style="font-size:20px">{{$product->description}}</p>
        </section>
        <!-- Footer-->
        @include('portion.footer')
    @endsection
        
       

