@extends('layout.layout')
@section('fils')

        <!-- Header-->
        @include('portion.header')
        
        <!-- Section-->
        <section class="py-5" style="margin-top:60px">
            <div class="container px-4 px-lg-5 mt-5">
                <p style="font-size: 19px; text-align:end "><span class="mx-2" style="font-weight:bold; color:#E74C3C">{{$products->count()}}</span>Résultats</p> 
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($products as $p)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <div class="img-container" style="height: 350px !important; width:auto !important;">
                            <img class="card-img-top" style="width:100%; height:100%" src="{{URL::to($p->picture)}}" alt="{{$p->name}}" />
                        </div>
                        
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{$p->name}}</h5>
                                <!-- Product price-->
                                <span class="" style="color:#E74C3C "> {{number_format($p->price, 2, ',', ' ')}} €</span>
                            </div>
                            <div class="badge-wrapper d-flex justify-content-center my-2">
                                @if($p->state == 1)
                                <span class="badge rounded-pill" style="background-color:#E74C3C" >En solde</span>
                                @else
                                <span class="badge rounded-pill bg-dark">Standard</span>
                                @endif
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