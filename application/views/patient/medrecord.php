<link rel="stylesheet" href="<?php echo css_url("patient/medrecord.css") ?>">
<div class="container main-container">
    <h1 class="main-h1"><a href="../" class="main-h1-a">Páciens</a> </h1>
    <hr class="main-hr">
    <div class="main-div">
        <h1 class="name"><?php echo $data["user_data"][0]["name"]?></h1> <br>
        <hr class="name-hr">
        <div class="left">
            <p class="born-date"><strong>Születés:</strong> <?php echo $data["user_data"][0]["DOB"]?></p>
            <p class="taj"><strong>TAJ szám: </strong> <?php echo $data["user_data"][0]["tajszam"]?></p>
            <p class="mothers-name"><strong>Anyja leánykori neve:</strong> <?php echo $data["user_data"][0]["mother_name"]?></p>
        </div>
        <div class="right">
            <p class="id"><strong>ID:</strong> <?php echo $data["user_data"][0]["id"]?> </p>
            <p class="karszalagszam"><strong>Karszalagszám:</strong> <?php echo $data["user_data"][0]["karszalag_id"]?></p>
            <p class="class"><strong>Osztály:</strong> BARNA??????,</p>
        </div>
        <div class="scrollable-div">
            Kórlap:
            <p class="scrollable-p">
                <?php 
                if(isset($data["active_case"]["anamnezis"])){
                    ?>
                    Anamnézis : 
                    <?php
                    echo $data["active_case"]["anamnezis"];
                }
                ?>
                <br>
                <?php 
                if(isset($data["active_case"]["epikrizis"])){
                    ?>
                    Epikrízis : 
                    <?php
                    echo $data["active_case"]["epikrizis"];
                }
                ?>
                <br>
                <?php 
                if(isset($data["active_case"]["dekurzus"])){
                    ?>
                    Dekurzus : 
                    <?php
                    echo $data["active_case"]["dekurzus"];
                }
                ?>

            </p>
        </div>
    </div>
</div>