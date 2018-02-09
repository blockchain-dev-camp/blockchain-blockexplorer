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
    <?php foreach ($data->getTransactionsHistory() as $transaction): ?>
        <tr style="color: snow; background-color: <?= $transaction->isReceiver() ? "green" : "red" ?> ">
            <td><a style="color: snow" href="./history.php?hash=<?=$transaction->getFrom()?>"><?=$transaction->getFrom()?></a></td>
            <td><a style="color: snow" href="./history.php?hash=<?=$transaction->getTo()?>"><?=$transaction->getTo()?></a></td>
            <td><?=$transaction->getValue()?></td>
            <td><a style="color: snow" href="./transactions.php?transHash=<?=$transaction->getTransactionHash()?>"><?=$transaction->getTransactionHash()?></a></td>
            <td><?=$transaction->getFormatteddateReceived()?></td>
            <td><?=$transaction->getPaidStatus()?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>




