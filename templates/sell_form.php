<form action="sell.php" method="post">
    <div class="form-group">
        <select autofocus class="form-control" name="symbol">
            <option value=""> </option>
            <?php
                foreach($rows as $row)
                {
                    print("<option value={$row["symbol"]}>{$row["symbol"]}</option>");
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Submit</button>
    </div>
</form>
