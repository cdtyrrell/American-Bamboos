<?php
// used to automatically pull git updates
// this file is tethered to a webhook on the github repo

if ( $_POST['payload'] ) {
    shell_exec('cd ~/public_html && git pull');
}

?>