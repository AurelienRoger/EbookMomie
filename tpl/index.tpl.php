<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Ebook Momie</title>
</head>
<body>
    
    <header class=""></header>

    <main class="vh-100">

        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Ebook Momie</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Acceuil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Ajouter</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

          <section class="pt-3">
            <form action="" class="w-50 m-auto">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Rechercher un livre" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Go !</button>
                </div>
            </form>
        </section>

        <section class="container text-center">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Date d'achat</th>
                    <th scope="col">Modifier / Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach ($listLivre as $value): ?>
                  <tr>
                    <th scope="row"><?= $value['id'] ?></th>
                    <td><?= $value['auteurPrenom'] ?></td>
                    <td><?= $value['auteurNom'] ?></td>
                    <td><?= $value['Titre'] ?></td>
                    <?php $date = new DateTime($value['AnneeAchat']); ?>
                    <td><?= $date ->format('d-m-Y')?></td>
                    <td><button type="button" class="btn btn-outline-warning">Modifier</button>
                        <button type="button" class="btn btn-outline-danger">Supprimer</button>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
        </section>

    </main>

    <footer></footer>





    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>