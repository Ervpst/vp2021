<?php
    //alustame sessiooni
    session_start();
    //kas on sisselogitud
    if(!isset($_SESSION["user_id"])){
        header("Location: page.php");
    }
    //v?ljalogimine
    if(isset($_GET["logout"])){
        session_destroy();
        header("Location: page.php");
    }
	
    require_once("../../../../config.php");
	require_once("fnc_gallery.php");
    
    $page = 1;
    $page_limit = 5;
    $photo_count = count_public_photos(2);
    //hoolitseme, et saaks liikuda vaid legaalsetel?e lehek?lgedele, mis on olemas
    if(!isset($_GET["page"]) or $_GET["page"] < 1){
        $page = 1;
    } elseif(round($_GET["page"] - 1) * $page_limit >= $photo_count){
        $page = ceil($photo_count / $page_limit);
    } else {
        $page = $_GET["page"];
    }
    
    $to_head = '<link rel="stylesheet" type="text/css" href="style/gallery.css">' ."\n";
    
    require("page_header.php");
?>

	<h1><?php echo $_SESSION["first_name"] ." " .$_SESSION["last_name"]; ?>, veebiprogrammeerimine</h1>
	<p>See leht on valminud ?ppet?? raames ja ei sisalda mingisugust t?siseltv?etavat sisu!</p>
	<p>?ppet?? toimus <a href="https://www.tlu.ee/dt">Tallinna ?likooli Digitehnoloogiate instituudis</a>.</p>
	<hr>
    <ul>
        <li><a href="?logout=1">Logi v?lja</a></li>
		<li><a href="home.php">Avaleht</a></li>
    </ul>
	<hr>
    <h2>Minu oma fotod</h2>
    <p>
        <?php
            if($page > 1){
                echo '<span><a href="?page=' .($page - 1) .'">Eelmine leht</a></span> |' ."\n";
            } else {
                echo "<span>Eelmine leht</span> | \n";
            }
            if($page * $page_limit < $photo_count){
                echo '<span><a href="?page=' .($page + 1) .'">J?rgmine leht</a></span>' ."\n";
            } else {
                echo "<span>J?rgmine leht</span> \n";
            }
            
        ?>
    </p>
    <?php echo read_own_photo_thumbs($page_limit, $page); ?>
</body>
</html>