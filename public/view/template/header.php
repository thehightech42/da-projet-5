<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <?php
            if(isset($post['short_description'])){
                $shortDescription = $post['short_description'];
            }else{
                $shortDescription = "Antonin Pfistner | Etudiant développeur Web Full Stack";
            }
        ?>
        <!-- SEO -->
        <meta name="title" content="<?= $titlePage ?>"/>
        <meta name="description" content="<?= $shortDescription ?>"/>
        <meta name="url" content="https://projet-5.antoninpfistner.fr"/>

        <meta name="twitter:card" content="summary"/>
        <meta name="twitter:title" content="<?= $titlePage ?>"/>
        <meta name="twitter:description" content="<?= $shortDescription ?>"/>

        <meta property="og:title" content="<?= $titlePage ?>"/>
        <meta property="og:description" content="<?= $shortDescription ?>"/>
        <meta property="og:type" content="Un blog d'étudiant avec une api calculer des informations de crédit."/>
        <meta property="og:url" content="https://projet-5.antoninpfistner.fr"/>
        <!-- FIN SEO -->
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?=  $titlePage ?></title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/stylebaseadmin.css" rel="stylesheet" />
        <link href="../css/stylesbase.css" rel="stylesheet" />
        <link href="../css/style.css" rel="stylesheet" />
        <?php if(isset($linkStyle)){
            echo $linkStyle;
        }
        ?>
    </head>
    <body id="page-top" class="">
  

