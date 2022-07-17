<?php

// How to use: Access /any-rondom-string.php?fqdn=FQDN
// Whois, grep, and cut commands are required 

$fqdn = $_GET['fqdn'];
$regexp = '/^(?!\-)[\-0-9A-Za-z]{1,63}(?<!\-)(?:\.(?!\-)[\-0-9A-Za-z]{1,63}(?<!\-))*$/';

if (preg_match($regexp, $fqdn)) {
    $ip   = gethostbyname($fqdn);
    $ary = array();
    $comand = "echo -n `whois -h whois.nic.ad.jp ${ip} | grep Organization | cut -d ' ' -f 4-`";

    exec($comand, $ary);

    foreach($ary as $whois){
        echo $whois . "<br>";
    }
}

else {
    echo "Breaking News: regexp check error :-)";
}
?>