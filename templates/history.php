<div>
    <table id="history">
        <tr>
            <td>Buy/Sell</td>
            <td>Date/Time
            <td>Symbol</td>
            <td>Shares</td>
            <td>Price</td>
        </tr>
            <?php
                foreach($rows as $row)
                {
                    print("<tr>");
                    if($row["buy"] == true)
                    {
                        print("<td>Buy</td>");
                    }
                    else
                    {
                        print("<td>Sell</td>");
                    }
                    print("<td>{$row["date"]}</td>");
                    print("<td>{$row["symbol"]}</td>");
                    print("<td>{$row["shares"]}</td>");
                    print("<td>{$row["price"]}</td>");
                    print("</tr>");
                }
            ?>
    </table>
</div>
