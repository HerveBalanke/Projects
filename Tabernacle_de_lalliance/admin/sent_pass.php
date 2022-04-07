 <?php
          include_once("../sessions/session_admin.php");
          require_once("../setup/connection.php");
          $admin=$_SESSION['admin'];
          require '../gh/Smsgh/Api.php';

          $id=$_POST["id"];
          $query=$con->query("update utilisateur set photo='$path' where uid='$id'") or (print_r($con->errorInfo()));
          $out_ut=$con->query("select tel, uname, pass from utilisateur where uid='$id' ;") or (print_r($con->errorInfo()));
                  $out_ut=$out_ut->fetch();
                  $nom=$out_ut['nom'];
                  $prenom=$out_ut['prenom'];
                  $tel=$out_ut['tel'];
                  $uname=$out_ut['uname'];
                  $pass=$out_ut['pass'];

          $auth = new BasicAuth("gvtmltsv", "ejyrwxpk");
          // instance of ApiHost
          $apiHost = new ApiHost($auth);

          // instance of AccountApi
          $accountApi = new AccountApi($apiHost);
          // Get the account profile
          // Let us try to send some message
          $messagingApi = new MessagingApi($apiHost);
          try {
              // Send a quick message
             // $messageResponse = $messagingApi->sendQuickMessage("TA", "+233".$tel, "$nom $prenom Bienvenue au Tabernacle de l'Alliance, L'auditorium de la transformation");


              $mesg = new Message();
              $mesg->setContent("$nom $prenom bienvenue au TA Manager. Votre Uname est: $uname et votre mot de passe: $pass. Merci, Jesus t'aime.");
              $mesg->setTo("$tel");
              $mesg->setFrom("TA");
              $mesg->setRegisteredDelivery(true);

              // Let us say we want to send the message 3 days from today
             // $mesg->setTime(date('Y-m-d H:i:s', strtotime('+1 week')));*/

                $messageResponse = $messagingApi->sendMessage($mesg);

              if ($messageResponse instanceof MessageResponse) {
                  echo "SENTY";
              } elseif ($messageResponse instanceof HttpResponse) {
                  echo "SENTN";
              }
          } catch (Exception $ex) {
              echo $ex->getTraceAsString();
          }
            
    ?>