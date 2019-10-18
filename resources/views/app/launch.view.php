<?php
    // get link param
    $launch = isset($_GET['launch']) ? $_GET['launch'] : null;

?>

<form>

    <div class="border-top border-secondary rounded-bottom" 
        style="padding: 10px; background-color:white;">
        <h2>Entrada</h2>
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="inputDate">Data</label>
                    <input type="date" class="form-control" id="inputDate" placeholder="dd/mm/aaaa">
            </div>
            <div class="form-group col-md-6">
                <label for="inputCategory">Category</label>
                    <select id="inputCategory" class="form-control">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
            </div>

        </div>

        <div class="form-group">
            
            <label for="inputDescription">Description</label>
                <input type="text" class="form-control" id="inputDescription" 
                    placeholder="1234 Main St">

        </div>

        <div class="form-row">
    
            <!-- <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity">
            </div> -->

            <div class="form-group col-md-6">
                <label for="inputPayMethod">PayMethod</label>
                    <select id="inputPayMethod" class="form-control">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
            </div>

            <div class="form-group col-md-6">
                <label for="inputValue">Value</label>
                    <input type="number" class="form-control" id="inputValue">
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

        <button type="submit" class="btn btn-dark">Gravar</button>

    </div>

</form>