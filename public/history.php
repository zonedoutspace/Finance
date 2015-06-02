<?php
    require("../includes/config.php");
    
    $rows = query("SELECT * FROM history WHERE id = ?", $_SESSION["id"]);
    render("history.php", ["rows" => $rows]);
?>
