<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 19:58
 */

namespace BlockExplorer\Http;


use BlockExplorer\DTO\BlockDTO;
use BlockExplorer\Services\BlockServiceInterface;
use Core\TemplateInterface;

class BlockHttpHandler extends HttpHandlerAbstract
{
    /**
     * @var BlockServiceInterface
     */
    private $blockService;

    public function __construct(TemplateInterface $template,
                                BlockServiceInterface $blockService)
    {
        parent::__construct($template);
        $this->blockService = $blockService;
    }

    public function getBlockData(array $getRequest): void
    {
       if (isset($getRequest['id'])) {
           $this->viewBlock(intval(htmlspecialchars($getRequest['id'])));
       } elseif (isset($getRequest['hash'])) {
           $this->viewByHash(htmlspecialchars($getRequest['hash']));
       } else {
           $this->viewAllBlocks();
       }
    }


    private function viewAllBlocks(): void
    {
        $blocks = $this->blockService->getBlocksData();
        if (null === $blocks) {
            $error = "The Node server is currently offline. Please check again later.";
            $this->render("errors/error", $error);
        } else {
            $blocks = array_reverse($blocks);
            $this->render("blocks/all", $blocks);
        }
    }

    private function viewBlock(int $index): void
    {
        $block = $this->blockService->getBlockByIndex($index);
        if (null === $block) {
            $error = "There isn't a block with " . $index . " index. Please try again.";
            $this->render("errors/error", $error);
        } else {
            $this->render('blocks/view', $block);
        }
    }

    private function viewByHash(string $blockHash): void
    {
        $block = $this->blockService->getBlockByHash($blockHash);
        if (null === $block) {
            $error = "There isn't a block with " . $blockHash . " hash. Please try again.";
            $this->render("errors/error", $error);
        } else {
            $this->render('blocks/view', $block);
        }
    }

}