<?php include(__DIR__ . "/../partials/header.php"); ?>
<?php
if(!empty($params)) {
    $data = $params->getParams();
    if (!empty($data['data'])) {
        $item = $data['data'][0];
        ?>
        <div class="col-lg-6">
            <div class="card h-100">
                <a href="/product/<?= $item->id ?>"><img class="card-img-top" src="<?= $item->path ?>" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#"><?= $item->title ?></a>
                    </h4>
                    <h5>$24.99</h5>
                    <p class="card-text"><?= $item->description ?></p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="comments">
                <?php if (count($data['comments']) > 0) { ?>
                    <h3>Comments: </h3>
                    <?php foreach ($data['comments'] as $comment) { ?>
                        <div>
                            <p><?= $comment->name ?></p>
                            <p><?= $comment->email ?></p>
                            <p><?= date("d.m.Y. H:i:s", strtotime($comment->date_created)) ?></p>
                            <p><?= $comment->comment ?></p>
                        </div>
                        <hr>
                    <?php }
                } else { ?>
                    <h3>There are no comments yet!</h3>
                    <hr>
                <?php } ?>
            </div>
            <form action="/addcomment/<?= $item->id; ?>" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" required name="email" class="form-control" id="exampleInputEmail1"
                           aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Name">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="comment"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <?php
    } else { ?>
        <h3>Product not found.</h3>
   <?php }
} ?>
<?php include(__DIR__ . "/../partials/footer.php"); ?>