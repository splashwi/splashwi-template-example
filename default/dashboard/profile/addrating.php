<form action="submitrating" method="post">
    <div class="row">
        <div class="col-md-12">
            <div class="row text-center bigstar">
                <div class="col-md-offset-1 col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
            </div>
            <label>Overall Satisfaction:</label>
            <input name="score" type="range" min="0" max="5" value="2.5" step="0.1"/><br><br><br>
            <div class="row text-center bigstar">
                <div class="col-md-offset-1 col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
            </div>
            <label>Quality of the Service:</label>
            <input name="score_quality" type="range" min="0" max="5" value="2.5" step="0.1"/><br>
            <div class="row text-center bigstar">
                <div class="col-md-offset-1 col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
            </div>
            <label>Usability and Simplicity of the Interface:</label>
            <input name="score_usability" type="range" min="0" max="5" value="2.5" step="0.1"/><br>
            <div class="row text-center bigstar">
                <div class="col-md-offset-1 col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
            </div>
            <label>Perfomance of the Products:</label>
            <input name="score_performance" type="range" min="0" max="5" value="2.5" step="0.1"/><br>
            <div class="row text-center bigstar">
                <div class="col-md-offset-1 col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
            </div>
            <label>Implementation of the Features:</label>
            <input name="score_implementation" type="range" min="0" max="5" value="2.5" step="0.1"/><br>
            <div class="row text-center bigstar">
                <div class="col-md-offset-1 col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
                <div class="col-md-2">
                    <i class="fa fa-star"></i>
                </div>
            </div>
            <label>Support:</label>
            <input name="score_support" type="range" min="0" max="5" value="2.5" step="0.1"/><br><br>
            <label>Your Comment:</label>
            <textarea class="form-control" name="user_comment" maxlength="200"></textarea><br>
            <button type="submit" class="btn btn-success">Submit Review</button>
        </div>
    </div>
</form>