<?php
	$moby = file_get_contents('https://www.gutenberg.org/files/2701/2701-h/2701-h.htm');
	echo "<pre>";
	$moby = explode("\n",$moby);
	$wordlist=array();
	$punct=array('.',',','"',"'",";","!","“","”","’s","—","(",")","’","?");
	foreach($moby AS $line){
		$words = explode(" ",strip_tags(str_replace($punct,'',html_entity_decode(trim(strtolower($line))))));
		foreach($words AS $word){
			if(strlen(trim($word))>0){
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
	echo "Text pulled from https://www.gutenberg.org/files/2701/2701-h/2701-h.htm<br />";
	echo "<table><tr><th style='background-color:#999;'>Word</th><th style='background-color:#999;'>Count</th><th style='background-color:#999;'>&nbsp;</th></tr>";
	foreach($wordlist AS $word=>$count){
		echo "<tr><th>";
		echo $word."</th><th>";
		echo $count;
		echo "</th><td>";
?><img src='./mobygraph.php?max=<?php echo $max; ?>&count=<?php echo $count; ?>' /><?php
		echo "</td></tr>";
	}
	echo "</table>";
//	print_r($wordlist);
?>