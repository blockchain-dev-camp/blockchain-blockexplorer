<?php

use BlockExplorer\DTO\BlockDTO;
/** @var blockDTO[] $data */
?>
<div style="text-align: center"><h1>All Blocks Data</h1>
    <table class="table-bordered table" align="center">
        <thead>
        <tr>
            <th>Index</th>
            <th>Mined By</th>
            <th>Transactions Count</th>
            <th>Created Date</th>
            <th>Block Hash</th>
        </tr>
        </thead>
        <tbody>
       <?php foreach ($data as $block): ?>
           <tr align="center">
               <td><a href="./blocks.php?id=<?=$block->getIndex()?>"><?=$block->getIndex()?></a></td>
               <td><?=$block->getMinedBy()?></td>
               <td><a href="./transactions.php?blockId=<?=$block->getIndex()?>"><?=$block->getTransactionsCount()?></a> txs</td>
               <td><?=$block->getFormattedDateCreated()?></td>
               <td><a href="./blocks.php?id=<?=$block->getIndex()?>"><?=$block->getBlockHash()?></a></td>
           </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

