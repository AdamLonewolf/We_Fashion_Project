@extends('layout.layout')
@section('fils')

        <!-- Header-->
        @include('portion.header')
        
        <!-- Section-->
        <section class="py-5" style="margin-top:60px">
            <div class="container px-4 px-lg-5 mt-5">
                <p style="font-size: 19px; text-align:end"><span class="mx-2" style="font-weight:bold">{{$products->count()}}</span>Résultats</p> 
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($products as $p)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" style="max-height: 370px !important;" src="{{URL::to($p->picture)}}" alt="{{$p->name}}" />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{$p->name}}</h5>
                                <!-- Product price-->
                                <span class="" style="color:#E74C3C "> {{number_format($p->price, 2, ',', ' ')}} €</span>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('show',["id"=>$p->id])}}">Voir Produit</a></div>
                        </div>
                    </div>
                </div> 
                @endforeach                              
                </div>
                {{-- Pagination de la page --}}

                <div class="d-flex justify-content-center paginator">
                    {{$products->links()}} 
                </div>
                
            </div>
        </section>
        <!-- Footer-->
       @include('portion.footer')
       @endsection