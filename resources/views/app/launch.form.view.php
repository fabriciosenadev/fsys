<?php
    // get link param
    $launch = isset($_GET['launch']) ? $_GET['launch'] : null;
    $currentPage = explode("/", $_SERVER['REQUEST_URI']);
    $formTitle = in_array("cash_in.php", $currentPage) ? 'Entrada' : 'Saída';


?>

    <!-- <hr> -->

    <!-- inicio  conteudo do site-->
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm px-1">
                <?php include '../resources/template/app/side-menu.php';?>
            </div>

            <div class="col-md-6" id="main">
                <div class="row justify-content-center" style="margin-top:50px;">


                    <div class="border-top border-secondary rounded-bottom" 
                        style="width:500px;padding: 10px; background-color:white;">

                        <form method="post" action="<?php $_SERVER['PHP_SELF']?>">
                            <h2><?php echo $formTitle;?></h2>
                            <div class="error">
                                <?php 
                                if ($_SESSION['errors']) {
                                    echo $_SESSION['errors'];
                                    }
                                ?>
                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="inputDate">Data</label>
                                        <input type="date" class="form-control <?php echo $class_date; ?>" id="inputDate"name="date">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>    
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputCategory">Category</label>
                                        <select id="inputCategory" class="form-control is-invalid" name="category">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option value="1">1</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                </div>

                            </div>

                            <div class="form-group">
                                
                                <label for="inputDescription">Description</label>
                                    <input type="text" class="form-control" id="inputDescription" 
                                        placeholder="1234 Main St" name="description">

                            </div>

                            <div class="form-row">
                        
                                <!-- <div class="form-group col-md-6">
                                    <label for="inputCity">City</label>
                                        <input type="text" class="form-control" id="inputCity">
                                </div> -->

                                <div class="form-group col-md-6">
                                    <label for="inputPayMethod">PayMethod</label>
                                        <select id="inputPayMethod" class="form-control" name="payMethod">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                            <option value="2">2</option>
                                        </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputValue">Value</label>
                                        <input type="number" class="form-control" id="inputValue" name="value" step="0.01">
                                </div>
                        
                                <!-- <div class="form-group col-md-4">
                                    <label for="inputState">State</label>
                                        <select id="inputState" class="form-control">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                        </select>
                                </div>
                        
                                <div class="form-group col-md-2">
                                    <label for="inputZip">Zip</label>
                                        <input type="text" class="form-control" id="inputZip">
                                </div> -->

                            </div>

                            <!-- <div class="form-group">

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Check me out
                                        </label>
                                </div>

                            </div> -->

                            <button type="submit" class="btn btn-dark" name="btnSave">Gravar</button>


                        </form>
                    </div>


                </div>
                <!-- <h1>Main Area</h1>
                <p>Sriracha biodiesel taxidermy organic post-ironic, Intelligentsia salvia mustache 90's code editing brunch. Butcher polaroid VHS art party, hashtag Brooklyn deep v PBR narwhal sustainable mixtape swag wolf squid tote bag. Tote bag cronut semiotics,
                    raw denim deep v taxidermy messenger bag. Tofu YOLO Etsy, direct trade ethical Odd Future jean shorts paleo. Forage Shoreditch tousled aesthetic irony, street art organic Bushwick artisan cliche semiotics ugh synth chillwave meditation.
                    Shabby chic lomo plaid vinyl chambray Vice. Vice sustainable cardigan, Williamsburg master cleanse hella DIY 90's blog.</p>

                <p>Ethical Kickstarter PBR asymmetrical lo-fi. Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug. Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg slow-carb
                    readymade disrupt deep v. Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever. Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade. Wayfarers codeply PBR selfies. Banh mi McSweeney's Shoreditch selfies,
                    forage fingerstache food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.</p>
                    
                <p>Sriracha biodiesel taxidermy organic post-ironic, Intelligentsia salvia mustache 90's code editing brunch. Butcher polaroid VHS art party, hashtag Brooklyn deep v PBR narwhal sustainable mixtape swag wolf squid tote bag. Tote bag cronut semiotics,
                    raw denim deep v taxidermy messenger bag. Tofu YOLO Etsy, direct trade ethical Odd Future jean shorts paleo. Forage Shoreditch tousled aesthetic irony, street art organic Bushwick artisan cliche semiotics ugh synth chillwave meditation.
                    Shabby chic lomo plaid vinyl chambray Vice. Vice sustainable cardigan, Williamsburg master cleanse hella DIY 90's blog.</p>
                     -->
                <!-- <p>Sriracha biodiesel taxidermy organic post-ironic, Intelligentsia salvia mustache 90's code editing brunch. Butcher polaroid VHS art party, hashtag Brooklyn deep v PBR narwhal sustainable mixtape swag wolf squid tote bag. Tote bag cronut semiotics,
                    raw denim deep v taxidermy messenger bag. Tofu YOLO Etsy, direct trade ethical Odd Future jean shorts paleo. Forage Shoreditch tousled aesthetic irony, street art organic Bushwick artisan cliche semiotics ugh synth chillwave meditation.
                    Shabby chic lomo plaid vinyl chambray Vice. Vice sustainable cardigan, Williamsburg master cleanse hella DIY 90's blog.</p> -->
            </div>

            <div class="col-sm-3"></div>

        </div>
    </div>

    <!-- fim conteúdo do site -->


    <!-- fim container -->



