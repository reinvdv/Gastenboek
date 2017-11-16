<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>gastenboek</title>
    <style media="screen">
    body{
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      text-align: center;
      background-color: deepskyblue;

    }

    .voornaam{
      /*background-color: #333333;*/
        background: linear-gradient(to bottom right, #404040, #262626); /* Standard syntax */
      padding: 5px;

    }
      .bericht{
        width: 15%;
        background-color: white;
        margin: 0 auto;
        margin-top: 15px;
        border: 1px solid black;
        border-radius: 5px;
        padding-bottom: 5px;
      }

      span{
        color: deepskyblue;
      }
      footer {width: 100%;
         padding: 1em 0px;
         text-align: center;
         background-color: black;
         color: white;
         position: fixed;
         bottom: 0;
         border-top: 2px solid deepskyblue;
      }
      .submit{
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        width:100px;
        height:40px;
        background-color:#333333;
        border:2px solid black;
        border-radius:10px;
        color:deepskyblue;
        font-size:17px;
        cursor:pointer !important;
        outline:none;
        transition: 0.2s;
        text-align: center;

        }

        .submit:hover{
          background-color:#222222;
          color: white;
        }
        form {
          padding: 20px 0;
          position: relative;
          z-index: 2;
        }
        form input {
                  appearance: none;
          outline: 0;
          border: 1px solid rgba(255, 255, 255, 0.8);
          background-color: rgba(255, 255, 255, 0.6);
          width: 250px;
          border-radius: 3px;
          padding: 10px 15px;
          margin: 0 auto 10px auto;
          display: block;
          text-align: center;
          font-size: 18px;
          -webkit-transition-duration: 0.25s;
                  transition-duration: 0.25s;
          font-weight: 300;
        }
        form input:hover {
          background-color: rgba(255, 255, 255, 0.7);
        }
        form input:focus {
          background-color: white;
          width: 300px;
        }
        form button {
                  appearance: none;
          outline: 0;
          background-color: white;
          border: 0;
          padding: 10px 15px;
          border-radius: 3px;
          width: 250px;
          cursor: pointer;
          font-size: 18px;
          transition-duration: 0.25s;

        }
        form button:hover {
          background-color: #f5f7f9;
        }

        label{
          font-weight: bold;
          font-size: 25px;
          padding: 5px;
        }



    </style>
  </head>
  <body>

    <form class="" action="process.php" method="post" class="inputforum">

      <label for="voornaam">voornaam:</label></br>
      <input type="text"  name="voornaam" placeholder="voornaam"  /></br>

      <label for="review">review:</label><br>
      <input type="text" id="review" name="review" placeholder="review"  /><br>
      <input type="submit" value="submit" name="submit" class="submit" />


    </form>

    <?php
    //$dbc = mysqli_connect('localhost', 'root', 'root', 'jaar2') or die ('ERROR!');
    $dbc = mysqli_connect('localhost', '22810_wall', '22810', 'rein_db') or die ('ERROR!');

    $query = "SELECT * FROM reviews ORDER BY id DESC";
    $result = mysqli_query($dbc,$query) or die ("er is een four opgetreden");

    while($row = mysqli_fetch_array($result)) {
      $id = $row['id'];
      $voornaam = $row['voornaam'];
      $review = $row['review'];
      echo '<div class="bericht">
      <div class="voornaam"><span>' .$voornaam . ':</div></span></br>'
       . $review . "</div>";
    }

    ?>
     <footer>
       <span>Reinier van der Velden - KLAS MD2A </span>
     </footer>
  </body>
</html>

<!--
if(isset($_POST['submit']))
    {
      $voornaam = mysqli_real_escape_string($dbc, trim($_POST['voornaam']));
      $review = mysqli_real_escape_string($dbc, trim($_POST['review']));
      $sql = "INSERT INTO reviews (id, voornaam, review) VALUES ('$id', '$voornaam', '$review')";
      if(mysqli_query($dbc, $sql)){
          echo " insert gelukt";
      } else{
          echo "ERROR  $sql. " . mysqli_error($dbc);
      }
        $to = "22810@ma-web.nl";
        $subject = "Er is een nieuw bericht geplaatst";
        $msg = $voornaam . " heeft een nieuw bericht geplaatst.</br><p>
          Het bericht is: <br>" . $review;

          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
          $headers .= 'From: Gastenboek@ma-web.nl' . "\r\n";
          $headers .= '' . "\r\n";
          mail($to,$subject,$msg,$headers);
          header("Refresh:0");
          }

        while($row = mysqli_fetch_array($result)) {
          $id = $row['id'];
          $voornaam = $row['voornaam'];
          $review = $row['review'];
          echo '<div class="bericht">
          <div class="voornaam"><span>' .$voornaam . ':</div></span></br>'
           . $review . "</div>";
        } -->



                 <!-- $verbodenwoorden = array('hoer', 'kanker', 'bartanus', 'gvd');



                 $reviewcheck = strtolower($review);

                 $geenverbodenwoorden = true;
                 foreach ($verbodenwoorden as $verbodenwoord) {
                     if (preg_match("/\b$verbodenwoord\b/", $reviewcheck)) {
                       $geenverbodenwoorden = false;
                       break;
                     }
                   } -->
