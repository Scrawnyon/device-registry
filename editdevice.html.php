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
        <div  id="editdeviceinfo">
            <table class="table table-striped">
                <thead class="thead" align="center"><tr><th colspan="2">Edit device:</th></tr></thead>
                <form action="?" method="post">
                    <input type="hidden" name="id" value="<?php echo $device["id"] ?>"> <!-- Used to identify whic device we're editing -->
                    <input type="hidden" name="editdevice"><!-- POST this to indicate we're returnign from the edit device menu -->

                    <tr><th>Device name: </th><th><input id="devicename" type="text" name="devicename" value="<?php echo htmlspecialchars($device["devicename"], ENT_QUOTES, "UTF-8"); ?>" /></th></tr>
                    <tr><th>Device brand: </th><th><input type="text" name="devicebrand" value="<?php echo htmlspecialchars($device["brand"], ENT_QUOTES, "UTF-8"); ?>" /></th></tr>
                    <tr><th>Device model: </th><th><input type="text" name="devicemodel" value="<?php echo htmlspecialchars($device["model"], ENT_QUOTES, "UTF-8"); ?>" /></th></tr>
                    <tr><th>Device serialnum: </th><th><input type="text" name="deviceserialnum" value="<?php echo htmlspecialchars($device["serialnum"], ENT_QUOTES, "UTF-8"); ?>" /></th></tr>
                    <tr><th>Device warrantyinfo: </th><th><input type="textfield" name="devicewarrantyinfo" value="<?php echo htmlspecialchars($device["warrantyinfo"], ENT_QUOTES, "UTF-8"); ?>" /></th></tr>
                    <tr><th>Owner: </th><th><input type="textfield" name="deviceowner" value="<?php echo htmlspecialchars($device["username"], ENT_QUOTES, "UTF-8"); ?>"/></th></tr>
                    <tr><th>Location: </th><th><input type="textfield" name="devicelocation" value="<?php echo htmlspecialchars($device["locationname"], ENT_QUOTES, "UTF-8"); ?>"/></th></tr>
                    <tr><th colspan="2"><button type="submit" class="btn btn-success">Save</button></th></tr>
                </form>
                <tr><th colspan="2">
                    <form action="?" method="post">
                        <input type="hidden" name="id" value="<?php echo $device["id"] ?>"> <!-- Used to identify whic device we're editing -->
                        <input type="hidden" name="deletedevice"><!-- POST this to indicate we're returnign from the edit device menu -->
                        <button type="submit" class="btn btn-danger" id="delete-button">Delete device</button>
                    </form>
                </th></tr>
            </table>
        </div>
    </body>
</html>