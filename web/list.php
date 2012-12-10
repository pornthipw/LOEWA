<?php
if (isset($_GET['delete'])) {
	if (file_exists("data/".$_GET['delete'].".json")) {
		unlink("data/".$_GET['delete'].".json");
	}
}

if ($handle = opendir('data')) {
    echo '<br>';
    echo '<table>';

    /* Das ist der korrekte Weg, ein Verzeichnis zu durchlaufen. */
    while (false !== ($file = readdir($handle))) {
    	if ($file==".." || $file=="." || $file==".gitignore")
    		continue;

    	echo '<tr>';
    	echo '<td><div class="btn-group">
	     		<a class="btn" title="Show" href="?json='.str_replace(".json", "", $file).'"><i class="icon-list-alt"></i></a>
	    		<a class="btn" title="Remove" href="javascript: if(confirm(\'Wirklich löschen?\')==true) {window.location.href=\'?id=1&delete='.str_replace(".json", "", $file).'\';}"><i class="icon-remove"></i></a>
	    	</div></td>';

        echo '<td style="padding-left:10px; font-weight:bold">'.str_replace(".json", "", $file).'</td>';
        echo '</tr>';
    }

    closedir($handle);
    echo '</table>';
}
?>