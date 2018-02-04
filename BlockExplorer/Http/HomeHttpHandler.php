<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 2.2.2018 г.
 * Time: 17:31
 */

namespace BlockExplorer\Http;



use BlockExplorer\Services\HomeServiceInterface;
use Core\TemplateInterface;

class HomeHttpHandler extends HttpHandlerAbstract
{
    /**
     * @var HomeServiceInterface
     */
    private $homeService;

    public function __construct(TemplateInterface $template,
                                HomeServiceInterface $homeService)
    {
        parent::__construct($template);
        $this->homeService = $homeService;
    }

    public function index()
    {
        $serverInfo = $this->homeService->getServerInfo();
        if (null === $serverInfo) {
            $error = "The Node server is currently offline. Please check again later.";
            $this->render("errors/error", $error);
        } else {
            $this->render("home/serverInfo", $serverInfo);
        }

    }

}