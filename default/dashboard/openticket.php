<?php
$user = new \Models\User_model();
$user = $user->get_profile(\Helpers\Session::get("username"))[0];

if(empty($user->firstname) || empty($user->lastname)) {
    $username = \Helpers\Session::get("username");
} else {
    $username = $user->firstname.' '.$user->lastname;
}
?>
<form action="add" method="post">
    <div class="row">
        <div class="col-md-3">
            <label>Date</label>
            <input class="form-control" value="<?=date("m.d.Y")?>" disabled readonly>
        </div>
        <div class="col-md-3">
            <label for="category">Category</label>
            <select name="category" class="form-control">
                <?php
                foreach($data['categories'] as $cat) {
                    echo "<option>".$cat->cat."</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-3">
            <label for="status">Status</label>
            <input class="form-control" value="Open" disabled readonly>
        </div>
        <div class="col-md-3">
            <label for="priority">Priority</label>
            <select name="priority" class="form-control">
                <option value="1">Low</option>
                <option value="2">Medium</option>
                <option value="3">High</option>
                <option value="4">Emergency</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="status">Name:</label>
            <input class="form-control" value="<?=$username?>" disabled readonly>
        </div>
        <div class="col-md-6">
            <label for="status">E-Mail</label>
            <input class="form-control" value="<?=$user->email?>" disabled readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label for="content">Your question:</label>
            <textarea class="form-control editor" id="editor" name="content"></textarea>
            <button type="submit" class="btn btn-success btn-fullwidth">Submit</button>
        </div>
    </div>
</form>