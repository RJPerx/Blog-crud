<?php
function dataConnect() {
    define('MYDATA_SERVER', 'localhost');
    define('MYDATA_USERNAME', 'root');
    define('MYDATA_PASSWORD', '');
    define('MYDATA_NAME', 'crud');
    
    $connect = mysqli_connect(MYDATA_SERVER, MYDATA_USERNAME, MYDATA_PASSWORD, MYDATA_NAME);
    
    if($connect) {
        return $connect;
    }else{
        echo "Cannot Connect to the database";
    }
}

?>