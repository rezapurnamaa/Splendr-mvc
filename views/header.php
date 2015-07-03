<!doctype html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="Description" lang="de" content="Splendr. Stöbern Sie stundenlang im Internet, speichern und teilen Sie alle Objekte ihres Begehrens, jetzt ganz einfach mit wenigen Klicks.">
   <meta name="author" content="Reza Purnama Arief">
<meta name="robots" content="index, follow">
   <title><?= $data['title'] . ' - ' . SITETITLE ?></title>

   <link rel="stylesheet" href="<?= URL::STYLES('bootstrap.min') ?>">
   <link rel="stylesheet" href="<?= URL::STYLES('styles') ?>">

   <!-- custom CSS -->
   <link rel="stylesheet" href="<?= URL::STYLES('jumbotron') ?>">
   <link rel="stylesheet" href="<?= URL::STYLES('heroic-features') ?>">
   <link rel="stylesheet" href="<?= URL::STYLES('custom') ?>">
   <!-- fonts -->
   <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
   <!-- icon -->
   <link rel="shortcut icon" href="<?= URL::ICON('favicon') ?>">
</head>
<body>

   <div class="container">
      <!-- <?php if(Session::get($user['username'],true)) ?> -->
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">

            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?= DIR ?>">Splendr</a>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?= DIR ?>products/board">Board</a>
                    </li>
                    <li>
                        <a href="<?= DIR ?>products/add">Neues Produkt</a>
                    </li>
                    <li>
                        <a href="<?= DIR ?>users/profile">Profile</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?= DIR ?>users/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><form class="navbar-form" role="search" action="<?= DIR ?>products/search" method="GET">
                        <div class="input-group">
                            <input type="search" class="form-control" placeholder="Search" name="q">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </form></li>
                </ul>

            </div><!--/.navbar-collapse -->
        </div>
      </nav>
