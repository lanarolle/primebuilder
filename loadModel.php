<?php

require "connection.php";

if (isset($_GET["b"])) {

    $brand_id = $_GET["b"];

    $model_rs = Database::search("SELECT * FROM `brand_has_modle` INNER JOIN `modle` ON brand_has_modle.modle_id = modle.id WHERE `brand_id` = '".$brand_id."'");
    $model_num = $model_rs -> num_rows;

    if ($model_num > 0) {

        ?>

            <option value="0">Select Model</option>

        <?php

        for ($x = 0; $x < $model_num; $x++) {

            $model_data = $model_rs -> fetch_assoc();

            ?>

            <option value="<?php echo $model_data["id"]; ?>"><?php echo $model_data["name"]; ?></option>

            <?php

        }

    }else {

        ?>
        
        <option value="0">Select Model</option>

        <?php

        $all_models = Database::search("SELECT * FROM `modle`");
        $all_num = $all_models -> num_rows;

        for ($y = 0; $y < $all_num; $y++) {
            $all_data = $all_models -> fetch_assoc();

            ?>
            
            <option value="<?php echo $all_data["id"]; ?>"><?php echo $all_data["name"]; ?></option>

            <?php

        }

    }

}

?>