<?php
    require("../includes/config.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["symbol"]))
        {
            apologize("You must enter a symbol you want to sell.");
        }
        else
        {
            $stock = lookup($_POST["symbol"]);
            $row = query("SELECT * FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
            query("UPDATE users SET cash = cash + ? WHERE id = ?", ($row[0]["shares"] * $stock["price"]), $_SESSION["id"]);
            query("DELETE FROM portfolio WHERE symbol = ? AND id = ?", $_POST["symbol"], $_SESSION["id"]);
            query("INSERT INTO history (id, buy, symbol, shares, price) VALUES (?, ?, ?, ?, ?)", $_SESSION["id"], false, $_POST["symbol"], $row[0]["shares"], $stock["price"]);
            
            redirect("index.php");
        }
    }
    else
    {
        
        $rows = query("SELECT symbol, shares FROM portfolio WHERE id = ?", $_SESSION["id"]);
        render("sell_form.php", ["rows" => $rows]);
    }
?>
