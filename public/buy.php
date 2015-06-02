<?php
    require("../includes/config.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["symbol"]) || empty($_POST["shares"]))
        {
            apologize("You must enter a symbol and the number of shares you want.");
        }
        else
        {
            $stock = lookup($_POST["symbol"]);
            $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
            $cash = $cash[0]["cash"];
            $result = preg_match("/^\d+$/", $_POST["shares"]);
            
            if ($stock == false)
            {
                apologize("The symbol you entered does not exist");
            }
            else if ($cash < ($stock["price"] * $_POST["shares"]))
            {
                apologize("You can't afford that.");
            }
            else if ($result == false)
            {
                apologize("You can't buy a fraction of a share");
            }
            else
            {
                query("UPDATE users SET cash = cash - ? WHERE id = ?", ($stock["price"] * $_POST["shares"]), $_SESSION["id"]);  
                query("INSERT INTO portfolio (id, symbol, shares, price) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares+ ?", $_SESSION["id"], $stock["symbol"], $_POST["shares"], $stock["price"], $_POST["shares"]);
                query("INSERT INTO history (id, buy, symbol, shares, price) VALUES (?, ?, ?, ?, ?)", $_SESSION["id"], true, $stock["symbol"], $_POST["shares"], $stock["price"]);
            }
            redirect("index.php");
        }
    }
    else
    {
        render("buy_form.php");
    }
?>
