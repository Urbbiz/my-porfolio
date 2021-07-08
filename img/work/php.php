$givenWord = ".".$givenWord.".";  // uzdedam taskus

// <--------perdarom i masiva be skaiciu-------->
$valuesNoNumbers= [];
foreach ($values as $value){
$valuesNoNumbers[] = str_replace(['1','2','3','4','5','6','7','8','9','0'], "",$value );
}

// echo  $valuesNoNumbers[0];


$foundValues= [];
foreach ($valuesNoNumbers as $key=> $value){
// echo $key."-". $value ;
// print_r($value);
$found=false;
do {
// echo $key;
$offset = 0;
if ($found !== false) {
    $offset = $found + 1;
    $snippet = $values[$key];
    
    $snippetIndex = 0; 
    for($i= 0; $i < strlen($snippet); $i++ ){
        
        $number = intval($snippet[$i]);
        if($number > 0 ){

          $index = $snippetIndex + $found -1;
            if (!array_key_exists($index, $foundValues) || $foundValues[$index] < $number ){
                 $foundValues[$index] = $number; 
            }
        }else {
             $snippetIndex ++;   // didins kai tik atras raide, o ne skaiciu 
        }
    }
    
    // echo "positionInWord: ". $found .", value: " . $values[$key] . "\n";
}
$found = stripos($givenWord, $value, $offset);

}while($found !== false);



//print_r($valuesNoNumbers[4446]); 
}

$finalResult = "";
for ($i=0; $i < strlen($givenWord) ; $i++) { 
$finalResult .=  $givenWord[$i];

if(array_key_exists($i,$foundValues ) && $foundValues[$i]% 2 ==1 ){
$finalResult .=  "-";


// echo $foundValues[$i];
}
}
return trim($finalResult, ".");


}