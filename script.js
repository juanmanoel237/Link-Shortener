const form = document.querySelector(".wrapper form");
fullURL = form.querySelector("input");
shortenBtn = form.querySelector("button");

form.onsubmit = (e) => {
  e.preventDefault(); //Empêche le formulaire d'être soumis
};

shortenBtn.onclick = () => {
  let xhr = new XMLHttpRequest(); //Créer l'objet xhr
  xhr.open("POST", "php/url-control.php", true);
  xhr.onload = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      //si la requête ajax est ok/succes
      let data = xhr.response; //Sauvegarder la reponse ajax dans la variable data. La reponse sera recue par le fichier php.
      console.log(data);
    }
  };
  //On envoie les données du formulaire vers le fichier php
  let formData = new FormData(form); //Création d'un nouvel objet FormData
  xhr.send(formData);
};
