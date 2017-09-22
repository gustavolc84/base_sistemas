<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div id="bootstrap_alerts_demo"> 
    <div class = "alert alert-info alert-dismissable">
       <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">
          &times;
       </button>
       <?= $message ?>
    </div>
</div>
