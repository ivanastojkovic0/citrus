<?php include(__DIR__ . "/../partials/header.php"); ?>
<?php
if(!empty($params)) {
    $data = $params->getParams();
    if($data['status']) {
        echo "<h2>You have successfully added a comment!</h2>";
    } else {
        echo "<h2>Error occurred while adding a comment. Please try again later!</h2>";
    }

} ?>
<?php include(__DIR__ . "/../partials/footer.php"); ?>