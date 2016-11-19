<?php
$score = $_GET["score"];
$scorex = explode(":", $score);
$highscore = $scorex[0];
?>
<html>
<head>
<title>Animal Crush Game</title>
<meta property="og:title" content="HighScore Animal Crush is <?echo $highscore;?>!"/>
<meta property="og:image" content="https://3.bp.blogspot.com/-gXwcFmodAJg/WDBT0VQgnyI/AAAAAAAAA9Q/fHoULsIubUQEE_e_bkLpVkWbb2OM-UAYACLcB/s1600/Poster.png"/>
<meta property="og:site_name" content="KongRuksiam Studio"/>
<meta property="og:description" content="<?echo $highscore;?> is mine new highscore on Animal Crush!"/>
</head>
<meta http-equiv="refresh" content="0;URL=https://kongruksiamblogger.blogspot.com/" />
<body>
</body>
</html>
