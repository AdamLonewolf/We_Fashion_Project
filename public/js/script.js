 

    let btndelete = document.querySelectorAll('.supprimer');
    let formulaire = document.querySelectorAll('.form-delete'); //On récupère tous les formulaires qui sont cette classe

//Je parcours la liste des boutons et j'ajoute un écouteur d'événement (on click) à chacun d'eux

    btndelete.forEach(button => { //Pour chaque élément du tableau btndelete "as" button...
        button.addEventListener('click', function(event) {
          let confirmation = confirm('Voulez-vous supprimer ce produit ?');
          if (confirmation) {
            // Soumettre le formulaire si l'utilisateur a confirmé la suppression
            button.formulaire.submit();
          }else{
            //Empêcher la soumission du formulaire si l'utilisateur a annulé la suppression
            event.preventDefault(); 
          }
        });
      });
      