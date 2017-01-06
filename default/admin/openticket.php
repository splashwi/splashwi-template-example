<form action="add" method="post">
    <label for="category">Category</label>
    <select name="category" name="cat" class="form-control">
        <?php
        foreach($data['categories'] as $cat) {
            echo "<option>".$cat->cat."</option>";
        }
        ?>
    </select>
    <label for="content">Your question:</label>
    <textarea class="form-control editor" id="editor" name="content"></textarea>
    <button type="submit" class="btn btn-success btn-fullwidth">Submit</button>
</form>