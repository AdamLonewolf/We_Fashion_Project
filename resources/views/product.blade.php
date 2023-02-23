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
                        <h6 class="fw-bolder product-description" style="">{{$product->description}}</h4>
                        <div class="fs-5 mb-5">
                            <span style="color:#E74C3C " class="price" >{{$product->price}} €</span>
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
                        <div class="d-inline-flex justify-center align-items-center" style="">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Ajouter au panier
                            </button>
                        </div>
                    </div>
                </div>
                   
            </div>
        </section>
        <!-- Footer-->
        @include('portion.footer')
    @endsection
        
       

