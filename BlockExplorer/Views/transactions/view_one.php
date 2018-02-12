<?php /**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 21:13
 */ /** @var \BlockExplorer\DTO\TransactionDTO $data */?>
<div style="text-align: center"><h1>Details for Transactions With Hash <?=$data->getTransactionHash()?></h1>
    <table class="table-bordered table" align="center">
        <tr>
            <th>From</th>
            <td><?=$data->getFromAddress()?></td>
        </tr>
        <tr>
            <th>To</th>
            <td><?=$data->getToAddress()?> txs</td>
        </tr>
        <tr>
            <th>Value</th>
            <td><?=$data->getValue()?></td>
        </tr>
        <tr>
            <th>Transaction Hashy</th>
            <td><?=$data->getTransactionHash()?></td>
        </tr>
        <tr>
            <th>Creation Date</th>
            <td><?=$data->getFormatteddateReceived()?></td>
        </tr>
        <tr>
            <th>Paid Status</th>
            <td><?=$data->getPaidStatus()?></td>
        </tr>
    </table>
</div>
