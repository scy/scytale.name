<?php

echo("<h1>Defined variables:</h1>\n<pre>\n");
var_dump(get_defined_vars());
echo("\n</pre>\n");
echo("<h1>PHP Configuration Options:</h1>\n<pre>\n");
var_dump(ini_get_all());
echo("\n</pre>\n");

?>
