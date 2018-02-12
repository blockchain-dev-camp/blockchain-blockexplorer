<?php /** @var \BlockExplorer\DTO\BlockDTO $data */ ?>
<div style="text-align: center"><h1>Details for Block <?=$data->getIndex()?></h1>
    <table class="table-bordered table" align="center">
        <tr>
            <th>Index</th>
            <td><?=$data->getIndex()?></td>
        </tr>
        <tr>
            <th>Transactions Count</th>
            <td><a href="./transactions.php?blockId=<?=$data->getIndex()?>"><?=$data->getTransactionsCount()?></a> txs</td>
        </tr>
        <tr>
            <th>Previous Block Hash</th>
            <td><a href="./blocks.php?hash=<?=$data->getPrevBlockHash()?>"><?=$data->getPrevBlockHash()?></a></td>
        </tr>
        <tr>
            <th>Mined By</th>
            <td><?=$data->getMinedBy()?></td>
        </tr>
        <tr>
            <th>Block Hash</th>
            <td><?=$data->getBlockHash()?></td>
        </tr>
        <tr>
            <th>Creation Date</th>
            <td><?=$data->getFormattedDateCreated()?></td>
        </tr>
    </table>
</div>