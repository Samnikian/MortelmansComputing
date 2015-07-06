<style>
#product{
	margin: 0 auto 0 auto;
	width:300px;
}
#teruglink{
	display: inline-block;
}
</style>
<?php
if(isset($_GET['i'])){
	$db = new mysqli('mortelmans.org.mysql', 'mortelmans_org', 'vJQ7iopgTxMtelEwIMdS', 'mortelmans_org');
	if($db->connect_errno > 0){
	    die('Unable to connect to database [' . $db->connect_error . ']');
	}
	$groothandel_code = $db->real_escape_string($_GET['i']);
	$query = "SELECT * FROM `inkt` WHERE `groothandel_code`='".$groothandel_code."';";
	if($result = $db->query($query)){
		if($result->num_rows !== 0){
			
			$assoc = $result->fetch_assoc();
			$result->close();
			$naam = $assoc['naam'];
			$foto_groot = $assoc['foto_groot'];
			echo '<div id="product">'.$naam.'<br />';
			echo '<img src="'.$foto_groot.'" alt="'.$naam.'" /><br />';
			echo $assoc['omschrijving'];
			if($assoc['aangepasteprijs']==0){
				$berekendeprijs = (($assoc['inkoopprijs']+9)*1.05)*1.21;
				$adviesprijs = $assoc['adviesprijs'];//*1.21;
				if($berekendeprijs < $adviesprijs){
					$verkoopprijs = $adviesprijs;
				}
				else{
					$verkoopprijs = $berekendeprijs;
				}
			}
			else{
				$verkoopprijs = $assoc['aangepasteprijs'];
			}
			echo '<br /><br />Prijs: '.round($verkoopprijs,2).'&#8364';
			//echo '<br />Inkoopprijs: '.($assoc['inkoopprijs']+5)*1.21.'&#8364';
			if(strpos($_SERVER['HTTP_REFERER'],'www.twindis.com') !== 0){
				echo "<br /><br /><a id=\"teruglink\" href=\"".$_SERVER['HTTP_REFERER']."\" />Terug</a>";
			}
			echo '</div>';
		}
		else{
			echo '<div id="product">Sorry, het gevraagde product werd niet gevonden.</div>';
		}
	}
}
?>