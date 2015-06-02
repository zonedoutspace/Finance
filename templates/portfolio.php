<div id="middle">
    <table style="width: 500px; align: center; margin: auto;">
        <tr>
            <td><a href="quote.php">Quote</a></td>
            <td><a href="buy.php">Buy</a></td>
            <td><a href="sell.php">Sell</a></td>
            <td><a href="history.php">History</a></td>
            <td><a href="cash.php">Add Cash</a></td>
            <td><a href="logout.php"><strong>Log Out</strong></a></td>
        </tr>
    </table>
    
    <table class="table table-striped">
        <thead align="left">
            <tr>
                <td><b>Symbol</b></td>
                <td><b>Name</b></td>
                <td><b>Shares</b></td>
                <td><b>Price</b></td>
                <td><b>Total</b></td>
            </tr>
        </thead>
        <tbody align="left">
            <?php
                foreach ($positions as $position)
                {
                    print("<tr>");
                    print("<td>{$position["symbol"]}</td>");
                    print("<td>{$position["name"]}</td>");
                    print("<td>{$position["shares"]}</td>");
                    print("<td>" . "$" . "{$position["price"]}</td>");
                    print("<td>" . "$" . "{$position["total"]}</td>");
                    print("</tr>");
                }
            ?>
            <tr>
            <td colspan="4">CASH</td>
            <td>$<?= $cash ?></td>
            </tr>
        </tbody>
    </table>
</div>
