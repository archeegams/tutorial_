<?php
    
    // header("refresh: 1");
    // $ip =   "127.0.0.1";
    // exec("ping -n 3 $ip", $output, $status);
    // print_r($output);

    // $ipaddress = getenv("REMOTE_ADDR");
    if (!empty($_SERVER["HTTP_CLIENT_IP"])){
        $category_ip = "shared_internet";
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
        $category_ip = "proxy_internet";
        $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }else{
        $category_ip = "not_proxy_internet";
        $ip = $_SERVER["REMOTE_ADDR"];
    }

    echo '<pre>';

        echo "Client Ip Category : ".$category_ip."\n";
        echo "Client Ip Address : ".$ip."\n";

        // $ip="192.168.50.245";

        // exec("ping -n 1 $ip", $output, $result);
        // print_r($output);
        // echo "result : ".$result."\n";
        // if ($result == 0)
        // echo "Ping successful!\n";
        // else
        // echo "Ping unsuccessful!\n";

        $popularBrowsers = ["Opera","OPR/", "Edg", "Chrome", "Safari", "Firefox", "MSIE", "Trident"];

        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $userBrowser = 'Other less popular browsers';
        foreach ($popularBrowsers as $browser) {
            if (strpos($userAgent, $browser) !== false) {
                $userBrowser = $browser;
                break;
            }
        }

        switch ($userBrowser) {
            case 'OPR/':
                $userBrowser = 'Opera';
                break;
            case 'MSIE':
                $userBrowser = 'Internet Explorer';
                break;

            case 'Trident':
                $userBrowser = 'Internet Explorer';
                break;

            case 'Edg':
                $userBrowser = 'Microsoft Edge';
                break;
        }

        echo "Client Browser : " . $userBrowser."\n";

        $hsotname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        echo "Client Host Name : " . $hsotname."\n";

        // print_r($_SERVER);
        // phpinfo(32);

        // if (!isset($headers['AUTHORIZATION']) || substr($headers['AUTHORIZATION'],0,4) !== 'NTLM'){
        //     header('HTTP/1.1 401 Unauthorized');
        //     header('WWW-Authenticate: NTLM');
        //     exit;
        // }

        $isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile")); 
        $isTab = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "tablet")); 
        $isWin = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "windows")); 
        $isAndroid = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "android")); 
        $isIPhone = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "iphone")); 
        $isIPad = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "ipad")); 
        $isIOS = $isIPhone || $isIPad; 
        
        if($isMob){ 
            if($isTab){ 
                echo 'Client Device : Tablet'."\n"; 
            }else{ 
                echo 'Client Device : Mobile'."\n"; 
            } 
        }else{ 
            echo 'Client Device : Desktop'."\n";  
        } 
        
        if($isIOS){ 
            echo 'Client Build : iOS'."\n"; 
        }elseif($isAndroid){ 
            echo 'Client Build : Android'."\n"; 
        }elseif($isWin){ 
            echo 'Client Build : Windows'."\n"; 
        }else{
            echo 'Client Build : Linux'."\n"; 
        }
        
    echo '</pre>';
    // phpinfo();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>

</body>
</html>