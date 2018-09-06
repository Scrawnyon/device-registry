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
        <div id="search-container">
            <table class="table table-striped table-sm">
                <thead>
                    <tr><th><p align="center">Search:</p></th></tr>
                </thead>
                <form action="?" method="post">
                    <input type="hidden" name="search">
                    <tr><th><p align="center"><input type="text" name="searchstring" placeholder="Name, brand, model, serial number, warranty or date" width="90%"/></p></th></tr>
                    <tr><th><p align="center"><input type="submit" class="btn btn-light" value="Search" /></p></th></tr>
                </form>
            </table>
        </div>
    </body>
</html>