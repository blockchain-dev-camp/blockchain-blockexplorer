<?php /**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 12.2.2018 г.
 * Time: 12:13
 */ /** @var \BlockExplorer\DTO\TransactionDTO[] $data */?>
<div style="text-align: center">
    <form method="get">
    Enter Transaction Hash: <input type="text" name="transHash"/>
    <br/><input type="submit" value="Search!">
    </form>
</div>
<div style="text-align: center"><h1>All Transactions</h1>
    <table class="table-bordered table" align="center">
        <thead>
        <tr>
            <th>From</th>
            <th>To</th>
            <th>Value</th>
            <th>Transaction Hash</th>
            <th>Creation Date</th>
            <th>Paid Status</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $transaction): ?>
            <tr>
                <td><a href="./history.php?hash=<?=$transaction->getFromAddress()?>"><?=$transaction->getFromAddress()?></a></td>
                <td><a href="./history.php?hash=<?=$transaction->getToAddress()?>"><?=$transaction->getToAddress()?></a></td>
                <td><?=$transaction->getValue()?></td>
                <td><a href="./transactions.php?transHash=<?=$transaction->getTransactionHash()?>"><?=$transaction->getTransactionHash()?></a></td>
                <td><?=$transaction->getFormatteddateReceived()?></td>
                <td><?=$transaction->getPaidStatus()?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
