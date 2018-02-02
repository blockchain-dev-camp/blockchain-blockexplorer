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

       } else {
           $this->viewAllBlocks();
       }
    }


    private function viewAllBlocks(): void
    {
        $blocks = $this->blockService->getBlocksData();
        $this->render("blocks/all", $blocks);
    }

    private function viewBlock(int $index): void
    {
        $block = $this->blockService->getBlockByIndex($index);
        $this->render('blocks/view', $block);
    }

}