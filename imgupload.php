<?php
    $filename =$_GET['filename'];

    if (file_get_contents('php://input')){
        // Remove the headers (data:,) part.
        $filteredData=substr(file_get_contents('php://input'), strpos(file_get_contents('php://input'), ",")+1);

        // Need to decode before saving since the data we received is already base64 encoded
        $decodedData=base64_decode($filteredData);

        //create the file
        if($fp = fopen( $filename, 'wb' )){
            fwrite( $fp, $decodedData);
            fclose( $fp );
        } else {
            echo "Could not create file.";
        }
}

echo "Created image ".$filename;

?>
