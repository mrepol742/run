<?php
$code = $_POST["Code"] ?? "";
$lang = $_POST["Lang"] ?? "";

if ($code == "") {
    exit("{\"error\":\"742\",\"description\":\"?code (Code) is not defined.\"}");
}
if ($lang == "") {
    exit("{\"error\":\"743\",\"description\":\"&lang (Language) is not defined.\"}");
}

switch ($lang) {
    case "php":
        $filen = getTimestamp() . ".php";
        write($filen, doContainHeader($lang, $code));
        $output = run("php " . $filen);
        echo $output;
        unlink($filen);
    break;
    case "etc":
        $output = run($code);
        echo $output;
    break;
    case "nodejs":
    break;
    case "java":
    break;
    default:
    exit("{\"error\":\"744\",\"description\":\"Language is not supported.\"}");
    break;
}

function write($file, $content) {
    $myfile = fopen($file, "w") or die("{\"error\":\"769\",\"description\":\"Unable to write file.\"}");
    fwrite($myfile, $content);
    fclose($myfile);
}

function doContainHeader($lang, $content) {
    switch ($lang) {
 case "php":
            if (startsWith($content, "<?php") && endsWith($content, "?>")) {
                return $content;
            }
            return "<?php\n" . $content . "\n?>";
            
        break;
        default:
        return $content;
    }
}

function getTimestamp() {
    $timeofday = gettimeofday();
    $mili = sprintf('%d%d', $timeofday["sec"], $timeofday["usec"] / 1000);
    $a = floor($mili / 1000) + rand(0, 90000) + rand(0, 20000);
  return $a;
}

function startsWith($string, $startString) {
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}

function endsWith($string, $endString) {
    $len = strlen($endString);
    if ($len == 0) {
        return true;
    }
    return (substr($string, -$len) === $endString);
}

function run($cmd) {
    return shell_exec($cmd);
}
?>