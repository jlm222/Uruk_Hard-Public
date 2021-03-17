<!-- Pager to be implemented in the future, for the moment not needed -->

<ul class="pager">
<?php
    for ($i=1; $i <= $count; $i++) { 
        if ($i == $page) {
            echo "<li class='pager__item'><a class='active_link' href='archive.php?page={$i}'>{$i}</a></li>";
        
        } else {
            echo "<li class='pager__item'><a class='' href='archive.php?page={$i}'>{$i}</a></li>";
        }
    }
?>
</ul>