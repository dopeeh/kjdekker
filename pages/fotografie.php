<?php
    include 'flickr/functions.php';

    $amountOfPhotos = 20;
?>

<div class="small-tab">
        <hr>
        <hr>
</div>

<!-- Content Fotografie -->
<div class='content-holder'>
    <div class="container page-header">
        Fotografie
    </div>

    <div class='container main-content'>

        <div id='photographyParagraph' class='hidden'>
            <p>Vanaf kinds af aan heb ik mij altijd bezig gehouden met het vastleggen van herinneringen op foto en film. Dit is naar mate ik ouder werd een ware passie geworden 
            waar ik veel tijd in heb gestoken. Het mooiste vind ik  de natuur fotograferen maar het idee van een moment, plek of persoon vastleggen op een moment van betekenis geeft mij veel voldoening.</p>

            <p>Fotografie is een zijspoor in mijn leven waarbij ik, mocht de kans zich voordoen, er mijn hoofdspoor van zou maken.
            </p>
        </div>
        <div class='tldr-message'>
            <span class='mb-3 d-inline-block'>Een beeld zegt meer dan duizend woorden, en ik heb veel te vertellen...</span>
        </div>
        <button class='btn btn-outline-dark tldr-button mb-5' onClick="tldr('photographyParagraph')">
            Meer lezen...
        </button>

        <section id='photos'>
        
        <!-- Page content -->
        <?php
            $photoData = getAllPersonalPhotos();
            $counter = 0;
            foreach ($photoData->photos->photo as $photo) {
                if($counter < $amountOfPhotos) {
                    $title = $photo->title;
                    $farm_id = $photo->farm;
                    $server_id = $photo->server;
                    $id = $photo->id;
                    $secret = $photo->secret;
                    $url = "https://farm".$farm_id.".staticflickr.com/".$server_id."/".$id."_".$secret.".jpg";
                    echo "<img src='".$url."' alt-text='".$title."' />";
                }
                $counter++;
            }
        ?>
        
        </section>
    </div>
</div>
