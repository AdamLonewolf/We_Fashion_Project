<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WeFashion - Login</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ URL::to('css/bootstrap.min.css') }} " rel="stylesheet" />
    <link href="{{ URL::to('css/style.css') }} " rel="stylesheet" />
</head>

<body style="background: linear-gradient(to right, #76b852, #8dc26f); ">
    <form class="form-new" action="{{route('store_product')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
        <h3 class="text-center my-3">Création d'un nouveau produit</h3>
        <h5 class="text-center my-2">Veuillez renseigner les champs ci-dessous</h5>
        <div class="wrapper-bloc d-flex">
            <div class="bloc-1 p-3">
                <div class="form-group my-3">
                    <label for="name">Nom du produit</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Entrez le nom du produit (100 caractères max)..." maxlength="100">
                </div>
                <div class="form-group my-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Entrez la description du produit..."
                        rows="3"></textarea>
                </div>
                <div class="form-group my-3">
                    <label for="price">Prix</label>
                    <input type="number" class="form-control" id="price" name="price"
                        placeholder="Entrez le prix du produit...">
                </div>
                <div class="form-group my-3">
                    <label for="reference">Reference</label>
                    <input type="text" class="form-control" id="reference" name="reference"
                        placeholder="Entrez la référence du produit... (16 caractères maximum)" maxlength="16">
                </div>
            </div>
            <div class="bloc-2 p-3">
                <div class="form-group my-3">
                    <label for="exampleFormControlSelect1">Visibilité du produit</label>
                    <select class="form-control" id="is_visible" name="is_visible">
                        <option value="1">Public</option>
                        <option value="0">Non Public</option>
                    </select>
                </div>
                <div class="form-group my-3">
                    <label for="exampleFormControlSelect1">Etat du produit</label>
                    <select class="form-control" id="state" name="state">
                        
                        <option value="1">En solde</option>
                        <option value="0">Standard</option>
                    </select>
                </div>
                <div class="form-group my-3">
                    <label for="exampleFormControlSelect1">Catégorie du produit</label>
                    <select class="form-control" id="categories_id" name="categories_id">
                    @foreach ($category as $c)    
                        <option value="{{ $c->id }}">{{ $c->name }}</option>            
                    @endforeach
                </select>
                </div>
                <div class="form-group  my-3">
                    <label for="size">Taille du produit</label>
                    <div class="d-flex justify-content-start align-items-center">
                    @foreach ($sizes as $s)
                    <div class="form-check px-4 d-flex justify-content-center align-items-center">
                        <input class="form-check-input" type="checkbox" value="{{ $s->id }}" name="size[]">
                        <span class="form-check-label px-1">{{ $s->type }}</span>
                    </div>
                    @endforeach
                    </div>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Upload d'image</label>
                    <input class="form-control" type="file" name="file" id="file">
                </div>
            </div>
        </div>
        <div class="form-btn">
          <button type="submit" id="submit" name="submit" style="width:50%" class="btn-submit">Créer un produit</button>
      </div>
    </form>
</body>

</html>
