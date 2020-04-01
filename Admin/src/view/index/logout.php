<?php include(__DIR__ . "/../partials/header.php"); ?>
<?php
if(!empty($params)) {
    $data = $params->getParams();
    echo "<h2>" . $data['message'] . "</h2>";
}
?>
<?php include(__DIR__ . "/../partials/footer.php"); ?>