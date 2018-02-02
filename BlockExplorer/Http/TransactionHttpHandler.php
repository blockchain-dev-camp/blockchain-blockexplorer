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
            //TODO: TROW AN ERROR.
        }
    }

    private function showAllByBlockId(int $index): void
    {
        $block = $this->transactionService->viewAllInBlockIndex($index);
        $this->render("transactions/view_all", $block);
    }

    private function showTransactionByHash(string $transHash): void
    {
        $transaction = $this->transactionService->viewSingleTransactionByHash($transHash);
        $this->render("transactions/view_one", $transaction);
    }
}