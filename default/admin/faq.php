<?php
use Helpers\Url;
$faqs = $data["faq"];
?>
<h3 class="text-center">Frequently asked questions (FAQ)</h3>
<table id="paginate">
<?php
foreach($faqs as $faq) {
    echo '
    <table class="table">
        <tbody>
            <tr class="blue">
                <td>'.$faq["category"]["title"].'</td>
                <td>'.$faq["category"]["desc"].'</td>
                <td><a href="'.Url::getUri("admin/deletefaqcategory/".$faq["category"]["id"]).'" class="btn btn-danger">Delete Category</a></td>
            </tr>';
            $i = 0;
            foreach($faq["questions"] as $question) {
                echo '  
                  <tr>
                      <td>'.$question->question.'</td>
                      <td>'.$question->answer.'</td>
                      <td><a href="'.Url::getUri("admin/deletefaq/".$question->id).'" class="btn btn-danger">Delete Article</a></td>
                  </tr>
                ';
                $i = $i + 1;
            }
    echo '</tbody>
    </table>';
}
?>
<div class="row">
    <div class="col-md-3 col-md-offset-6 webicon" style="line-height: 34px; padding-left: 40px;">
        <a data-toggle="modal" data-target="#Modal2" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add a Category</a><br><br>
    </div>
    <div class="col-md-3 webicon" style="line-height: 34px; padding-left: 40px;">
        <a data-toggle="modal" data-target="#Modal1" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add an Article</a><br><br>
    </div>
</div>
<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add a Category</h4>
            </div>
            <form action="addfaqcategory" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="headline">Name</label>
                            <input class="form-control" name="name" maxlength="250">
                            <label for="content">Description</label>
                            <textarea class="editor" id="editor2" name="desc"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add a Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add an Article</h4>
            </div>
            <form action="addfaq" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="category">Category</label>
                            <select name="category" class="form-control">
                                <?php
                                    foreach($faqs as $faq) {
                                        echo '<option value="'.$faq["category"]["id"].'">'.$faq["category"]["title"].'</option>';
                                    }
                                ?>
                            </select>
                            <label for="headline">Question</label>
                            <input class="form-control" name="headline" maxlength="250">
                            <label for="content">Content</label>
                            <textarea class="editor" id="editor" name="content"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add an Article</button>
                </div>
            </form>
        </div>
    </div>
</div>
