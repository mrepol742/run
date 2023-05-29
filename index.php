<?php
#
 #
 # Copyright (c) 2023 Melvin Jones Repol (mrepol742.github.io). All Rights Reserved.
 #
 # License under the Mrepol742 License, version 1.0 (the "License");
 # you may not use this file except in compliance with the License.
 # You may obtain a copy of the License at
 #
 #     https://github.com/mrepol742/Mrepol742-the-License
 #
 # Unless required by the applicable law or agreed in writing, software
 # distributed under the License is distributed on an "AS IS" BASIS,
 # WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 # See the License for the specific language governing permissions and
 # limitations under the License.
 #
 
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    exit("{\"error\":\"Invalid request method\"}");
}

$code = $_POST["Code"] ?? "";
$lang = $_POST["Lang"] ?? "";

if ($code == "") {
    exit("{\"error\":\"Code is undefined\"}");
}
if ($lang == "") {
    exit("{\"error\":\"Language is undefined.\"}");
}

switch ($lang) {
    case "php":
        $filen = getTimestamp() . ".php";
        write($filen, $code);
        $output = run("php " . $filen);
        echo $output;
        unlink($filen);
        break;
    case "742":
        $output = run($code);
        echo $output;
        break;
    case "c":
        $filen = getTimestamp() . ".c";
        write($filen, $code);
        $output1 = run("gcc " . $filen);
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
    case "c++":
    case "cpp":
    case "cplusplus":
        $filen = getTimestamp() . ".cpp";
        write($filen, $code);
        $output1 = run("g++ " . $filen);
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
        $filen = getTimestamp() . ".java";
        write($filen, $code);
        $output1 = run("javac " . $filen);
        if (file_exists("Main.class")) {
            $output = run("java Main");
            echo $output;
            unlink($filen);
            unlink("Main.class");
        } else {
            echo $output1;
            unlink($filen);
        }
        break;
    default:
        exit("{\"error\":\"Language is not supported.\"}");
        break;
}

function write($file, $content)
{
    ($myfile = fopen($file, "w")) or
        die("{\"error\":\"Unable to write file.\"}");
    fwrite($myfile, $content);
    fclose($myfile);
}

function getTimestamp()
{
    $timeofday = gettimeofday();
    $mili = sprintf("%d%d", $timeofday["sec"], $timeofday["usec"] / 1000);
    $a = floor($mili / 1000) + rand(0, 90000) + rand(0, 20000);
    return $a;
}

function run($cmd)
{
    set_time_limit(5);
    return shell_exec($cmd . " 2>&1");
}
?>
