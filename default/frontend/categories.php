<?php
$m = new \Models\Product_model();
$cats = $m->getCategories();
?>
<section class="categories">
    <h1 class="text-center">Categories</h1>
    <div class="container">
        <?php
        foreach ($cats as $cat) {
            echo
            '<div class="col-md-4">
                <a href="category/'.$cat->id.'">
                    <div class="well">
                        <h2>
                            '.$cat->name.'
                        </h2>
                        <p>
                            '.$m->countProducts($cat->id).' Products
                        </p>
                    </div>
                </a>
            </div>';
        }
        ?>
        <div class="col-md-4">
            <a href="serverconfigurator">
                <div class="well">
                    <h2>
                        Serverconfigurator
                    </h2>
                    <p>
                        The dedicated Server for your needs!
                    </p>
                </div>
            </a>
        </div>
    </div>
</section>
