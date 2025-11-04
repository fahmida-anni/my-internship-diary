<?php
$name = "Fahmida Alam Anni";
$age = 25;

$name_of_learners = ["Developer One", "Developer Two", "Developer Three", "Developer Four", "Developer Five"];
$age_of_learners = [18, 19, 20, 21, 22];

for ($i=0; $i < 5; $i++) { 
echo $name_of_learners[$i]." ". "is ".$age_of_learners[$i]." years old "."<br/>" ;
}

if (4 < 5) {
	echo "True, 4 is smaller than 5";
}else{
	echo "false";
}
if (4 == 4) {
	echo "True";
}else{
	echo "false";
}


?>