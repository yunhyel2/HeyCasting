<?php 

if(!$_POST['Name']){ 
echo "<option selected disabled value>세부분야</option>";	
exit; 
} 

$zipfile = array(); 
$fp = fopen("./code.db", "r"); 
while(!feof($fp)) { 
$zipfile[] = fgets($fp, 4096); 
} 
fclose($fp); 
$cnt = count($zipfile); 

echo "<option value disabled selected>세부분야</option>"; 
for($i=0; $i < $cnt; $i++){ 
if(preg_match("/".$_POST['Name']."/",$zipfile[$i])){ 
$joso_ex = explode(" ",$zipfile[$i]); 
echo "<option value=\"".$joso_ex[1]."\">".$joso_ex[1]."</option>"; 
} 
} 
?> 
