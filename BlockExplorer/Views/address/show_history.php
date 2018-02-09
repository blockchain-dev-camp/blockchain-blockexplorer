<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 9.2.2018 г.
 * Time: 16:29
 */ /**@var \BlockExplorer\DTO\AddressInfoDTO $data
 * @var \BlockExplorer\DTO\TransactionDTO $transaction*/?>
<div style="text-align: center"><h1>Transactions History of Address <?=$data->getAddressHash()?>
    <br/>The Address has <?=$data->getBalance()?></h1>
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
    <?php foreach ($data->getTransactionsHistory() as $transaction): ?>
        <tr>
            <td><?=$transaction->getFrom()?></td>
            <td><?=$transaction->getTo()?></td>
            <td><?=$transaction->getValue()?></td>
            <td><a href="./transactions.php?transHash=<?=$transaction->getTransactionHash()?>"><?=$transaction->getTransactionHash()?></a></td>
            <td><?=$transaction->getFormatteddateReceived()?></td>
            <td><?=$transaction->getPaidStatus()?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>