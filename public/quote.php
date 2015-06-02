<?php
    require("../includes/config.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["symbol"]))
        {
            apologize("You must enter a symbol.");
        }
        else
        {
            $stock = lookup($_POST["symbol"]);
            if ($stock == false)
            {
                apologize("The symbol you entered does not exist");
            }
            else
            {
                $stock["price"] = number_format($stock["price"], 2);
                render("quote.php", $stock);
            }
        }
    }
    else
    {
        render("quote_form.php");
    }
?>
