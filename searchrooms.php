<?php
    session_start();
    require 'dbconf.php';
    $startdate = $_GET["from"];
    $enddate = $_GET["to"];
    $persons = $_GET["persons"];
    $beds = $_GET["beds"];
    $searchar=array("startdate"=>$startdate,"enddate"=>$enddate,"persons"=>$persons,"beds"=>$beds);
    $sqlquery = "select type,count(type) as rav,price from rooms "
            . "where numofper='".$persons."' and numofbeds='".$beds."' "
            . "and roomid not in (select rooms_roomid from reservations "
            . "where startdate between '".$startdate."' and '".$enddate."' "
            . "or enddate between '".$startdate."' and '".$enddate."')group by type";
    
    $stmt=$conn->prepare($sqlquery);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $results=($stmt->fetchAll());
    $_SESSION["results"]=$results;
    $_SESSION["lastsearch"]=$searchar;
    $newURL="index.php?page=rar.php";
    header('Location: '.$newURL);