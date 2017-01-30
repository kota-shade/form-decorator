<?php
namespace FormDecorator\View\Helper\JqGrid\ColModel;

use Zend\View\Helper\AbstractHelper as BaseHelper;
use Zend\View\HelperPluginManager;
use Zend\Form\Element as BaseElement;

class Text extends BaseHelper
{
//    /**
//     * @var array
//     */
//    protected $config;
//    /**
//     * @var HelperPluginManager
//     */
//    protected $helperPM;
//
//    /**
//     * @var array ветки с конфигурацией рендеринга элементов
//     */
//    protected $branchesConfig;
//
//    public function __construct(HelperPluginManager $helperPM, $config, array $options = [])
//    {
//        $this->helperPM = $helperPM;
//        $this->config = $config;
//        if (array_key_exists('decoratorBranch', $this->config) == false) {
//            throw new \Exception('Missing "decoratorBranch" section in confihguration');
//        }
//        $this->branchesConfig = $this->config['decoratorBranch'];
//    }

    /**
     * @param BaseElement $formElement
     * @param string $branch
     * @param mixed $content
     * @param array $options
     * @return $this|string
     */
    public function __invoke(BaseElement $formElement, $branch, $content='', array $options = [])
    {
        return $this->render($formElement, $branch, $content, $options);
    }

    /**
     * @param BaseElement $formElement
     * @param string $branch
     * @param mixed $content
     * @param array $options
     * @return mixed
     */
    public function render(BaseElement $formElement, $branch, $content = '', array $options = [])
    {
        $sopt = [
            "eq",
            "ne",
            "bw"
        ];

        if (is_array($options) && array_key_exists('sopt', $options)) {
            $sopt = $options['sopt'];
        }

        $res = [
            "edittype" => "text",
            "index" => $formElement->getName(),
            "label" => $formElement->getLabel(),
            "name" => $formElement->getName(),
            "searchoptions" => [
                "sopt" => $sopt
            ],
            "stype" => "text"
        ];

        return $res;
    }
}
