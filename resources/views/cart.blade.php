@extends('layout.layout')
@section('fils')
    {{-- header de la page --}}
    @include('portion.header')
    {{-- Table des produits --}}
    <section class="table-section " style="padding: 20px 20px 20px 20px">
        <table class="table table-responsive my-5">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($cart as $product)
                    <tr class="elm">
                        <th scope="row"><img style="width:60px ; height:auto;" src="{{ URL::to($product['picture']) }}"
                                alt="{{ $product['name'] }}"></th>
                        <td class="">
                            <div class="pos-td">{{ $product['name'] }}</div>
                        </td>
                        <td>
                            
                            <div class="pos-td"><input class="form-control text-center me-3" id="quantity" type="num"
                                    name="quantity" value="{{ $product['quantity'] }}" style="max-width: 3rem">
                            </div>
                        </td>
                        <td>
                            <div class="pos-td">{{ $product['price'] }}</div>
                        </td>
                        <td>
                            <div class="pos-td">
                                <div class="d-flex" style="">
                                    <form class="form-delete" action="{{route('deleteCart')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$product['id']}}">
                                        <button class="supprimer mx-3" style="border:none"><i
                                                class="bi bi-trash-fill"></i></button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="total">
            <p class="fw-bold fs-4">Total : <span>{{$total}} €</span></p>
        </div>
        <div class="form-btn">
            <button type="submit" id="submit" name="submit" style="width:20%" class="btn-submit">Aller à la
                caisse</button>
        </div>
    </section>
    <div style="position: relative; top:20px">
        @include('portion.footer')
    </div>
@endsection
