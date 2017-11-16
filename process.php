<?php

error_reporting();
//$dbc = mysqli_connect('localhost', 'root', 'root', 'jaar2') or die ('ERROR!');
$dbc = mysqli_connect('localhost', '22810_wall', '22810', 'rein_db') or die ('ERROR!');



if(isset($_POST['submit'])){
  $voornaam = mysqli_real_escape_string($dbc, trim($_POST['voornaam']));
  $review = mysqli_real_escape_string($dbc, trim($_POST['review']));
  $verbodenwoorden = array('hoer', 'kanker', 'bartanus', 'gvd');

  $reviewcheck = strtolower($review);
  $geenverbodenwoorden = true;
  foreach ($verbodenwoorden as $verbodenwoord) {
      if (preg_match("/\b$verbodenwoord\b/", $reviewcheck)) {
        $geenverbodenwoorden = false;
        break;
      }
    }

  if  ($geenverbodenwoorden) {
    $query = "INSERT INTO reviews VALUES(0, '$voornaam', '$review')";
    $result = mysqli_query($dbc,$query) or die ("er is een four opgetreden");

  $to = "22810@ma-web.nl";
  $subject = "Er is een nieuw bericht geplaatst";
  $msg = $voornaam . " heeft een nieuw bericht geplaatst.</br><p>
    Het bericht is: <br>" . $review;

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: Gastenboek@ma-web.nl' . "\r\n";
    $headers .= '' . "\r\n";
    mail($to,$subject,$msg,$headers);

header("location: ./index.php");

}else {
echo "je hebt geen nette woorden gebruikt";
}

}

 ?>
