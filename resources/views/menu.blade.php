<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Menu Principal - Maison Connectée</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f5f5f5;
      margin: 0;
      padding: 20px;
    }
    .container {
      max-width: 1000px;
      margin: auto;
    }
    h1 {
      text-align: center;
    }
    .piece {
      background: #fff;
      margin-bottom: 20px;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    .appareils {
      margin-left: 20px;
    }
    .appareil {
      padding: 5px 0;
    }
    .admin-btn {
      text-align: right;
      margin-bottom: 20px;
    }
    .admin-btn a {
      padding: 10px 20px;
      background: #3a3a3a;
      color: white;
      border-radius: 5px;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="container">

    @if (Auth::check() && Auth::user()->email === 'julien.megnoux@me.com')
      <div class="admin-btn">
        <a href="{{ route('admin.dashboard') }}">🔒 Espace Admin</a>
      </div>
    @endif

    <h1>Bienvenue dans votre maison connectée</h1>

    @foreach($pieces as $piece)
      <div class="piece">
        <h2>{{ $piece->nom }}</h2>
        <div class="appareils">
          @forelse($piece->appareils as $appareil)
            <div class="appareil">🔌 {{ $appareil->nom }}</div>
          @empty
            <p>Aucun appareil dans cette pièce.</p>
          @endforelse
        </div>
      </div>
    @endforeach

  </div>
</body>
</html>
