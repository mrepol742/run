<?php
$code = $_POST["Code"] ?? "";
$lang = $_POST["Lang"] ?? "";

if ($code == "") {
    exit("{\"error\":\"742\",\"description\":\"?code (Code) is not defined.\"}");
}
if ($lang == "") {
    exit("{\"error\":\"743\",\"description\":\"&lang (Language) is not defined.\"}");
}

$filen = getTimestamp() . ".php";
write($filen, $code);
$output = run("php " . $filen);
echo $output;
unlink($filen);

function write($file, $content) {
    $myfile = fopen($file, "w") or die("{\"error\":\"769\",\"description\":\"Unable to write file.\"}");
    fwrite($myfile, $content);
    fclose($myfile);
}

function getTimestamp() {
    $timeofday = gettimeofday();
    $mili = sprintf('%d%d', $timeofday["sec"], $timeofday["usec"] / 1000);
    $a = floor($mili / 1000) + rand(0, 90000) + rand(0, 20000);
  return $a;
}

function run($cmd) {
    return shell_exec($cmd);
}
?>