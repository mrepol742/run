<?php

$code = $_POST["Code"] ?? "";
$lang = $_POST["Lang"] ?? "";

if ($code == "") {
    exit("742");
}
if ($lang == "") {
    exit("743");
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
        $output1=  run("gcc " . $filen);
  if (file_exists("./a.out")) {
         $output = run("./a.out");
        echo $output;
        unlink($filen);
        unlink("a.out");
  } else {
     echo $output1;
     unlink($filen);
  }
  break;
case "python":
   $filen = getTimestamp() . ".py";
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
      $output1 =   run("g++ " . $filen);
   if (file_exists("./a.out")) {
   $output = run("./a.out");
        echo $output;
        unlink($filen);
        unlink("a.out");
   } else {
       echo $output1;
     unlink($filen);
   }
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
        $filen = getTimestamp() . "java";
        write($filen, $code);
     $output1 = run("javac " . $filen);
     if (file_exists("Main.class")) {
        $output = run("java Main");
        echo $output;
        unlink($filen . ".java");
        unlink("Main.class");
     } else {
          echo $output1;
     unlink($filen);
     }
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
set_time_limit(5);
    return shell_exec($cmd . " 2>&1");
}
?>