<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre sujet d'e-mail ici</title>
    <!-- Chargement des fichiers CSS de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="mt-4">Reponse a votre demande de tutotat</h2>
            <p>Bonjour,</p>
            @if($statut==1)
                <p>{{ $demande->user->name }} {{ $demande->user->surname }} a accepté votre demande de tutorat..</p>
            @else
                <p>{{ $demande->user->name }} {{ $demande->user->surname }} a supprimé votre demande de tutorat..</p>
            @endif

            <p>Si vous avez des questions, n'hésitez pas à nous contacter.</p>

            <p>Cordialement,<br>Votre équipe</p>
        </div>
    </div>
</div>

<!-- Chargement des fichiers JavaScript de Bootstrap (optionnel) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
