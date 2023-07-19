<form action="" method="post">
    <input type="hidden" class="set_profile" id="set_profile" name="set_profile">
    <script>
        set_profile.value = true;
    </script>
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Category</p>
                </div>
                <div class="col-sm-9">
                    <input type="text" value="<?= $category_name ?>" name="category_name">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Sub Category</p>
                </div>
                <div class="col-sm-9">
                    <input type="test" value="<?= $category_name ?>" name="category_subcategory">
                </div>



            </div>
      
        </div>
    </div>
    <button type="submit" class="btn btn-primary ms-1">Save Profile </button>
</form>
