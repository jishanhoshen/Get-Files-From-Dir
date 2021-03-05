<?php
function directory($dirName, $neederFile = '', &$results = array()) {
    $files = scandir($dirName);

    foreach($files as $key => $value){
        $path = $value; 

        if(!is_dir($path)) {
            if(empty($filter) || preg_match($filter, $path)) $results[] = $path;
        } elseif($value != "." && $value != "..") {
            directory($value, $filter, $results);
        }
    }

    return $results;
}

$dir = "target_dir";
echo "<p><strong>Directory Name : </strong>".$dir."</p>";
echo "<p><strong>File List in array</strong></p>";

echo "<pre>";
print_r(directory($dir, '/\.css$/'));
echo "</pre>";