<?php 
$text="this bad form";
echo "Len : ". strlen($text);
echo "<p> Replace : ". str_replace("bad","**",$text) . "</p>";
echo "<p> Capitalize : " . ucfirst($text) . "</p>";
echo "UpperCase : " . strtoupper($text);
?>