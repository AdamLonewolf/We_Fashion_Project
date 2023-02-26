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
    <form action=" {{route('register_user')}} " method="POST" class="login_form"> 
        @csrf
        <h3>Création d'un compte</h3>
        <h5>Renseignez les champs ci-dessous.</h5>
        <div class="form-group">
            <label for="name">Nom d'utilisateur</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Entrez votre nom d'utilisateur" required>
          </div>
        <div class="form-group">
          <label for="email">Adresse Mail</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre adresse mail" required>
        </div>
        <div class="form-group">
          <label for="password">Mot de passe</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="entrez votre mot de passe" required>
        </div>
        <div class="create-account px-2 text-center py-3">
            <p>Vous avez déjà un compte ? <a href="{{route('login')}}">Se connecter au compte</a></p> 
        </div>
        <div class="form-btn">
            <button type="submit" id="submit" name="submit" class="btn-submit">Créer un compte</button>
        </div>
      </form>
</body>
</html>
