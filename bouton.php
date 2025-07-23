<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            text-align: center;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        .lien-jeu {
            border: none;
            background: #d42e1a;
            border-radius: 32px;
            text-transform: uppercase;
            padding: 10px 20px;
            cursor: pointer;
            letter-spacing: 1px;
            font-size: 1.5em;

        }
    </style>
</head>

<body>

    <?php
    // Charger le fichier JSON
    $json = file_get_contents('liens.json');
    $liens = json_decode($json, true);

    // Lire la variable GET "ref"
    $ref = isset($_GET['ref']) ? $_GET['ref'] : 'default';

    // Boucler sur les liens
    foreach ($liens as $lien) {
        // Vérifie si la ref actuelle est dans la liste des refs autorisées
        if (in_array($ref, $lien['ref'])) {
            // Ajoute ?ref=... à l'URL du lien
            $urlAvecRef = $lien['url'] . '?ref=' . urlencode($ref);

            echo '<button type="button" class="lien-jeu">';
            echo '<a href="' . htmlspecialchars($urlAvecRef) . '" target="_blank">' . htmlspecialchars($lien['titre']) . '</a>';
            echo '</button>';
        }
    }
    ?>

</body>

</html>