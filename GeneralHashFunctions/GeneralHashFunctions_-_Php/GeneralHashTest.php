<?php
require(dirname(__FILE__).'/GeneralHashFunctionLibrary.php');

$ghl = new GeneralHashFunctionLibrary();

$key = "abcdefghijklmnopqrstuvwxyz1234567890";

print("General Purpose Hash Function Algorithms Test \r\n");
print("By Arash Partow - 2002 \r\n");
print("Key: " . $key . "\r\n");
print(" 1. RS-Hash Function Value:   " . $ghl->RSHash($key) . "\r\n");
print(" 2. JS-Hash Function Value:   " . $ghl->JSHash($key) . "\r\n");
print(" 3. PJW-Hash Function Value:  " . $ghl->PJWHash($key) . "\r\n");
print(" 4. ELF-Hash Function Value:  " . $ghl->ELFHash($key) . "\r\n");
print(" 5. BKDR-Hash Function Value: " . $ghl->BKDRHash($key) . "\r\n");
print(" 6. SDBM-Hash Function Value: " . $ghl->SDBMHash($key) . "\r\n");
print(" 7. DJB-Hash Function Value:  " . $ghl->DJBHash($key) . "\r\n");
print(" 8. DEK-Hash Function Value:  " . $ghl->DEKHash($key) . "\r\n");
print(" 9. BP-Hash Function Value:   " . $ghl->BPHash($key) . "\r\n");
print(" 9. FNV-Hash Function Value:  " . $ghl->FNVHash($key) . "\r\n");
print("10. AP-Hash Function Value:   " . $ghl->APHash($key) . "\r\n");
