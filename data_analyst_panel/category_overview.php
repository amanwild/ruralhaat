
<section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4">

                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <div class="card-body text-center">
                                <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">

                                    <label for="file-upload" class="custom-file-upload p-4">

                                        <img src="../wp-content/uploads/2018/11/<?= $category_image ?>" alt="avatar"class="rounded-circle img-fluid" style="width: 150px;object-fit:cover;height:150px">
                                        <!-- <img src="../wp-content/uploads/2018/11/05-370x250.jpg<?php 
                                        // echo $_SESSION['user_img_url']; ?>" alt="avatar"class="rounded-circle img-fluid" style="width: 150px;object-fit:cover;height:150px"> -->

                                    </label>
                                    <div class="row justify-content-center text-align-center mt-2">
                                        <div class="col-md-6 mb-3 my-auto ">
                                            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
                                                <input type="hidden" class="set_profile_image" id="set_profile_image" name="set_profile_image">
                                                <script>
                                                    set_profile_image.value = true;
                                                    submit_image.value = true;
                                                </script>
                                                <input class=" m-3 mx-auto" type="file" id="file-upload" style=" display: none;" name="my_image">



                                                <input type="submit" name="submit_image" class="btn btn-primary ms-1" value="Update image">

                                                <div class=" m-1">

                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-md-6 mb-3 my-auto">

                                            <?php
                                            if ($_SESSION['user_img_url'] !== "dummy_profile_img.webp") {

                                                echo '<form action=" ' . $_SERVER["REQUEST_URI"] . '" method="post">
                                                <input type="hidden" class="set_profile_image" id="set_profile_image" name="set_profile_image">
                                                <script>
                                                    set_profile_image.value = true;
                                                    delete_image.value = true;
                                                </script>
                                                <input type="submit" name="delete_image" class="btn btn-primary ms-1" value="Delete image">

                                                <div class=" m-1">

                                                </div>
                                            </form>';
                                            }
                                            ?>



                                        </div>
                                    </div>
                            </div>





                        </div>
                    </div>
                </div>


                <div class="col-lg-8">
                    <?php
                    include "./category_information_card.php" ?>
                </div>
            </div>


        </div>
        </div>
    </section>