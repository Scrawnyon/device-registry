<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <nav class="navbar navbar-light bg-light navbar-expand-lg">
            <a class="navbar-brand">Navbar</a>
            <a class="nav-item btn btn-light" href="?adddevice">Add a device</a>
            <a class="nav-item btn btn-light" href=".">Device list</a>
        </nav>
        <div id="devices-container">
            <table class="table table-striped table-sm">
                <!--<thead><tr><th colspan="5">Devices:</th></tr></thead>-->
                <thead>
                    <tr>
                        <p><th>devicename</th></p>
                        <p><th>brand</th></p>
                        <p><th>model</th></p>
                        <p><th>serialnum</th></p>
                        <p><th>warranty</th></p>
                        <p><th>dateadded</th></p>
                    </tr>
                </thead>
                <?php foreach($result as $device): ?>
                    <form action="?editdevice" method="post">
                        <input type="hidden" name="id" value="<?php echo $device["id"] ?>">
                        <tr>
                            <!--<th><?php echo htmlspecialchars($device["id"], ENT_QUOTES, "UTF-8"); ?></th>-->
                            <th><?php echo htmlspecialchars($device["devicename"], ENT_QUOTES, "UTF-8"); ?></th>
                            <th><?php echo htmlspecialchars($device["brand"], ENT_QUOTES, "UTF-8"); ?></th>
                            <th><?php echo htmlspecialchars($device["model"], ENT_QUOTES, "UTF-8"); ?></th>
                            <th><?php echo htmlspecialchars($device["serialnum"], ENT_QUOTES, "UTF-8"); ?></th>
                            <th><?php echo htmlspecialchars($device["warrantyinfo"], ENT_QUOTES, "UTF-8"); ?></th>
                            <th><?php echo htmlspecialchars($device["dateadded"], ENT_QUOTES, "UTF-8"); ?></th>
                            <th><input class="edit-button" type="submit" value="Edit" /></th>
                        </tr>
                    </form>
                <?php endforeach; ?>
            </table>
        </div>
    </body>
</html>