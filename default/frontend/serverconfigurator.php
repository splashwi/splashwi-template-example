<?php
$dedisrvs = new \Models\Dedicated_model();
$dedisrvs = $dedisrvs->getAvailableDedicatedServers();
?>
<section class="configuration">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <header>
                    Server Configuration
                </header>
                <section>
                    <form action="addservercart" method="post" id="serverselector">
                        <!-- Reihe 1 -->
                        <div class="row">
                            <div class="col-md-12">
                                <label for="plattform">Host System:</label>
                                <select name="plattform" class="form-control" id="plattform">
                                    <option value="">Select a plattform...</option>
                                    <?php
                                        foreach($dedisrvs as $server) {
                                            echo '<option value="'.$server["id"].'">'.$server["name"].' (+ '.$server["baseprice"].'€ / month)</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div id="srvoptions">
                            <div class="row">
                                <div class="col-md-12">
                                    <span id="plattform_text">Intel Xeon E3-1270</span>
                                    <label>Available Addons / Services:</label>
                                    <div id="addons"></div>
                                </div>
                            </div>

                            <!-- Reihe 2 -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="ram">RAM [Random Access Memory]:</label>
                                    <div class="input-group">
                                        <input name="ram" class="form-control" type="number" step="8192" value="8192" min="8192" max="131072" id="ram">
                                        <span class="input-group-addon" id="basic-addon2">MB</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="plattform">Uplink:</label>
                                    <select name="uplink" class="form-control" id="uplink" readonly>
                                        <option value="gbit">1 Gbit/s (+ 0€ / Monat)</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Reihe 3 -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-8" style="padding-left: 0;">
                                        <label for="festplatten">Harddisks:</label>
                                        <select name="hdd1" class="form-control" id="hdd1">
                                            <option value="1">2 TB SATA 7.2K upm (+ 10€ / Monat)</option>
                                            <option value="2">3 TB SATA 7.2K upm (+ 15€ / Monat)</option>
                                            <option value="4 TB SATA 7.2K upm">4 TB SATA 7.2K upm (+ 20€ / Monat)</option>
                                            <option value="600 GB SAS 15K upm - 6 GB/s">600 GB SAS 15K upm - 6 GB/s (+ 35€ / Monat)</option>
                                            <option value="128 GB SSD - 90K IOPS">128 GB SSD - 90K IOPS (+ 10€ / Monat)</option>
                                            <option value="256 GB SSD - 90K IOPS">256 GB SSD - 90K IOPS (+ 20€ / Monat)</option>
                                            <option value="512 GB SSD - 90K IOPS">512 GB SSD - 90K IOPS (+ 30€ / Monat)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <p>[Slot 1]</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-8" style="padding-left: 0;">
                                        <label>&nbsp</label>
                                        <select name="hdd2" class="form-control" id="hdd2">
                                            <option>No Harddisk</option>
                                            <option value="1">2 TB SATA 7.2K upm (+ 10€ / Monat)</option>
                                            <option value="2">3 TB SATA 7.2K upm (+ 15€ / Monat)</option>
                                            <option value="4 TB SATA 7.2K upm">4 TB SATA 7.2K upm (+ 20€ / Monat)</option>
                                            <option value="600 GB SAS 15K upm - 6 GB/s">600 GB SAS 15K upm - 6 GB/s (+ 35€ / Monat)</option>
                                            <option value="128 GB SSD - 90K IOPS">128 GB SSD - 90K IOPS (+ 10€ / Monat)</option>
                                            <option value="256 GB SSD - 90K IOPS">256 GB SSD - 90K IOPS (+ 20€ / Monat)</option>
                                            <option value="512 GB SSD - 90K IOPS">512 GB SSD - 90K IOPS (+ 30€ / Monat)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <p>[Slot 2]</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-8" style="padding-left: 0;">
                                        <label>&nbsp</label>
                                        <select name="hdd3" class="form-control" id="hdd3">
                                            <option>No Harddisk</option>
                                            <option value="2 TB SATA 7.2K upm">2 TB SATA 7.2K upm (+ 10€ / Monat)</option>
                                            <option value="3 TB SATA 7.2K upm">3 TB SATA 7.2K upm (+ 15€ / Monat)</option>
                                            <option value="4 TB SATA 7.2K upm">4 TB SATA 7.2K upm (+ 20€ / Monat)</option>
                                            <option value="600 GB SAS 15K upm - 6 GB/s">600 GB SAS 15K upm - 6 GB/s (+ 35€ / Monat)</option>
                                            <option value="128 GB SSD - 90K IOPS">128 GB SSD - 90K IOPS (+ 10€ / Monat)</option>
                                            <option value="256 GB SSD - 90K IOPS">256 GB SSD - 90K IOPS (+ 20€ / Monat)</option>
                                            <option value="512 GB SSD - 90K IOPS">512 GB SSD - 90K IOPS (+ 30€ / Monat)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <p>[Slot 3]</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-8" style="padding-left: 0;">
                                        <label>&nbsp</label>
                                        <select name="hdd4" class="form-control" id="hdd4">
                                            <option>No Harddisk</option>
                                            <option value="2 TB SATA 7.2K upm">2 TB SATA 7.2K upm (+ 10€ / Monat)</option>
                                            <option value="3 TB SATA 7.2K upm">3 TB SATA 7.2K upm (+ 15€ / Monat)</option>
                                            <option value="4 TB SATA 7.2K upm">4 TB SATA 7.2K upm (+ 20€ / Monat)</option>
                                            <option value="600 GB SAS 15K upm - 6 GB/s">600 GB SAS 15K upm - 6 GB/s (+ 35€ / Monat)</option>
                                            <option value="128 GB SSD - 90K IOPS">128 GB SSD - 90K IOPS (+ 10€ / Monat)</option>
                                            <option value="256 GB SSD - 90K IOPS">256 GB SSD - 90K IOPS (+ 20€ / Monat)</option>
                                            <option value="512 GB SSD - 90K IOPS">512 GB SSD - 90K IOPS (+ 30€ / Monat)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <p>[Slot 4]</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Reihe 4 -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="raid">Raid Controller:</label>
                                    <select name="raid" class="form-control" id="raid">
                                        <option value="sw">No Raid-Controller (+ 0€ / Monat)</option>
                                        <option value="hw">Hardware Raid-Controller (+ 30€ / Monat)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="setup">Setup Fees:</label>
                                    <select name="setup" class="form-control" readonly disabled>
                                        <option value="0">No Setup-Fees</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Reihe 5 -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="location">Location:</label>
                                    <select name="location" class="form-control" id="location">
                                        <option value="EU">Europa</option>
                                        <option value="US">USA</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="box" style="position: relative; bottom: -9px; right: -14px;">
                                        Total <h3 id="price">84€</h3>/Month
                                        <button type="submit" class="btn btn-light">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
                <footer>

                </footer>
            </div>
        </div>
    </div>
</section>