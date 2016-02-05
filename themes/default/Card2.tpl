<!-- HTML used to create the Card2 view -->
                        <script>
                            var deviceList =;
                            <
                            ? php echo;
                            json_encode($devices);
                            ?
                            >
                        </script>
                        <select id="dSelection" name="deviceName" style="display: block">
                            <option>Select a Device</option>

                            <?php foreach($devices as $device): ?>

                            <option value='<?= $device["deviceBrand"] ?>' ><?= $device['deviceBrand'] ?></option>

                            <?php endforeach; ?>

                        </select>
                        <p id="deviceBox"></p>
