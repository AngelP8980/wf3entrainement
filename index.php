 <!DOCTYPE html>
 <html lang="en">
 
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 
 <body>
 
 </body>
 
 </html>
 
 <main class="container">
     <form action="" method="POST">
         <fieldset>
             <legend>Validation</legend>
             <div class="mb-3">
                 <label for="prenom">Prénom</label>
                 <input class="form-control" type="text" name="prenom" id="prenom">
             </div>
             <div class="mb-3">
                 <label for="nom">Nom</label>
                 <input class="form-control" type="text" name="nom" id="nom">
             </div>
             <div class="mb-3">
                 <label for="email">email</label>
                 <input class="form-control" type="email" name="email" id="email">
             </div>
             <div class="mb-3">
                 <label for="telephone">téléphone</label>
                 <input class="form-control" type="tel" name="telephone" id="telephone">
             </div>
             <div class="mb-3">
                 <label for="Sujet de la demande">Sujet de la demande</label>
                 <select name="pets" id="pet-select">
                     <option value="">--Please choose an option--</option>
                     <option value="Mon profil / administratif">Mon profil / administratif</option>
                     <option value="Ma carte bancaire">Ma carte bancaire</option>
                     <option value="Mes services">Mes services</option>
                     <option value="Offres commerciales">Offres commerciales</option>
                     <option value="Sécurité et fraudes">Sécurité et fraudes</option>
                 </select>
             </div>
             <div class="mb-3">
                 <label for="Message">Message</label>
                 <textarea class="form-control" type="textarea" name="message" id="message"></textarea>
             </div>
 
             <p>Joindre un fichier <input type="file"></p>
 
             <button>ENVOYER</button>
         </fieldset>
     </form>
 </main>