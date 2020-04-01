<?php include(__DIR__ . "/../partials/header.php"); ?>
<?php
if(!empty($params)) {
    $data = $params->getParams();
    $pagination = $data['pages'];
    unset($data['pages']);
    foreach($data as $item) { ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <a href="/product/<?= $item->id ?>"><img class="card-img-top" src="<?= $item->path ?>" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="/product/<?= $item->id ?>"><?= $item->title ?></a>
                    </h4>
                    <h5>$24.99</h5>
                    <p class="card-text"><?= mb_substr($item->description, 0,
                                                mb_strrpos(mb_substr($item->description, 0, 70), " ")) ?>...</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
            </div>
        </div>
<?php    }
} ?>
<div class="clearfix"></div>
<div class="col-md-12">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php for ( $i = 1; $i <= $pagination; ++$i) { ?>
            <li class="page-item"><a class="page-link" href="/index/<?= $i ?>"><?= $i ?></a></li>
            <?php } ?>
        </ul>
    </nav>
</div>
<?php include(__DIR__ . "/../partials/footer.php"); ?>