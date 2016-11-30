<?php
$username = strtolower((isset($_GET['username']) ? $_GET['username'] : ""));
$videofile = (isset($_GET['videofile']) ? $_GET['videofile'] : "");
?>
<video src="videos/<?php echo $username; ?>/<?php echo $videofile; ?>" alt="videos/<?php echo $username; ?>/<?php echo $videofile; ?> path ERROR" controls autoplay> 
</video>