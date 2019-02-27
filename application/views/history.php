<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="application/assets/css/style.css">
</head>
<body>
    <section class="main">
        <p>Previos exchange rate</p>
        <div class="exchange_rate">
        <span>Buying</span>
        <table>
            <tr>
                <th>Date</th> 
                <th>USD</th>
                <th>EUR</th> 
            </tr>
            <?php foreach($previos_currency as $row){ ?>
            <tr>
                <td><?=$row['date']?></td>
                <td><?=$row['USD']?></td> 
                <td><?=$row['EUR']?></td> 
            </tr>
           <?php } ?>
        </table>
        <a href="/welcome">Current Rates</a>
    </section>
</body>
</html>