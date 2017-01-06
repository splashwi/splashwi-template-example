<?php
/**
 * Panel Settings
 */
$pm = new \Models\Product_model();
$lt = $pm->getLegalTexts();
foreach ($lt as $text) {
    if($text->text_type == "ld") {
        $legaltext = $text->text;
    } elseif($text->text_type == "tos") {
        $tostext = $text->text;
    } elseif($text->text_type == "pp") {
        $privacytext = $text->text;
    } elseif($text->text_type == "wp") {
        $withdrawtext = $text->text;
    }
}
?>
<div class="row">
    <div class="col-md-12">
        <form action="changelegalsettings" method="post">
            <div class="box">
                <h3 style="margin:0;padding:0;">Legal Texts (HTML allowed!)</h3>
            </div>
            <div class="box">
                <div class="row">
                    <div class="col-md-6">
                        <label>Legal Disclosure</label>
                        <textarea class="form-control editor" id="editor" name="legaldisclosure"><?=$legaltext?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label>Terms of Use</label>
                        <textarea class="form-control editor" id="editor2" name="tos"><?=$tostext?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Privacy Policy</label>
                        <textarea class="form-control editor" id="editor3" name="privacyprivacy"><?=$privacytext?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label>Withdraw Policy</label>
                        <textarea class="form-control editor" id="editor4" name="withdrawprivacy"><?=$withdrawtext?></textarea>
                    </div>
                </div>
            </div>
            *Attention! This is for hosting-providers only!
            <button type="submit" class="btn btn-warning">Submit Changes</button>
        </form>
    </div>
</div>
