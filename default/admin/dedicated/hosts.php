<?php
use Helpers\Url;
$dm = new \Models\Dedicated_model();
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
                Base Price
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
    foreach($data["hosts"] as $host) {
        ?>
        <tr>
            <td style="width: 10%">
                <?php echo $host->id; ?>
            </td>
            <td style="width: 45%">
                <?php echo $host->name; ?>
            </td>
            <td style="width: 15%">
                <?php echo $host->price; ?>€ / p.m.
            </td>
            <td style="width: 15%">
                <a class="btn btn-warning" href="<?=Url::getUri("admin/dedicated/hosts/edit/".$host->id)?>">Edit</a>
            </td>
            <td style="width: 15%">
                <a class="btn btn-danger" href="<?=Url::getUri("admin/dedicated/hosts/delete/".$host->id)?>">Delete</a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
<div class="row">
    <div class="col-md-3 col-md-offset-9 webicon" style="line-height: 34px; padding-left: 40px;">
        <a data-toggle="modal" data-target="#Modal2" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add a Hostsystem</a><br><br>
    </div>
</div>
<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add a Hostsystem</h4>
            </div>
            <form action="hosts/add" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="ip">Host Name</label>
                            <input class="form-control" name="name">
                            <label for="username">Base Price [without addons]</label>
                            <input class="form-control" name="price">
                            <br>
                            <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Configure Server RAM
                            </a>
                            <div class="collapse" id="collapseExample">
                                <label for="modules">Maximum RAM</label>
                                <input class="form-control" name="maxram" value="1024" type="number" step="512" min="512">
                                <label for="modules">RAM Module Size</label>
                                <input class="form-control" name="ramstep" value="1024" type="number" step="512" min="512">
                                <label for="modules">RAM Module Price</label>
                                <input class="form-control" name="ramprice" value="10.00" type="text">
                            </div>
                            <br><br>
                            <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                                Configure RAID Controller
                            </a>
                            <div class="collapse" id="collapseExample2">
                                <label for="raid_available">Raid Controller Available?</label>
                                <select class="form-control" name="raid_available">
                                    <option value="false">No</option>
                                    <option value="true">Yes</option>
                                </select>
                                <label for="modules">Raid-Controller Name</label>
                                <input class="form-control" name="raid_name" placeholder="PowerRaid 1014">
                                <label for="modules">Price</label>
                                <input class="form-control" name="raid_price" value="25.00">
                            </div>
                            <br><br>
                            <label for="modules">Available Harddrives</label>
                            <fieldset>
                                <?php
                                $hdds = $dm->getHDDs();
                                foreach($hdds as $hdd) {
                                    ?>
                                    <label>
                                        <input type="checkbox" name="hdd<?=$hdd->id?>" value="<?=$hdd->id?>">
                                        <?=$hdd->name?>
                                    </label><br>
                                    <?php
                                }
                                ?>
                            </fieldset>
                            <label for="modules">Available Locations</label>
                            <fieldset>
                                <?php
                                $locations = $dm->getLocations();
                                foreach($locations as $location) {
                                    ?>
                                    <label>
                                        <input type="checkbox" name="location<?=$location->id?>" value="<?=$location->id?>">
                                        <?=$location->name?> [<?=$location->country_code?>]
                                    </label><br>
                                    <?php
                                }
                                ?>
                            </fieldset>
                            <label for="modules">Addon Modules</label>
                            <fieldset>
                            <?php
                            $addons = $dm->sliceAddonArr($dm->getAddons());
                            foreach($addons as $addon) {
                                ?>
                                <label>
                                    <input type="checkbox" name="addon<?=$addon->id?>" value="<?=$addon->id?>">
                                    <?=$addon->name?>
                                </label><br>
                                <?php
                            }
                            ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-fullwidth"><i class="fa fa-plus-circle"></i><br>Add this Hostsystem</button>
                </div>
            </form>
        </div>
    </div>
</div>