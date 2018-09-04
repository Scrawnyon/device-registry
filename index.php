<?php
    /* Controller script. Parses GET and POST information and includes the related page */

    // If "adddevice" variable exists, we pushed the add device button
    if (isset($_GET["adddevice"]))
    {
        include "adddevice.html.php";
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
    
    // If "device" variable was given as post, we're returning from the "add device" form.
    // Insert new device into database and reload the results page
    if (isset($_POST["devicename"]))
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

    // If "editdevice" variable exists, we pushed the edit device button
    if (isset($_GET["editdevice"]))
    {
        $id = $_POST["id"];

        // mysqli_real_escape_string for mysqli injection safety (?)
        $query = mysqli_real_escape_string($connection, "SELECT * FROM deviceregistry WHERE id='".$id."';");
        $query = stripslashes($query);
        $device = mysqli_query($connection, $query);
        if (!$device)
        {
            $error = "Error getting device info from database; ".mysqli_error($connection).". Query: ".$query;
            include "error.html.php";
            exit();
        }

        echo "EDITING DEVICE";
        echo "testing".$device;
        exit();
        
        include "editdevice.html.php";
        exit();
    }
    
    // Load devices from database
    $result = mysqli_query($connection, "SELECT * FROM deviceregistry");  
    if (!$result)  
    {  
        $error = "Error querying database: " . mysqli_error($connection);
        include "error.html.php";
        exit();
    }
    
    $output = "Connection established";
    include "results.html.php";
?>