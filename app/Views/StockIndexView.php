<html lang="en">
<header>
    <head>
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 35%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>
        <title>Stocks</title>
    </head>
</header>
<body>
<form action="/search" method="post">
    <label for="symbol">Search</label>
    <input type="text" id="symbol" name="symbol" required>
    <button type="submit">Search</button>
</form>
<?php if ($stock) { ?>
    <h1>
        <?php echo $stock->getLongName(); ?>
    </h1>
    <h2>
        <?php echo $stock->getSymbol(); ?>
    </h2>
    <table>
        <tr>
            <td><strong><?php echo 'Previous Close ' ?></strong><?php echo $stock->getRegularMarketPreviousClose(); ?>
            </td>
            <td><strong><?php echo 'Open ' ?></strong><?php echo $stock->getRegularMarketOpen(); ?></td>
        </tr>
        <tr>
            <td><strong><?php echo 'Day\'s Low ' ?></strong><?php echo $stock->getRegularMarketDayLow(); ?></td>
            <td><strong><?php echo 'Day\'s High ' ?></strong><?php echo $stock->getRegularMarketDayHigh(); ?></td>
        </tr>
        <tr>
            <td><strong><?php echo '52 week Low ' ?></strong><?php echo $stock->getFiftyTwoWeekLow(); ?></td>
            <td><strong><?php echo '52 week High ' ?></strong><?php echo $stock->getFiftyTwoWeekHigh(); ?></td>
        </tr>
        <tr>
            <td><strong><?php echo 'Volume ' ?></strong><?php echo $stock->getRegularMarketVolume(); ?></td>
            <td><strong><?php echo 'Avg.Volume ' ?></strong><?php echo $stock->getAverageDailyVolume3Month(); ?></td>
        </tr>
    </table>
<?php } ?>
</body>
</html>