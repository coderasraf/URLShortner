<?php include 'config.php'; ?>
<?php

$fullURL = mysqli_real_escape_string($conn, $_POST['fullURL']);
if(!empty($fullURL) && filter_var($fullURL, FILTER_VALIDATE_URL)){
    $ran_url = substr(md5(microtime()), rand(0, 26), 5);
    $sql = mysqli_query($conn, "SELECT shorten_url FROM url_table WHERE shorten_url='{$ran_url}'");

    if(mysqli_num_rows($sql) > 0){
        echo 'Something went wron.Please, regenarate new url again';
    }else{
        $sql2 = mysqli_query($conn, "INSERT INTO url_table (shorten_url, full_url, clicks) VALUES ('{$ran_url}', '{$fullURL}', '0')");

        if($sql2){ 
            // Selectin recently inserted shorten link
            $sql3 = mysqli_query($conn, "SELECT shorten_url FROM url_table WHERE shorten_url='{$ran_url}'");

            if(mysqli_num_rows($sql3) > 0){
                $shortenURL = mysqli_fetch_assoc($sql3);
                echo $shortenURL['shorten_url'];
            }

        }else{
            echo 'Something went to wron. Please, try again';
        }
    }

}else{
    echo "$fullURL - This is not valid url";
}



?>