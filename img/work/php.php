?php

class ExtractionValues {
    
  

    // isspausdina values is txt filo
    // reikia gautus duomenis isirasyti i masyva runtime metu.
    public static function getValues(){
        $values = [];
        $file = new SplFileObject("inputfile.txt");
    while (!$file->eof()) {
    $values[] = $file->fgets();
    // echo $file->fgets();
    // echo "\n","\n";
}
// echo count($values);
// echo print_r($values);
return $values;
    }
}