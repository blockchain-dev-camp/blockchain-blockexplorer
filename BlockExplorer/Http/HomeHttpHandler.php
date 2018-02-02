<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 17:31
 */

namespace BlockExplorer\Http;


use BlockExplorer\Services\DataGatherServiceInterface;
use Core\TemplateInterface;

class HomeHttpHandler extends HttpHandlerAbstract
{
    /**
     * @var DataGatherServiceInterface
     */
    private $dataGatherService;

    public function __construct(TemplateInterface $template,
                                DataGatherServiceInterface $dataGatherService)
    {
        parent::__construct($template);
        $this->dataGatherService = $dataGatherService;
    }

    public function index()
    {
        $serverInfo = $this->dataGatherService->getServerInfo();
        $this->render("home/serverInfo", $serverInfo);
    }
}