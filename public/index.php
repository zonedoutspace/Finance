<?php

    // configuration
    require("../includes/config.php"); 

    $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    $cash = number_format($cash[0]["cash"], 2);
    $rows = query("SELECT shares, symbol FROM portfolio WHERE id = ?", $_SESSION["id"]);
    $positions = [];
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        $total = ($stock["price"] * $row["shares"]);
        if ($stock !== false)
        {
            $positions[] = [
                "name" => $stock["name"],
                "price" => $stock["price"],
                "shares" => $row["shares"],
                "symbol" => $row["symbol"],
                "total" => $total
            ];
        }
    }

    // render portfolio
    render("portfolio.php", ["cash" => $cash, "positions" => $positions]);

?>
