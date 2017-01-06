<?php
use Helpers\Url;
?>
<table class="table" id="paginate">
    <thead>
        <tr class="blue">
            <td style="width: 10%">
                ID
            </td>
            <td style="width: 45%">
                HDD
            </td>
            <td style="width: 15%">
                Price
            </td>
            <td style="width: 15%">
                Edit
            </td>
            <td style="width: 15%">
                Delete
            </td>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($data["hdds"] as $hdd) {
        ?>
        <tr>
            <td style="width: 10%">
                <?php echo $hdd->id; ?>
            </td>
            <td style="width: 45%">
                <?php echo $hdd->name; ?>
            </td>
            <td style="width: 15%">
                <?php echo $hdd->price; ?>€ / p.m.
            </td>
            <td style="width: 15%">
                <a class="btn btn-warning" href="<?=Url::getUri("admin/dedicated/hdds/edit/".$hdd->id)?>">Edit</a>
            </td>
            <td style="width: 15%">
                <a class="btn btn-danger" href="<?=Url::getUri("admin/dedicated/hdds/delete/".$hdd->id)?>">Delete</a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
<div class="row">
    <div class="col-md-3 col-md-offset-9 webicon" style="line-height: 34px; padding-left: 40px;">
        <a data-toggle="modal" data-target="#Modal2" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add a HDD</a><br><br>
    </div>
</div>
<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add a HDD</h4>
            </div>
            <form action="hdds/add" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="ip">HDD Name</label>
                            <input class="form-control" name="name">
                            <label for="username">Price</label>
                            <input class="form-control" name="price">
                            <label for="requires_raid">Requires Raid?</label>
                            <select class="form-control" name="requires_raid">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add this HDD</button>
                </div>
            </form>
        </div>
    </div>
</div>