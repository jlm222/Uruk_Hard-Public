<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
                        <h1>Page does not exist</h1>
                    </div>
                    <div class="alert alert-danger fade in">
                        <p>Sorry, this page doesn't exist. Click <a href="<?= URLROOT; ?>" class="alert-link">here</a> to head back to the front page.</p>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>