<?php /** @var \BlockExplorer\DTO\ServerInfoDTO $data */ ?>
<table align="center" border="1">
    <tr>
        <th>About</th>
        <td><?=$data->getAbout()?></td>
    </tr>
    <tr>
        <th>Name</th>
        <td><?=$data->getName()?></td>
    </tr>
    <tr>
        <th>Peers</th>
        <td><?=$data->getPeers()?></td>
    </tr>
    <tr>
        <th>Blocks</th>
        <td><?=$data->getBlocks()?></td>
    </tr>
    <tr>
        <th>Confirmed Transactions</th>
        <td><?=$data->getConfirmedTransactions()?></td>
    </tr>
    <tr>
        <th>Pending Transactions</th>
        <td><?=$data->getPendingTransactions()?></td>
    </tr>
    <tr>
        <th>Addresses</th>
        <td><?=$data->getAddresses()?></td>
    </tr>
    <tr>
        <th>Coins</th>
        <td><?=$data->getCoins()?></td>
    </tr>
</table>