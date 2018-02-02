<?php
/**
 * @var \BlockExplorer\DTO\BlockDTO $data
 * @var \BlockExplorer\DTO\TransactionDTO $transaction
 */ ?>
<div style="text-align: center"><h1>All Transactions in Block <?=$data->getIndex()?></h1>
    <table align="center" border="1">
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
        <?php foreach ($data->getTransactions() as $transaction): ?>
            <tr>
                <td><?=$transaction->getFrom()?></td>
                <td><?=$transaction->getTo()?></td>
                <td><?=$transaction->getValue()?></td>
                <td><a href="./transactions.php?transHash=<?=$transaction->getTransactionHash()?>"><?=$transaction->getTransactionHash()?></a></td>
                <td><?=$transaction->getDateReceived()?></td>
                <td><?=$transaction->getPaid()?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

