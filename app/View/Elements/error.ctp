<?php

if (is_string($message)) {
    echo "<div style='color: red;>$message</div>";

} elseif (is_array($message)) {
    $hasPassword = true;
    foreach($message as $field => $msg) {
        if ($field == 'password') {
            $hasPassword = true;
        }
        if ($field == 'repassword' && $hasPassword = true) {
            continue;
        }
        echo "<p style='color: red;'>" .  current($msg) . "</p>";
    }
}
?>