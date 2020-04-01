<?php include(__DIR__ . "/../partials/header.php"); ?>
<table class="table">
    <thead>
        <td>Id</td>
        <td>Product</td>
        <td>Name</td>
        <td>Email</td>
        <td>Comment</td>
        <td>Public</td>
        <td>Action</td>
    </thead>
<?php
if(!empty($params)) {
    $data = $params->getParams();
    foreach ($data as $item) { ?>
        <tr>
            <td><?= $item->id ?></td>
            <td><?= $item->title ?></td>
            <td><?= $item->name ?></td>
            <td><?= $item->email ?></td>
            <td><?= $item->comment ?></td>
            <td class="status-field"><?= $item->public ?></td>
            <td class="action">
                <div class="publish">
                    <span class="btn btn-info" data-id="<?= $item->id ?>" data-status="<?= $item->public ?>" >
                        <?php echo ($item->public) ? "UNPUBLISH" : "PUBLISH" ?>
                    </span>
                </div>

            </td>
        </tr>
   <?php }
}
?>
</table>

<script>
        $(".publish").on("click",  function () {
            var btn = $(this).find("span");
            var publicField = $(this).parent().prev();
            $.ajax({
                url: "/change-status/",
                data: {id: btn.data('id'), status: btn.data('status')},
                method: "POST",
                success: function(result){
                    var res = JSON.parse(result);
                    if(res.status) {
                        if(btn.data('status') == 1) {
                            btn.data('status', 0)
                            btn.get(0).innerText = "PUBLISH";
                            publicField.text("0")
                        } else {
                            btn.data('status', 1)
                            btn.get(0).innerText = "UNPUBLISH";
                            publicField.text("1")
                        }

                    }
                }
            });
        })

</script>

<?php include(__DIR__ . "/../partials/footer.php"); ?>