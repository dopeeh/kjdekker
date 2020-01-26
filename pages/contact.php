<?php
    //require(dirname(__DIR__).'/libraries/PHPMailer/PHPmailer.php');

    //use PHPMailer\PHPMailer\PHPMailer;
    //use PHPMailer\PHPMailer\Exception;

    //$mail = new PHPMailer;

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
            $errors[] = "Vul alstublieft een correcte naam in; Geen speciale tekens behalve - en ' <br>";
        }

        if(isset($_POST['emailSender']) && trim($_POST['emailSender']) != "" && filter_var($_POST['emailSender'], FILTER_VALIDATE_EMAIL)) {
            $msg['email'] = $_POST['emailSender'];
        } else {
            $errors[] = "Vul alstublieft een correct email adres in.<br>";
        }

        if(isset($_POST['msg']) && trim($_POST['msg']) != "" /*&& preg_match("/^[ -~]+$/", $_POST['msg'])*/) {
            $msg['email'] = $_POST['emailSender'];
        } else {
            $errors[] = "Een bericht zonder inhoud is niet zo interessant!<br>";
        }

        if(empty($errors)) {
            //$mail->setFrom('contactform@kjdekker.com');
            //$mail->Subject('Contactform mail from '. $msg['name']);
            //$mail->Body = $msg['message'];
            //if (!$mail->send()) {
            //    $errors[] = "Mail kon niet verzonden worden: " . $mail->ErrorInfo;
            //} else {
            //    $msgSent = True;
            //}


            // // Always set content-type when sending HTML email
            // $headers = "MIME-Version: 1.0" . "\r\n";
            // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // // More headers
            // $headers .= 'From: contactform@kjdekker.com' . "\r\n";
            // if ( mail("dopeehedit@gmail.com" , "Contact form mail from " . $msg['name'] ,$msg['message'],$headers) ) {
            //     $msgSent = True;
            // }
            
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
            <?php 
                //als bericht niet succesvol is verstuurd
                if(isset($_POST['submitted'])) {
                    if(count($errors) > 0){
                        echo "<div class='alert alert-warning'>";
                        foreach ($errors as $error) {
                            echo $error;
                        }
                        echo "</div>";
                    }

                    if($msgSent) {
                        echo "<div class='alert alert-success'> Bericht is verzonden! </div>";
                    }
                }
            ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?p=contact"; ?>">
                <span class='d-block'>Naam:</span>
                <input type='text' name='nameSender'>
                <span class='d-block mt-2'>E-mail:</span>
                <input type='text' name='emailSender'>
                <span class='d-block mt-2'>Bericht: <i style='color:lightgrey;'>(Max 400 characters)</i> </span>
                <textarea cols="40" rows="5" maxlength="400" name="msg"></textarea>
                <input class="d-block btn btn-light" type='submit' value='Verstuur' name='submitted'>
            </form>
        </div>

    </div>
</div>
