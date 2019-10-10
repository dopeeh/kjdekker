<?php 
    $page = '';
    if(isset($_GET['p']))
        $page = $_GET['p'];
?>

<!DOCTYPE html>
<html>
<head>
	<?php 
		include 'main/head.php';
	?>
</head>
<body>
    <div class='bg-top pt-5'>
        <div id='navigation' class='container'><!-- Main container -->
            <!-- Header -->
            <?php 
                include 'main/header.php';
            ?>
            
            

        </div> <!-- Einde main container -->
    </div>

    <!-- Content Homepage -->
    <?php 
        switch($page) {
            case 'personalia':
                include 'pages/personalia.php';
                break;
            case 'contact':
                include 'pages/contact.php';
                break;
            case 'programmeren':
                include 'pages/programmeren.php';
                break;
            case 'fotografie':
                include 'pages/fotografie.php';
                break;
            case 'film':
                include 'pages/film.php';
                break;
            default:
                echo "";
        } 
    ?>
    
    <div id='landingGraphicsSVG' <?php if(isset($_GET['p'])) echo 'class ="alt"' ?> ></div>

    <!-- Footer -->
    <?php 
		include 'main/footer.php';
    ?>

<!-- Javascript here -->
<script src='js/landingGraphics.js'></script>
<script src='js/main.js'></script>
</body>
</html>