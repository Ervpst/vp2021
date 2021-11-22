<?php
    //alustame sessiooni
    session_start();
    //kas on sisselogitud
    if(!isset($_SESSION["user_id"])){
        header("Location: page.php");
    }
    //v�ljalogimine
    if(isset($_GET["logout"])){
        session_destroy();
        header("Location: page.php");
    }
	
    require_once("../../../../config.php");
	require_once("fnc_movie.php");
    require_once("fnc_general.php");
      
    require("page_header.php");
?>

	<h1><?php echo $_SESSION["first_name"] ." " .$_SESSION["last_name"]; ?>, veebiprogrammeerimine</h1>
	<p>See leht on valminud �ppet�� raames ja ei sisalda mingisugust t�siseltv�etavat sisu!</p>
	<p>�ppet�� toimus <a href="https://www.tlu.ee/dt">Tallinna �likooli Digitehnoloogiate instituudis</a>.</p>
	<hr>
    <ul>
        <li><a href="?logout=1">Logi v�lja</a></li>
		<li><a href="home.php">Avaleht</a></li>
    </ul>
	<hr>
    <h2>Filmi info</h2>
    <?php echo list_person_movie_info(); ?>
</body>
</html>