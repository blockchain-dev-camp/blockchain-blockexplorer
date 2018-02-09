<?php
/**
 * Created by PhpStorm.
 * User: Thedi
 * Date: 9.2.2018 г.
 * Time: 15:57
 */

namespace BlockExplorer\Http;


use BlockExplorer\Services\AddressServiceInterface;
use Core\TemplateInterface;

class AddressHistoryHttpHandler extends HttpHandlerAbstract
{
    /**
     * @var AddressServiceInterface
     */
    private $addressService;

    public function __construct(TemplateInterface $template,
                                AddressServiceInterface $addressService)
    {
        parent::__construct($template);
        $this->addressService = $addressService;
    }

    public function show(array $getArray): void
    {
        if (isset($getArray['hash']))
        {
            $this->displayInfo(htmlspecialchars($getArray['hash']));
        } else {
            $this->render('address/search');
        }
    }

    private function displayInfo(string $addressHash): void
    {
        $addressDTO = $this->addressService->getHistory($addressHash);
        $this->render('address/show_history', $addressDTO);
    }
}