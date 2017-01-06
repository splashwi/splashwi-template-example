<div>
    <table class="table" id="paginate">
        <thead><tr class="blue"><td>Tickets</td></tr></thead>
        <tbody>
            <?php
            if(count($data["tickets"]) > 0) {
                foreach ($data["tickets"] as $oneticket) {
                    ?>
                    <tr><td>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="ticket/<?=$oneticket->id?>">
                                    <div class="jumbotron">
                                        <div class="row">
                                            <div class="col-md-2">
                                                REQ#<?= $oneticket->id ?>
                                            </div>
                                            <div class="col-md-2">
                                                <?= $oneticket->cat ?>
                                            </div>
                                            <div class="col-md-6">
                                                <?= substr($oneticket->question, 0, 100) ?>...
                                            </div>
                                            <div class="col-md-2">
                                                <?php if($oneticket->status == "closed") {
                                                    echo "<label class='text-danger text-uppercase'>".$oneticket->status."</label>";
                                                } elseif($oneticket->status == "open") {
                                                    echo "<label class='text-info text-uppercase'>".$oneticket->status."</label>";
                                                }  ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </td></tr>
                    <?php
                }
            } else {
                ?>
                <tr><td>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="jumbotron">
                                No tickets!
                            </div>
                        </div>
                    </div>
                </td></tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-12">
            <div class="pagination-nav">
                <div class="simple-pagination-first"></div>
                <div class="simple-pagination-previous"></div>
                <div class="simple-pagination-page-numbers"></div>
                <div class="simple-pagination-next"></div>
                <div class="simple-pagination-last"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-md-offset-9">
        <a href="ticket/open" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Open Ticket</a>
    </div>
</div>