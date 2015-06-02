<?php
    require("../includes/config.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["update_cash"]))
        {
            apogize("You must select an option");
        }      
        
        query("UPDATE users SET cash = cash + ? WHERE id = ?", $_POST["update_cash"], $_SESSION["id"]);
        redirect("index.php");
    }
    else
    {
        render("cash.php");
    }
?>
