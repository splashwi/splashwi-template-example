<?php
$mailtemplates = new \Helpers\MailTemplates();
$mailtemplates = $mailtemplates->getAllTemplates();

$i = 0;
foreach($mailtemplates as $mailtemplate) {
?>
<a role="button" data-toggle="collapse" href="#c<?=$i?>" aria-expanded="false" aria-controls="c<?=$i?>E">
    <div class="box">
        <?= $mailtemplate->tmpname ?>
    </div>
</a>
<div class="collapse" id="c<?=$i?>">
    <div class="box">
        <form action="changemailtemplate" method="post">
            <input name="id" value="<?=$mailtemplate->id?>" type="hidden" style="visibility: hidden;">
            <div class="row">
                <div class="col-md-8">
                    <h3 style="margin-top: 0;">Content (HTML)</h3>
                    <textarea class="form-control big" name="content"><?=$mailtemplate->content?></textarea>
                    <h3 style="margin-top: 0;">Content (NO HTML)</h3>
                    <textarea class="form-control big" name="content_nohtml"><?=$mailtemplate->content_nohtml?></textarea>
                </div>
                <div class="col-md-4">
                    <h3 style="margin-top: 0;">CSS</h3>
                    <textarea class="form-control big" name="css"><?=$mailtemplate->css?></textarea>
                </div>
                <div class="col-md-4 col-md-offset-8">
                    <br><button type="submit" class="btn btn-success">Change Template</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
    $i = $i+1;
}
?>