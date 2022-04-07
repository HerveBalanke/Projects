<?php

        include_once("../sessions/session_cellule.php");
        require_once("../setup/connection.php");
        $bid=$_SESSION['bid'];
        $cellule=$_SESSION['cellule'];
        $zone_cel=$_SESSION['zone_cel'];

            $nom=ucwords($_POST["nom"]);
            $prenom=ucwords($_POST["prenom"]);
            $tel=$_POST["tel"];
            $email=$_POST["email"];
            $cid=$_POST["cid"];
            $branche=$_POST["branche"];
            $date=date('Y-m-d');

                $in=$con->prepare("insert into membre_cel (nom, prenom, tel, email, cellule, desactivate, date, branche) values(?,?,?,?,?,?,?,?) ;") or (print_r($con->errorInfo()));
                $in->execute(array( $nom, $prenom, $tel, $email, $cid, 'off', $date, $branche)) or (print_r($con->errorInfo()));

                // $query=$con->query("select * from reunion where date='$date';")  or (print_r($con->errorInfo()));
                // $count=$query->rowCount();
                // if($count>0){
                //   $query1=$con->query("select * from membre_cel where date='$date';")  or (print_r($con->errorInfo()));
                //   $count1=$query1->rowCount();
                //   for($i=0; $i<$count; $i++){
                //     $fetch=$query->fetch();
                //     $rid=$fetch['rid'];

                //     for($x=0; $x<$count1; $x++){
                //       $fetch1=$query1->fetch();
                //       $id=$fetch1['mcid'];
                //       $up=$con->query("insert into presence(statut, membre, reunion) values('-', '$id', '$rid')") or (print_r($con->errorInfo()));

                //   }
                //   }

                // }

            if($in){ 
                     echo "OK";
                               }

?>