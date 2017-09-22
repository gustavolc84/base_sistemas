<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div id="bootstrap_alerts_demo"> 
    <div class = "alert alert-danger alert-dismissable">
       <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">
          &times;
       </button>
       <?= $message ?>
    </div>
</div>
