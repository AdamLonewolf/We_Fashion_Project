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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{URL::to('css/bootstrap.min.css')}} " rel="stylesheet" />
    <link href="{{URL::to('css/style.css')}} " rel="stylesheet" />
</head>
<body style="background: linear-gradient(to right, #76b852, #8dc26f); ">
    <form action=" {{route('authenticate')}} " method="POST" class="login_form"> 
        @csrf
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
        <h3>Connexion au compte</h3>
        <h5>Renseignez les champs ci-dessous.</h5>
        <div class="form-group">
          <label for="email">Adresse Mail</label>
          <input type="email" class="form-control" name="email" placeholder="Entrez votre adresse mail">
        </div>
        <div class="form-group">
          <label for="password">Mot de passe</label>
          <input type="password" class="form-control" name="password" placeholder="entrez votre mot de passe">
        </div>
        <div class="create-account px-2 text-center py-3">
            <p>Vous n'avez pas de compte ?<a href="{{route('register')}}"> Créer un compte</a></p> 
        </div>
        <div class="form-btn">
            <button type="submit" id="submit" name="submit" class="btn-submit">Envoyer</button>
        </div>
      </form>
</body>
</html>
