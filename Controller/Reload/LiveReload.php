<?php


namespace Webvisum\LiveReload\Controller\Reload;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;

class LiveReload extends Action
{
    const STATIC_PATH = "/vendor/webvisum/livereload/data";
    protected $jsonFactory;

    public function __construct(Context $context, JsonFactory $jsonFactory)
    {
        $this->jsonFactory = $jsonFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $reloadRequired = file_exists(BP . self::STATIC_PATH  . "/reload");
        $enabledDisabled = !file_exists(BP . self::STATIC_PATH  . "/livereload");
        if($reloadRequired) {
            unlink(BP . self::STATIC_PATH  . "/reload");
        }
        return $this->jsonFactory->create()->setData(["reload" => $reloadRequired, "paused" => $enabledDisabled]);
    }

}