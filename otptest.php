<?php
function reqotp($no){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://tdwidm.telkomsel.com/passwordless/start");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"phone_number=%2B".$no."&connection=sms");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_REFERER, 'https://my.telkomsel.com/');
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36');
        $server_output = curl_exec ($ch);
        curl_close ($ch);
        echo $server_output."\n";
        sleep($wait);
        $x++;
        flush();
    }

print "\n Minta Kode OTP Telkomsel \n " ;
echo " \033[36;1m Nomor 62xx: ";
$nomor = trim(fgets(STDIN));
$res = file_get_contents("https://testnanikore.000webhostapp.com/api.php?nope=$nomor&reqotp");
if (empty($nomor)){
    echo 'Nomor tidak boleh kosong.';
    } else {
    echo "Mengirim OTP...\n";
    sleep(2);
    if (strpos($res,"dikirim")) {
    echo "Berhasil mengirim OTP";
    }else {
    echo "Gagal mengirim OTP\n";
    exit();
    }
    echo "\n";
    }
//$execute = reqotp($nomor);
//print $execute;
//print "\033[36;1m OTP Berhasil Terkirim! \n";
?>
