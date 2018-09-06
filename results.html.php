<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <nav class="navbar navbar-light bg-light navbar-expand-lg">
            <a class="navbar-brand">Device registry</a>
            <a class="nav-item btn btn-light" href=".">Device list</a>
            <a class="nav-item btn btn-light" href="?adddevice">Add a device</a>
            <a class="nav-item btn btn-light" href="?adduserorlocation">Add user/location</a>
            <a class="nav-item btn btn-light" href="?search">Search</a>
        </nav>
        <div id="devices-container">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th colspan="9">Devices:</th>
                    </tr>
                    <tr>
                        <form action="?" method="post">
                            <input type="hidden" name="sorting" /> <!-- POST this to activate sorting on reload -->
                            <input type="hidden" name="search" value="<?php $_POST["search"]; ?>" /> <!-- Store search and searchstring variables when sorting -->
                            <input type="hidden" name="searchstring" value="<?php if (!empty($_POST['searchstring'])) echo $_POST['searchstring']; ?>" />

                            <th><input class="edit-button" type="submit" name="devicename" value="Name" /></th>
                            <th><input class="edit-button" type="submit" name="brand" value="Brand" /></th>
                            <th><input class="edit-button" type="submit" name="model" value="Model" /></th>
                            <th><input class="edit-button" type="submit" name="serialnum" value="Serial#" /></th>
                            <th><input class="edit-button" type="submit" name="warrantyinfo" value="Warranty info" /></th>
                            <th><input class="edit-button" type="submit" name="username" value="Owner" /></th>
                            <th><input class="edit-button" type="submit" name="location" value="Location" /></th>
                            <th><input class="edit-button" type="submit" name="dateadded" value="Date added" /></th>
                            <p><th></th></p>
                        </form>
                    </tr>
                </thead>
                <?php foreach($result as $device): ?>
                    <form action="?editdevice" method="post">
                        <input type="hidden" name="id" value="<?php echo $device["id"] ?>">
                        <tr>
                            <th><?php echo htmlspecialchars($device["devicename"], ENT_QUOTES, "UTF-8"); ?></th>
                            <th><?php echo htmlspecialchars($device["brand"], ENT_QUOTES, "UTF-8"); ?></th>
                            <th><?php echo htmlspecialchars($device["model"], ENT_QUOTES, "UTF-8"); ?></th>
                            <th><?php echo htmlspecialchars($device["serialnum"], ENT_QUOTES, "UTF-8"); ?></th>
                            <th><?php echo htmlspecialchars($device["warrantyinfo"], ENT_QUOTES, "UTF-8"); ?></th>
                            <th><?php echo htmlspecialchars($device["username"], ENT_QUOTES, "UTF-8"); ?></th>
                            <th><?php echo htmlspecialchars($device["locationname"], ENT_QUOTES, "UTF-8"); ?></th>
                            <th><?php echo substr(htmlspecialchars($device["dateadded"], ENT_QUOTES, "UTF-8"), 0, 10); ?></th>
                            <th><input class="edit-button" type="submit" value="Edit" /></th>
                        </tr>
                    </form>
                <?php endforeach; ?>
            </table>
        </div>
    </body>
</html>