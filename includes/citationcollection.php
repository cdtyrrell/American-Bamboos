<?php
if(!isset($collData) && isset($this->collArr)) $collData = $this->collArr;
?>
<?php echo ($collData['collectionname'])?$collData['collectionname']:"Ada Hayden Herbarium (ISC)"; ?>. Occurrence dataset (ID: <?php echo ($collData['recordid'])?$collData['recordid']:"175"; ?>) <?php echo $collData['dwcaurl']; ?> accessed via the <?php echo ($DEFAULT_TITLE) ? $DEFAULT_TITLE : "American Bamboos"; ?> Portal, <?php echo $SERVER_HOST . $CLIENT_ROOT; ?>, <?php echo date('Y-m-d'); ?>).