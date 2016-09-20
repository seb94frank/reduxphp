<?php 
require_once("db_const.php");  
?>
<!doctype html> 
<head> 
<meta charset="utf-8"> 
<title>Chuck Norris Facts</title> 
<link rel="stylesheet" type="text/css" href="css/styles.css">	 
</head>  
<body>     	 
<header> 
<h1>Chuck Norris Facts</h1>

<?php 

// etablere forbindelsen via et mysql-objekt

$connection = new mysqli(HOST, USER, PASS, NAME); 
$connection->set_charset("utf8");
		 
//tjek om der er hul igennem
	 
		 if($connection->connect_error){
			die($connection->connect_error);
			} else {
			echo '<span class="hint">[Successful connection to MySQL database!]</span>';
			}
		 
		 ?>
         </header>
         <?php 
		 $jokedata = $connection->query("SELECT * FROM jokes ORDER BY id DESC"); 
		 while($result = $jokedata->fetch_assoc()){
		 ###############################################################################################
		 # Oh my god - I need a way to render ALL records from the database, not only the last one 😞  #
		 # This makes me sick...                                                                       # 
		 ###############################################################################################
		 ($result);
			echo '<!-- single Chuck Norris joke start -->
			<div class="joke">
					<img src="' .$result['img'] . '" class="norris_pic" alt="Chuck Norris caricature"/>
					<h2>' .$result['joke'] .  '</h2>	       
            </div>';
			echo '<!-- single joke end -->';
		 };
		 ?>  
</body> </html>