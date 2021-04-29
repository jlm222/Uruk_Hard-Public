<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 750px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Oops, this page doesn't exist!</h1>
                    </div>
                    <div class="alert alert-danger fade in">
                        <p>Sorry, this page doesn't exist. Please click <a href="<?= URLROOT; ?>" class="alert-link">here</a> to head back to the front page.</p>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>