<?php
use Helpers\Url;
$news = $data["news"];
?>
    <h3 class="text-center">News</h3>
<?php
foreach($news as $news) {
    echo '
    <div class="box news">
        <h3 style="margin-top: 5px;">'.$news->headline.'</h3>
        '.$news->content.'<br>
        <span><label>Date of publication:</label> '.$news->date.'</span>
        <a href="'.Url::getUri("admin/deletenews/".$news->id).'" class="btn btn-danger">Delete News</a>
    </div>
    ';
}
?>
<div class="row">
    <div class="col-md-3 col-md-offset-9 webicon" style="line-height: 34px; padding-left: 40px;">
        <a data-toggle="modal" data-target="#Modal2" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add an Article</a><br><br>
    </div>
</div>
<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add an Article</h4>
            </div>
            <form action="addnews" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="headline">Headline</label>
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
