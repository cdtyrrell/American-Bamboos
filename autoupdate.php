<?php
// used to automatically pull git updates

if ( $_POST['payload'] ) {
    shell_exec('cd ~/public_html && git pull');
}

?>