<?php
//customer_view.php - shows details of a single customer
?>
<?php include 'includes/config.php';?>
<?php

//process querystring here
if(isset($_GET['id']))
{//process data
    //cast the data to an integer, for security purposes
    $id = (int)$_GET['id'];
}else{//redirect to safe page
    header('Location:game_view.php');
}


$sql = "select * from PS4GameLibrary where PS4GameID = $id";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        $GameTitle = stripslashes($row['GameTitle']);
        $Publisher = stripslashes($row['Publisher']);
        $Developer = stripslashes($row['Developer']);
        $YearReleased = stripslashes($row['YearReleased']);
        $Rating = stripslashes($row['Rating']);
        $title = "Title Page for " . $GameTitle;
        $pageID = $GameTitle;
        $Feedback = '';//no feedback necessary
    }    

}else{//inform there are no records
    $Feedback = '<p>This customer does not exist</p>';
}

?>
<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<?php
    
    
if($Feedback == '')
{//data exists, show it
    
    echo '<p class="view">';
    
    ?>
    <p>
    <?php echo 'Publisher: <b>' . $Publisher . '</b> ';?><br>
    <?php echo 'Developer: <b>' . $Developer . '</b> ';?><br>
    <?php echo 'Year Released: <b>' . $YearReleased . '</b> ';?><br>
    <?php echo 'Rating: <b>' . $Rating . '</b> ';?><br>
    </p>
    <?php
    echo '<img src="db_imgs/game' . $id . '.jpg" />';
    echo '</p>'; 
}else{//warn user no data
    echo $Feedback;
}    

echo '<p><a href="game_library.php">Go Back</a></p>';

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php include 'includes/footer.php';?>