<!-- HTML used to create the Card2 view -->
<script>
    var deviceList=<?php echo json_encode($devices); ?>
</script>

<div class="row">
    <div class="col12 m6">
        <div class="card z-depth-1-half" id="card2">
            <div class="card-content hoverable">
                <span class="card-title">Device Brands</span>

                <select id="dSelection" name="deviceName" style="display: block">
                    <option>Select a Device</option>

                    <?php foreach($devices as $device): ?>

                    <option value='<?= $device["deviceBrand"] ?>' ><?= $device['deviceBrand'] ?></option>

                    <?php endforeach; ?>

                </select>
                <div class="card-action">
                    <span id="deviceBox"></span>
                </div>
            </div>

        </div>
    </div>
</div>

