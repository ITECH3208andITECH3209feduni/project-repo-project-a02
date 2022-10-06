<?php

try{
//include the mpdf library through the autoloader

include("/vendor/autoload.php1");

 

//initialize mpdf function

$mpdf = new \Mpdf\Mpdf();

 

//define the code that will be converted to pdf

$mpdf->WriteHTML('this is a test html');

 

//define display mode

$mpdf->SetDisplayMode('real');

 

//out put in browser using the output function and define the filename

$mpdf->Output("mpdf_file.pdf","I");
}catch(\Exception $e){
    echo $e->getMessage();
}

?>