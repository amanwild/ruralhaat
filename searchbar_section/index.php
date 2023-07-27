<?php


include "../db.php";

// echo "success";
if (!$connect) {
    // echo "failed";
    die("Connection Failed:" . mysqli_connect_error());
}

$select_category_query = "SELECT * FROM `category`"; //NOTE: here (`) is not equal to (')
try {
    $select_category_result = 0;
    if ($connect) {
        $select_category_result = mysqli_query($connect, $select_category_query);
        if ($select_category_result) {
            $num = mysqli_num_rows($select_category_result);
        }
    }
} catch (Exception $e) {
    $mess = $e->getMessage();
}
?>
<section class="search-section search-section-v6">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form enctype="multipart/form-data"  data-toggle="validator" role="search" class="search-form search-form-v2 form-inline" action="../search_ads/index.php" method="get">
                    <div class="form-v6-bg">
                        <div class="form-group clearfix">
                            <div class="inner-addon left-addon right-addon">
                                <i class="form-icon form-icon-size-small left-form-icon zmdi zmdi-sort-amount-desc"></i>
                                <i class="form-icon form-icon-size-small fas fa-sort"></i>
                                <select class="form-control form-control-lg" data-placeholder="Select Category.." name="category_id" id="ajaxSelectCat" value="">


                                    <option value="" selected>All Categories</option>

                                    <?php

                                    if ($num > 0 || $update_result || $insert_result) {
                                        $sno = 0;
                                        //Note : mysqli_fetch_assoc($result) it returns NULL when no data is persent to Select
                                        while ($row = mysqli_fetch_assoc($select_category_result)) {

                                            if (isset($_GET['category_id']) && $_GET['category_id'] == $row['category_id']) {
                                                // echo $_GET['category_id'];
                                    ?><option value="<?= $row['category_id'] ?>" selected> <?= $row['category_name'] ?> </option>
                                            <?php
                                            } else {
                                            ?><option value="<?= $row['category_id'] ?>"> <?= $row['category_name'] ?> </option>
                                    <?php
                                            }

                                            $sno += 1;
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div><!--form-group-->
                        <div class="form-group classieraAjaxInput">
                            <div class="input-group inner-addon left-addon">
                                <i class="form-icon form-icon-size-small left-form-icon zmdi zmdi-border-color"></i>
                                <?php
                                if (isset($_GET['listing_keyword']) && ($_GET['listing_keyword'] != "")) {
                                    $listing_keyword = $_GET['listing_keyword'];
                                ?> <input type="text" id="classieraSearchAJax" name="listing_keyword" class="form-control form-control-lg" value="<?= $listing_keyword ?>" data-error="Please Type some words..!">
                                    <div class="help-block with-errors"></div>
                                <?php
                                } else {
                                ?> <input type="text" id="classieraSearchAJax" name="listing_keyword" class="form-control form-control-lg" placeholder="Enter keyword..." data-error="Please Type some words..!">
                                    <div class="help-block with-errors"></div>
                                <?php
                                }
                                ?>
                                <!-- <input type="text" id="classieraSearchAJax" name="listing_keyword" class="form-control form-control-lg" placeholder="Enter keyword..." data-error="Please Type some words..!">
                                <div class="help-block with-errors"></div> -->
                                <span class="classieraSearchLoader"><img src="../wp-content/themes/classiera/images/loader.gif" alt="classiera loader"></span>
                                <div class="classieraAjaxResult"></div>
                            </div>
                        </div><!--form-group-->
                        <!--Searchlocation-->
                        <div class="form-group">
                            <div class="input-group inner-addon left-addon">
                                <i class="form-icon form-icon-size-small left-form-icon zmdi zmdi-pin-drop"></i>
                                <?php
                                if (isset($_GET['listing_city']) && ($_GET['listing_city'] != "")) {
                                    $listing_city = $_GET['listing_city'];
                                ?> <input type="text" id="getCity" name="listing_city" class="form-control form-control-lg" value="<?= $listing_city ?>">
                                    <a id="getLocation" href="#" class="form-icon form-icon-size-small" title="Click here to get your own location">
                                    <?php
                                } else {
                                    ?> <input type="text" id="getCity" name="listing_city" class="form-control form-control-lg" placeholder="Please type your City">
                                        <a id="getLocation" href="#" class="form-icon form-icon-size-small" title="Click here to get your own location">
                                        <?php
                                    }
                                        ?>
                                        <!-- <input type="text" id="getCity" name="listing_city" class="form-control form-control-lg" placeholder="Please type your location"> -->
                                        <a id="getLocation" href="#" class="form-icon form-icon-size-small" title="Click here to get your own location">
                                            <!-- <i class="fas fa-crosshairs"></i> -->
                                        </a>
                            </div>
                        </div><!--form-group-->
                        <!--Searchlocation-->
                        <input type="hidden" name="search_listing" class="search_listing" value="true">
                        <div class="form-group">
                            <button type="submit">
                                <font color="white">Search</font>
                            </button>
                        </div><!--form-group-->
                    </div><!--form-v6-bg-->

                </form>
            </div><!--col-md-12-->
        </div><!--row-->
    </div><!--container-->
</section><!--search-section-->