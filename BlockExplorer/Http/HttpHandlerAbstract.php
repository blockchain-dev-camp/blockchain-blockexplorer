<?php

namespace BlockExplorer\Http;



use Core\TemplateInterface;

abstract class HttpHandlerAbstract
{

    /**
     * @var TemplateInterface
     */
    private $template;

    protected $binder;


    public function __construct(TemplateInterface $template)
    {
        $this->template = $template;
    }


    public function render(string $templateName, $data = null, array $errors = [])
    {
        $this->template->render($templateName, $data, $errors);
    }

    public function redirect(string $url)
    {
        header("Location: $url");
        exit;
    }
}