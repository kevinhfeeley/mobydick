<?php

	$stops = file_get_contents('./stop-words.txt');
	$stops = explode("\n",$stops);
	$moby = file_get_contents('./mobydick.txt');
	echo "<pre>";
	$moby = explode("\n",$moby);
	$wordlist=array();
	$punct=array('.',',','"',"'",";","!","“","”","’s","—","(",")","’","?");
	foreach($moby AS $line){
		$words = explode(" ",str_replace($punct,'',trim(strtolower($line))));
		foreach($words AS $word){
			if(strlen(trim($word))>0&&!in_array(trim($word),$stops)){
				if(isset($wordlist[trim($word)])){
					$wordlist[trim($word)]++;
				}else{
					$wordlist[trim($word)]=1;
				}
			}
		}
	}
	arsort($wordlist);
	$max = max($wordlist);
	echo "<table><tr><th style='background-color:#999;'>Word</th><th style='background-color:#999;'>Count</th><th style='background-color:#999;'>&nbsp;</th></tr>";
	$i=0;
	foreach($wordlist AS $word=>$count){
		echo "<tr><th>";
		echo $word."</th><th>";
		echo $count;
		echo "</th><td>";
?><img src='./mobygraph.php?max=<?php echo $max; ?>&count=<?php echo $count; ?>' /><?php
		echo "</td></tr>";
		$i++;
		if($i==10){break;}
	}
	echo "</table>";
?>
