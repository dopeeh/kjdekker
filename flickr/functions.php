<?php

function getAllPersonalPhotos() {
    $json = file_get_contents("https://www.flickr.com/services/rest/?method=flickr.people.getPublicPhotos&api_key=7bcd55e59814dad4c87d56c4434074b8&user_id=146828843%40N04&format=json&nojsoncallback=1");
    $result = json_decode($json);

    return $result;
}

?>