<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The home of Lord of the Rings comics.">
    <title>
    <?= !isset($data['archive_header']) ? 
        "{$data['post_title']} - " . SITENAME : 
        "Archive - " . SITENAME ; ?>
    </title>
    <!-- Google Fonts Preconnect -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- Custom CSS -->
    <link href="<?= URLROOT; ?>/css/style.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <!-- Favicon and Manifest -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= URLROOT; ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= URLROOT; ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= URLROOT; ?>/favicon-16x16.png"> 
    <link rel="manifest" href="<?= URLROOT; ?>/site.webmanifest">
    <!-- Javascript -->
    <script defer src="<?= URLROOT; ?>/js/main.js"></script>
</head>

<body class="container">
    <header class="header">
        <div class="header__logo-box">
            <a href="<?= URLROOT; ?>" class="header__link">
                <picture>
                    <source type="image/webp" srcset="<?= LOGOFOLDER; ?>logo.webp">
                    <source type="image/jpeg" srcset="<?= LOGOFOLDER; ?>logo.jpg">
                    <img src="<?= LOGOFOLDER; ?>logo.jpg" class="header__logo" alt="Uruk Hard Play Hard Logo" width="416" height="255">
                </picture>
            </a>
        </div>
    </header>