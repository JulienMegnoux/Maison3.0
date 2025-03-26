<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription - Maison Connecte</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      margin: 0;
      padding: 20px;
      color: #333;
    }
    .container {
      max-width: 600px;
      margin: auto;
      background: #fff;
      padding: 20px;
      border: 1px solid #ddd;
      box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
    }
    h1 {
      text-align: center;
    }
    form {
      display: flex;
      flex-direction: column;
    }
    label {
      margin-top: 10px;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="number"],
    input[type="date"],
    select,
    input[type="file"] {
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    input[type="submit"] {
      margin-top: 20px;
      padding: 10px;
      background: #3a3a3a;
      color: #fff;
      border: none;
      cursor: pointer;
      font-size: 16px;
      border-radius: 4px;
    }
    input[type="submit"]:hover {
      background: #555;
    }
  </style>
</head>
<body>
  <div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <h1>Inscription</h1>
    <form action="{{ route('register.submit') }}" method="POST" enctype="multipart/form-data">
    @csrf
      <label for="email">Adresse mail :</label>
      <input type="email" id="email" name="email" required>
      
      <label for="password">Mot de passe :</label>
      <input type="password" id="password" name="password" required>
      
      <label for="nom">Nom :</label>
      <input type="text" id="nom" name="nom" required>
      
      <label for="prenom">Prénom :</label>
      <input type="text" id="prenom" name="prenom" required>
      
      <label for="age">Âge :</label>
      <input type="number" id="age" name="age" min="0" required>
      
      <label for="genre">Genre :</label>
      <select id="genre" name="genre" required>
        <option value="">Sélectionnez</option>
        <option value="femme">Femme</option>
        <option value="homme">Homme</option>
        <option value="autre">Autre</option>
      </select>
      
      <label for="date_naissance">Date de naissance :</label>
      <input type="date" id="date_naissance" name="date_naissance" required>
      
      <label for="type_membre">Type de membre :</label>
      <select id="type_membre" name="type_membre" required>
        <option value="">Sélectionnez</option>
        <option value="frere">Frère</option>
        <option value="soeur">Soeur</option>
        <option value="parent">Parent</option>
        <option value="enfant">Enfant</option>
        <option value="autre">Autre</option>
      </select>
      
      <label for="photo">Photo :</label>
      <input type="file" id="photo" name="photo" accept="image/*" required>
      
      <input type="submit" value="Valider l'inscription">
    </form>
  </div>
</body>
</html>
