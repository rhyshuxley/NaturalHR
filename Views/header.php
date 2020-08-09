<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Natural HR</title>

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

        <!-- Font Awesome -->
        <script src="https://use.fontawesome.com/releases/v5.14.0/js/all.js" data-auto-replace-svg="nest"></script>

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="Style/main.css">
        <link rel="stylesheet" type="text/css" href="Style/forgot.css">

        <!-- Scripts -->
        <script src="js/login.js"></script>
        <script src="js/register.js"></script>
        <script src="js/forgot.js"></script>
        <script src="js/upload.js"></script>
        <script src="js/files.js"></script>
        
    </head>
    <body>
        <!-- navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">Natural HR</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if($_SESSION['loggedIn']): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/upload.php">Upload</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/files.php">View Files</a>
                        </li>
                    <?php endif; ?>
                    
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <?php if(!isset($_SESSION['loggedIn'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/login.php">Login</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/Controllers/Logout.php">Logout</a>
                            </li>
                            <input type="hidden" name="userId" class="loggedInUserId" value="<?=$_SESSION['id']?>">
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </nav>