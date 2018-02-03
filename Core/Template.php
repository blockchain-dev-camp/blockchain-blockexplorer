<?php

namespace Core;


class Template implements TemplateInterface
{
    const TEMPLATES_FOLDER = 'BlockExplorer/Views/';
    const TEMPLATES_EXTENSION = '.php';

    public function render(string $templateName, $data = null, array $errors = [])
    {
        require_once self::TEMPLATES_FOLDER
            . "header"
            . self::TEMPLATES_EXTENSION;
        require_once self::TEMPLATES_FOLDER
            . $templateName
            . self::TEMPLATES_EXTENSION;
        require_once self::TEMPLATES_FOLDER
            . "footer"
            . self::TEMPLATES_EXTENSION;
    }
}