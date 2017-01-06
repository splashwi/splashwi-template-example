<?php
$faqs = $data["faq"];
?>
<h3 class="text-center">Frequently asked questions (FAQ)</h3>
<?php
if(count($faqs) > 0) {
    foreach ($faqs as $faq) {
        echo '
        <div class="box">
            ' . $faq["category"]["title"] . '<br>
            <span>' . $faq["category"]["desc"] . '</span>
        </div>
        ';
        $i = 0;
        if(count($faq["questions"]) > 0) {
            foreach ($faq["questions"] as $question) {
                echo '
                <a class="faq" role="button" data-toggle="collapse" href="#' . $faq["category"]["id"] . 'c' . $i . '" aria-expanded="false" aria-controls="' . $faq["category"]["id"] . 'c' . $i . '">
                  <div class="box">
                      <div class="row">
                        <div class="col-md-12">
                            ' . $question->question . '
                        </div>
                    </div>
                  </div>
                </a>
                <div class="collapse" id="' . $faq["category"]["id"] . 'c' . $i . '">
                  <div class="box">
                    ' . $question->answer . '
                  </div>
                </div>
                ';
                $i = $i + 1;
            }
        }
    }
}
?>