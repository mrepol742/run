<?php
$code = $_POST["Code"] ?? "";
$lang = $_POST["Lang"] ?? "";

if ($code == "") {
    exit("{\"error\":\"742\",\"description\":\" (Code) is not defined.\"}");
}
if ($lang == "") {
    exit("{\"error\":\"743\",\"description\":\" (Language) is not defined.\"}");
}

switch ($lang) {
    case "php":
        $filen = getTimestamp() . ".php";
        write($filen, $code);
        $output = run("php " . $filen);
        echo $output;
        unlink($filen);
    break;
    case "etc":
        $output = run($code);
        echo $output;
    break;
  case "c":
   $filen = getTimestamp() . ".c";
        write($filen, $code);
         run("gcc " . $filen);
   $output = run("./a.out");
        echo $output;
        unlink($filen);
  break;
case "python":
   $filen = getTimestamp() . ".python";
        write($filen, $code);
        $output = run("python " . $filen);
        echo $output;
        unlink($filen);
  break;
  case "sh":
  case "bash":
  echo "Permission Denied!";
  break;
  case "c++":
  case "cpp":
   case "cplusplus":
   $filen = getTimestamp() . ".cpp";
        write($filen, $code);
         run("g++ " . $filen);
   $output = run("./a.out");
        echo $output;
        unlink($filen);
  break;
  case "js":
  case "javascript":
   $filen = getTimestamp() . ".js";
        write($filen, $code);
        $output = run("node " . $filen);
        echo $output;
        unlink($filen);
  break;
    case "java":
        $filen = getTimestamp();
        write($filen . ".java", $code);
      run("javac " . $filen . ".java");
        $output = run("java Main");
        echo $output;
        unlink($filen . ".java");
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

function getTimestamp() {
    $timeofday = gettimeofday();
    $mili = sprintf('%d%d', $timeofday["sec"], $timeofday["usec"] / 1000);
    $a = floor($mili / 1000) + rand(0, 90000) + rand(0, 20000);
  return $a;
}

function run($cmd) {
    return shell_exec($cmd . " 2>&1");
}
?>