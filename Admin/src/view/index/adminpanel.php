<?php include(__DIR__ . "/../partials/header.php"); ?>
<?php
if(!empty($params)) {
    $data = $params->getParams();
    if(empty($data['status'])) { ?>
        <form method="post" action="/login/">
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" required class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" required name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    <?php } else {
        //include(__DIR__ . "/../partials/panel.php");
    }?>
<?php }
?>
<?php include(__DIR__ . "/../partials/footer.php"); ?>