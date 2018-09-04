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
        <div  id="adddeviceinfo">
            <table class="table table-striped">
                <thead class="thead" align="center"><tr><th colspan="2">Add a device:</th></tr></thead>
                <form action="?" method="post">
                    <tr><th>Device name: </th><th><input id="devicename" type="text" name="devicename" /></th></tr>
                    <tr><th>Device brand: </th><th><input type="text" name="devicebrand" /></th></tr>
                    <tr><th>Device model: </th><th><input type="text" name="devicemodel" /></th></tr>
                    <tr><th>Device serialnum: </th><th><input type="text" name="deviceserialnum" /></th></tr>
                    <tr><th>Device warrantyinfo: </th><th><input type="textfield" name="devicewarrantyinfo" /></th></tr>
                    <tr><th colspan="2"><button type="submit" class="btn btn-light">Submit</button></th></tr>
                </form>
            </table>
        </div>
    </body>
</html>