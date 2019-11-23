<?php
    include 'flickr/functions.php';

    $amountOfPhotos = 100;
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
