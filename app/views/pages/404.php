<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta
            name="description"
            content="Welcome to Uruk Hard Play Hard, the home of Lord of the Rings webcomics."
        />
        <title>Error 404 Page not found - Uruk Hard, Play Hard</title>
        <!-- Custom CSS -->
        <link href="<?= URLROOT; ?>/css/style.css" rel="stylesheet">
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"
        />
        <!-- Favicon and Manifest -->
        <link
            rel="apple-touch-icon"
            sizes="180x180"
            href="<?= URLROOT; ?>/apple-touch-icon.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="32x32"
            href="<?= URLROOT; ?>/favicon-32x32.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="<?= URLROOT; ?>/favicon-16x16.png"
        />
        <link rel="manifest" href="<?= URLROOT; ?>/site.webmanifest" />
        <!-- Javascript -->
        <script defer src="<?= URLROOT; ?>/js/main.js"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script
            async
            src="https://www.googletagmanager.com/gtag/js?id=G-MCLENLND3G"
        ></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'G-MCLENLND3G');
        </script>
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
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h1>Oops, that page doesn't exist!</h1>
                            <h2>Error 404</h2>
                        </div>
                        <div class="alert alert-danger fade in">
                            <p style="font-size: 1.6rem;">
                                Sorry, this page can't be found. Please click
                                <a href="<?= URLROOT; ?>" class="alert-link"
                                    >here</a
                                >
                                to head back to the front page.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
