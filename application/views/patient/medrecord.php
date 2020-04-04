<link rel="stylesheet" href="<?php echo css_url("patient/medrecord.css") ?>">
<div class="container main-container">
    <h1 class="main-h1"><a href="../" class="main-h1-a">Páciens</a> </h1>
    <hr class="main-hr">
    <div class="main-div">
        <h1 class="name"><?php echo $data["user_data"][0]["name"] ?></h1> <br>
        <hr class="name-hr">
        <div class="left">
            <p class="born-date"><strong>Születés:</strong> <?php echo $data["user_data"][0]["DOB"] ?></p>
            <p class="taj"><strong>TAJ szám: </strong> <?php echo $data["user_data"][0]["tajszam"] ?></p>
            <p class="mothers-name"><strong>Anyja leánykori neve:</strong> <?php echo $data["user_data"][0]["mother_name"] ?></p>
        </div>
        <div class="right">
            <p class="id"><strong>ID:</strong> <?php echo $data["user_data"][0]["id"] ?> </p>
            <p class="karszalagszam"><strong>Karszalagszám:</strong> <?php echo $data["user_data"][0]["karszalag_id"] ?></p>
            <!-- <p class="class"><strong>Osztály:</strong> BARNA??????,</p> -->
            <button class="btn btn-danger" style="font-size: 2vmin; margin-top: 1vmin; border-radius:5px;">Send For COVID-19 Test</button>
        </div>
        <div class="scrollable-div">
            <h1 class="scrollable-h1">Kórlap:</h1>
            <p class="scrollable-p">
                <?php
                if (isset($data["active_case"]["anamnezis"])) {
                ?>
                    <strong>Anamnézis :</strong> 
                    <div>
                        <p class="scrollable-inner-p"><?php
                                                        echo $data["active_case"]["anamnezis"]; ?></p>
                    </div><?php
                        }
                            ?>
                <br>
                <?php
                if (isset($data["active_case"]["epikrizis"])) {
                ?>
                    <p class="scrollable-p"><strong>Epikrízis :</strong></p> 
                    <div>
                        <p class="scrollable-inner-p"><?php
                                                        echo $data["active_case"]["epikrizis"]; ?></p>
                    </div><?php
                        }
                            ?>
                <br>
                <?php
                if (isset($data["active_case"]["dekurzus"])) {
                ?>
                    <p class="scrollable-p"><strong>Dekorzus :</strong></p>
                    <div>
                        <p class="scrollable-inner-p"><?php
                                                        echo $data["active_case"]["dekurzus"]; ?></p>
                    </div><?php
                        }
                            ?>

            </p>
        </div>
    </div>
</div>