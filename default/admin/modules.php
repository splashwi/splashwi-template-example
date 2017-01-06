<table class="table" id="paginate">
    <thead>
        <tr class="blue">
            <td>Module</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($data["modules"] as $module) {
            ?>
            <tr>
                <td><?=$module->module_name?></td>
                <td>
                <?php
                if($module->activated == 0) {
                    echo '<a href="modules/enable/'.$module->id.'" class="btn btn-success">Activate</a>';
                } else {
                    echo '<a href="modules/disable/'.$module->id.'" class="btn btn-danger">Deactivate</a>';
                }
                ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
