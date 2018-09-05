<?php
    /* Controller script. Parses GET and POST information and includes the related page */
    error_reporting(-1);
    // If "adddevice" variable was given as GET (not POST), we pushed the add device button
    if (isset($_GET["adddevice"]))
    {
        include "adddevice.html.php";
        exit();
    }

    // If "search" variable was given as GET (not POST), we pushed the search button
    if (isset($_GET["search"]))
    {
        include "search.html.php";
        exit();
    }

    // Establish connection to database
    $connection = mysqli_connect("34.246.32.28", "kujala", "j5QzLMCU");
    if (!$connection) 
    { 
        $output = "Connection failed"; 
        include "error.html.php"; 
        exit();
    }
    
    // Encode charset to UTF-8
    if (!mysqli_set_charset($connection, "utf8")) 
    {
        $output = "Database encoding failed";
        include "error.html.php";
        exit();
    }
    
    // Select database
    if (!mysqli_select_db($connection, "kujala"))
    {
        $output = "Database not found";
        include "error.html.php";
        exit();
    }
    
    // If "adddevice" variable was given as POST (not GET), we're returning from the "add device" form.
    // Insert new device into database and reload the results page
    if (isset($_POST["adddevice"]))
    {
        $devicename = $_POST["devicename"];
        $devicebrand = $_POST["devicebrand"];
        $devicemodel = $_POST["devicemodel"];
        $deviceserialnum = $_POST["deviceserialnum"];
        $devicewarrantyinfo = $_POST["devicewarrantyinfo"];
        $dateadded = "CURDATE()";
        
        // mysqli_real_escape_string for mysqli injection safety
        $query = mysqli_real_escape_string($connection, 
            "INSERT INTO deviceregistry (devicename, brand, model, serialnum, warrantyinfo, dateadded) VALUES ('".$devicename."', '".$devicebrand."', '".$devicemodel."', '".$deviceserialnum."', '".$devicewarrantyinfo."', ".$dateadded.")");
        
        $query = stripslashes($query);
        if (!mysqli_query($connection, $query))
        {
            $error = "Error adding device to database; ".mysqli_error($connection).". Query: ".$query;
            include "error.html.php";
            exit();
        }

        // Set location to current directory to reload the page from the controller, rather than
        // the "add device" form
        header("Location: .");
        exit();
    }

    // If "editdevice" variable was given as GET (not POST), we pushed the edit device button
    if (isset($_GET["editdevice"]))
    {
        $id = $_POST["id"];
        
        // mysqli_real_escape_string for mysqli injection safety (?)
        $query = mysqli_real_escape_string($connection, "SELECT * FROM deviceregistry WHERE id=".$id.";");
        $query = stripslashes($query);
        $result = mysqli_query($connection, $query);
        
        if (!$result)
        {
            $error = "Error getting device info from database; ".mysqli_error($connection).". Query: ".$query;
            include "error.html.php";
            exit();
        }

        $device = mysqli_fetch_array($result);
        
        include "editdevice.html.php";
        exit();
    }

    // If "editdevice" variable was given as POST (not GET), we're returning from the edit device menu
    if (isset($_POST["editdevice"]))
    {
        $devicename = $_POST["devicename"];
        $devicebrand = $_POST["devicebrand"];
        $devicemodel = $_POST["devicemodel"];
        $deviceserialnum = $_POST["deviceserialnum"];
        $devicewarrantyinfo = $_POST["devicewarrantyinfo"];

        $id = $_POST["id"];
        
        // mysqli_real_escape_string for mysqli injection safety
        $query = mysqli_real_escape_string($connection, 
            "UPDATE deviceregistry SET devicename='".$devicename."', brand='".$devicebrand."', model='".$devicemodel."', serialnum='".$deviceserialnum."', warrantyinfo='".$devicewarrantyinfo."' WHERE id=".$id.";");
        
        $query = stripslashes($query);
        if (!mysqli_query($connection, $query))
        {
            $error = "Error editing device in database; ".mysqli_error($connection).". Query: ".$query;
            include "error.html.php";
            exit();
        }
        
        // Set location to current directory to reload the page from the controller, rather than
        // the "edit device" form
        header("Location: .");
        exit();
    }

    // If "deletedevice" variable was given as POST (not GET), we're returning from the edit device menu and want to delete the device
    if (isset($_POST["deletedevice"]))
    {
        $id = $_POST["id"];
        
        // mysqli_real_escape_string for mysqli injection safety
        $query = mysqli_real_escape_string($connection, 
            "DELETE FROM deviceregistry WHERE id='".$id."';");
        $query = stripslashes($query);

        if (!mysqli_query($connection, $query))
        {
            $error = "Error $searchdeleting device from database; ".mysqli_error($connection).". Query: ".$query;
            include "error.html.php";
            exit();
        }

        // Set location to current directory to reload the page from the controller, rather than
        // the "edit device" form
        header("Location: .");
        exit();
    }
    
    // Check sorting
    if (isset($_POST["sorting"]))
    {
        if (isset($_POST["devicename"]))
        {
            echo "SORTING BY NAME";
            $sortby = "devicename";
        }
        else if (isset($_POST["brand"]))
        {
            $sortby = "brand";
        }
        else if (isset($_POST["model"]))
        {
            $sortby = "model";
        }
        else if (isset($_POST["serialnum"]))
        {
            $sortby = "serialnum";
        }
        else if (isset($_POST["warrantyinfo"]))
        {
            $sortby = "warrantyinfo";
        }
        else if (isset($_POST["dateadded"]))
        {
            $sortby = "dateadded";
        }
    }
    else
    {
        $sortby = "dateadded";
    }

    // If "search" variable was given as POST (not GET), we're returning from the search menu
    if (!empty($_POST["searchstring"]))
    {
        $search = $_POST["searchstring"];
        $query = "SELECT * FROM deviceregistry WHERE  devicename LIKE '%".$search."%' OR  brand LIKE '%".$search."%' OR  model LIKE '%".$search."%' OR  serialnum LIKE '%".$search."%' OR warrantyinfo LIKE '%".$search."%' OR dateadded LIKE '%".$search."%' ORDER BY ".$sortby.";";
    }
    else
    {
        $query = "SELECT * FROM deviceregistry ORDER BY ".$sortby.";";
    }

    $query = mysqli_real_escape_string($connection, $query);
    $query = stripslashes($query);

    // Load devices from database
    $result = mysqli_query($connection, $query);  
    if (!$result)
    {  
        $error = "Error querying database: " . mysqli_error($connection);
        include "error.html.php";
        exit();
    }
    
    include "results.html.php";
?>