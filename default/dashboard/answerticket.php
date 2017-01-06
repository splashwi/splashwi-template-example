<form action="add" method="post">
    <input type="hidden" name="id" value="<?=$data['id']?>">
    <label for="content">Your answer:</label>
    <textarea class="form-control editor" id="editor" name="content"></textarea>
    <button type="submit" class="btn btn-success btn-fullwidth">Submit</button>
</form>