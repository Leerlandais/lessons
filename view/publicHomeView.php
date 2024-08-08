<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TAILWIND CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- ET PUIS STYLE PERSO -->
    <link rel="stylesheet" href="styles/style.css">
    <title><?=$title?></title>
</head>
<body class="bg-gradient-to-r from-green-700 via-gray-300 to-amber-700 bg-opacity-25">
    <div class="container-fluid flex flex-col justify-center items-center text-center"> <!-- CONTAINER GLOBAL POUR ENGLOBÉ LE TOTALE -->

<?php include ("inc/header.php"); ?>
<?php include ("inc/error-message.php"); // leave this here to display any eventual error message - include this on all pages ?>
        <?php if (isset($_GET["login"])) include("inc/loginForm.php"); ?>


<?php // var_dump($visitorName); ?>
        

        

    <?php include("inc/footer.php"); ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- ET PUIS STYLE PERSO -->
    <script src="scripts/script.js"></script>
</body>
</html>