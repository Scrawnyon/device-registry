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
        <div  id="adddeviceinfo">
            <table class="table table-striped">
                <thead class="thead" align="center"><tr><th colspan="2">Add a user and/or location:</th></tr></thead>
                <form action="?" method="post">
                    <input type="hidden" name="adduserorlocation"> <!-- POST this to indicate we're returnign from the add device menu -->

                    <tr><th>User: </th><th><input type="textfield" name="username" /></th></tr>
                    <tr><th>Location: </th><th><input type="textfield" name="location" /></th></tr>
                    <tr><th colspan="2"><button type="submit" class="btn btn-success">Submit</button></th></tr>
                </form>
            </table>
        </div>
        <br /><br />
        <div id="userorlocationtable">
            <table class="table table-striped table-sm" style="left: 25%">
                <thead>
                    <tr>
                        <th>Users:</th>
                    </tr>
                </thead>
                <?php foreach($users as $user): ?>
                    <tr>
                        <th><?php echo htmlspecialchars($user["username"], ENT_QUOTES, "UTF-8"); ?></th>
                    </tr>
                <?php endforeach; ?>
            </table>
            <table class="table table-striped table-sm" style="right: 25%">
                <thead>
                    <tr>
                        <th>Locations:</th>
                    </tr>
                </thead>
                <?php foreach($locations as $location): ?>
                    <tr>
                        <th><?php echo htmlspecialchars($location["locationname"], ENT_QUOTES, "UTF-8"); ?></th>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </body>
</html>