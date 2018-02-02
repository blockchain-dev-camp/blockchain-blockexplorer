<?php

use BlockExplorer\DTO\BlockDTO;
/** @var blockDTO[] $data */
?>
<div style="text-align: center"><h1>All Blocks Data</h1>
<table align="center" border="1">
    <thead>
    <tr>
        <th>Index</th>
        <th>Transactions Count</th>
        <th>Created Date</th>
        <th>Block Hash</th>
    </tr>
    </thead>
    <tbody>
   <?php foreach ($data as $block): ?>
       <tr>
           <td><?=$block->getIndex()?></td>
           <td><?=$block->getTransactionsCount()?></td>
           <td><?=$block->getDateCreated()?></td>
           <td><?=$block->getBlockHash()?></td>
       </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>

