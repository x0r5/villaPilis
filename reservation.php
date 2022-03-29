<?php
    header("Content-Type: application/json; charset=utf-8", true);
    function error($msg){
        $response = array("success" => false, "message" => $msg);
        return json_encode($response);
    }

 //turn on error reporting for debugging:
    //ini_set('display_errors', 'On');
    //error_reporting(E_ALL);
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';
    require 'src/credentials.php';


    function checkCaptcha($gotCaptcha, $secretKey){
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array('secret' => $secretKey, 'response' => $gotCaptcha);
        $options = array(
            'http' => array(
              'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
              'method'  => 'POST',
              'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $responseKeys = json_decode($response,true);
        header('Content-type: application/json');
        if($responseKeys["success"]) {
        return true;
        }
        return false;
    }

    $error = "";
    $message = "";
    
    if($_POST){
        $return = array();

        $name = $_POST['input-name'];
        $persons = $_POST['input-persons'];
        $children = $_POST['input-children'];
        $email = $_POST['input-email'];
        $daterange = $_POST['daterange'];
        $comment = $_POST['input-comment'];
        $captcha = $_POST['g-recaptcha-response'];

        
        if(!$_POST["input-email"]){
            $error .= "Email cím nélkül nem tudok válaszolni. :)<br>";
        }
        if(!$_POST["input-name"]){
            $error .= "Add meg a nevedet, hogy tudjam kinek kell válaszolni.<br>";
        }
        if($_POST['input-email'] && filter_var($_POST["input-email"], FILTER_VALIDATE_EMAIL) === false){
            $error .= "Az email címben valamit elírtál.<br>";
        }
        if( ! is_numeric($persons)){
            $error .="Add meg hányan szeretnétek jönni!";
        }
        if($error == "" && ( ! $captcha || ! checkCaptcha($captcha, $credential_captchaPrivateKey))){
            $error = "Pipáld ki a \"nem vagyok robot\" jelölőt! Ha nem megy kérlek írj emailt inkább!";
        }
        
        if($error != ""){
            $errorMessage = '<div class="alert alert-danger" role="alert"><p>'.$error.'</p></div>';
            die(error($errorMessage));
        }
        else{
            
            
          $body = '<html lang = "hu"><head><meta charset="utf-8"></head><body>
                    <p>Kedves ' . $name . '!</p><p>Köszönjük, hogy érdeklődsz a Villa után. A kérésedet feldolgozzuk, és amint tudunk visszajelzünk.<br>A Villával kapcsolatban további információkat a weboldalunkon találsz: <a href="https://www.villapilis.hu/">villapilis.hu</a></p>
                    <p>Az érdeklődésed tartalma:
                    <ul>
                        <li>'. $daterange . '</li>
                        <li>' . $persons . ' Felnőtt</li>
                        <li>' . $children . ' Gyermek</li>
                        <li><p>'. $comment . '</p></li>
                    </ul>
                    </p>
                    <p>Bármilyen kérdés esetén szívesen állunk rendelkezésedre!</p>
                    <p>Üdvözlettel: Benes Dorottya
                    <br><a href="tel:+36203245569">+36203245569</a>
                    <br>info@villapilis.hu</p></body></html>';
            
            $mail = new PHPMailer();
            $mail->IsSMTP();                                          // SMTP-n keresztuli kuldes
            $mail->Host     = $credential_host;         // SMTP szerverek
            $mail->SMTPAuth = true;                                   // SMTP
            $mail->Port = 587;
            $mail->SetLanguage("hu", 'src/phpmailer.lang-hu.php');    //nyelv beállítása
            $mail->CharSet = 'utf-8';

            $mail->Username = $credential_username;            // SMTP felhasználo
            $mail->Password = $credential_password;                               // SMTP jelszo

            $mail->From     = $from;            // Felado e-mail cime
            $mail->FromName = $fromName;                // Felado neve
            $mail->AddAddress($email, $name);         // Cimzett es neve
            $mail->AddReplyTo($from, 'Infromáció'); // Valaszlevel ide
            $mail->AddBCC($from, 'Új levél érkezett!');
            $mail->AddBCC($bcc, 'Új levél érkezett!');

            $mail->WordWrap = 80;                                     // Sortores allitasa
            $mail->IsHTML(true);                                      // Kuldes HTML-kent

            $mail->Subject = 'Villa Pilis foglalás';                   // A level targya
            $mail->Body    = $body;          // A level tartalma 
            
            if (!$mail->Send()){
                $errorMessage = '<div class="alert alert-danger" role="alert">Nem sikerült az üzenetet elküldeni. Próbáld újra később, vagy írj az <a href="mailto:info@villapilis.hu">info@villapilis.hu</a> -ra</div> ';
                die(error($errorMessage));
                
            }
            else{
                $successMessage = '<div class="alert alert-success" role="alert">Az üzenetet sikeresen elküldted! Kérlek várj türelemmel a válaszra.</div>';
                $response = array("success" => true, "message" => $successMessage);
                echo json_encode($response);
                
            } 
                
        }
        
    }else{
        error('no POST message');
    }
    ?>