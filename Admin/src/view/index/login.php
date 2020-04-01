<?php include(__DIR__ . "/../partials/header.php"); ?>
<?php
if(!empty($params)) {
    $data = $params->getParams();
    if(!$data['status']) {
        echo "<h3>Forbidden</h3>";
    }
}
?>
<?php include(__DIR__ . "/../partials/footer.php"); ?>