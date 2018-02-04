<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 20:35
 */

namespace BlockExplorer\Http;


use BlockExplorer\Services\TransactionServiceInterface;
use Core\TemplateInterface;

class TransactionHttpHandler extends HttpHandlerAbstract
{
    /**
     * @var TransactionServiceInterface $transactionService
     */
    private $transactionService;

    public function __construct(TemplateInterface $template,
                                TransactionServiceInterface $transactionService)
    {
        parent::__construct($template);
        $this->transactionService = $transactionService;
    }

    public function view(array $getRequest): void
    {
        if (isset($getRequest['blockId']))
        {
            $this->showAllByBlockId(intval(htmlspecialchars($getRequest['blockId'])));
        } elseif (isset($getRequest['transHash'])) {

            $this->showTransactionByHash(htmlspecialchars($getRequest['transHash']));
        } else {
            $this->render("transactions/search");
        }
    }

    private function showAllByBlockId(int $index): void
    {
        $block = $this->transactionService->viewAllInBlockIndex($index);

        if (null === $block) {
            $error = "There isn't a block with " . $index . " index. Please try again.";
            $this->render("transactions/error", $error);
        } else {
             $this->render("transactions/view_all", $block);
        }
    }

    private function showTransactionByHash(string $transHash): void
    {
        $transaction = $this->transactionService->viewSingleTransactionByHash($transHash);
        if (null === $transaction) {
            $error = "We have no data for transactions with this " . $transHash . " hash.Please try again.";
            $this->render("transactions/error", $error);
        } else {
            $this->render("transactions/view_one", $transaction);
        }
    }
}