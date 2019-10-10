<?php
    $msgSent = false;
    $msg = array(
        "name" => Null,
        "email" => Null,
        "message" => Null
    );
    $errors = array();

    if(isset($_POST['submitted'])) {

        if(isset($_POST['nameSender']) && trim($_POST['nameSender']) != "" && preg_match("/^[a-zA-Z0-9\s-']*$/", $_POST['nameSender'] )) {
            $msg['name'] = $_POST['nameSender'];
        } else {
            $errors[] = "nameError";
        }

        if(isset($_POST['emailSender']) && trim($_POST['emailSender']) != "" && filter_var($_POST['emailSender'], FILTER_VALIDATE_EMAIL)) {
            $msg['email'] = $_POST['emailSender'];
        } else {
            $errors[] = "emailError";
        }

        if(isset($_POST['msg']) && trim($_POST['msg']) != "" /*&& preg_match("/^[ -~]+$/", $_POST['msg'])*/) {
            $msg['email'] = $_POST['emailSender'];
        } else {
            $errors[] = "msgError";
        }

        if(empty($errors)) {
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: quickForm@kjdekker.com' .  "\r\n";
            mail("dopeehedit@gmail.com" , "Quick mail from " . $msg['name'] ,$msg['message'],$headers);
            var_dump( "<h2>SUCCES BITCH</h2>");
        }

    }

?>

<div class="small-tab">
        <hr>
        <hr>
</div>

<!-- Content Contact -->
<div class='content-holder'>
    <div class="container page-header">
        Contact
    </div>

    <div class='container main-content'>
        <div>
            <a href='https://www.linkedin.com/in/koenjessedekker'><i class="fab fa-linkedin h4"></i> LinkedIn</a>
        </div>
        <div>
            <a href='https://github.com/dopeeh'><i class="fab fa-github-square h4"></i> GitHub</a>
        </div>
        <div>
            <a href='http://bit.ly/flickr-koen-dekker'><i class="fab fa-flickr h4"></i> flickr</a>
        </div>

        <div>
            <h5 class="mt-3">Heb ik uw interesse gewekt?</h5>
            <p>
                Stuur een interessant idee of een uitdagend verzoek naar <a href='mailto:kdekker@colourfra.me'>kdekker@colourfra.me</a><br>
                Of stuur je bericht direct via hier:
            </p>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?p=contact"; ?>">
                <span class='d-block'>Naam:</span>
                <input type='text' name='nameSender'>
                <span class='d-block mt-2'>E-mail:</span>
                <input type='text' name='emailSender'>
                <span class='d-block mt-2'>Bericht: <i style='color:lightgrey;'>(Max 400 characters)</i> </span>
                <textarea name="Text1" cols="40" rows="5" maxlength="400" name="msg"></textarea>
                <input class="d-block btn btn-light" type='submit' value='Verstuur' name='submitted'>
            </form>
            <?php 
                //als bericht succesvol is verstuurd
                if(isset($_POST['submitted']))
                    foreach ($errors as $error) {
                        echo "<h2> ".$error."</h2>";
                    }
            ?>
        </div>

    </div>
</div>
