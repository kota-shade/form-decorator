<?php
namespace FormDecorator\View\Helper;

use Zend\View\Helper\AbstractHelper as BaseHelper;
use Zend\Form\Element as BaseElement;
use Zend\View\HelperPluginManager;

class FormElementBranch extends BaseHelper
{
    /**
     * @var array
     */
    protected $config;
    /**
     * @var HelperPluginManager
     */
    protected $helperPM;

    /**
     * @var array ветки с конфигурацией рендеринга элементов
     */
    protected $branchesConfig;

    public function __construct(HelperPluginManager $helperPM, $config)
    {
        $this->helperPM = $helperPM;
        $this->config = $config;
        if (array_key_exists('decoratorBranch', $this->config) == false) {
            throw new \Exception('Missing "decoratorBranch" section in confihguration');
        }
        $this->branchesConfig = $this->config['decoratorBranch'];
    }

    /**
     * @param BaseElement $formElement
     * @param string $branch - ветка из которой извлекать хелперы
     * @param string $mode - режим показа (просмотр, редактирование и т.п.)
     * @param array $options
     * @return $this|string
     */
    public function __invoke(BaseElement $formElement, $branch, $mode='default', $content = null, array $options = [])
    {
        return $this->render($formElement, $branch, $mode, $content, $options);
    }

    /**
     * @param BaseElement $formElement
     * @param string $branch - ветка из которой извлекать хелперы
     * @param string $mode - режим показа (просмотр, редактирование и т.п.)
     * @param mixed $content
     * @param array $options
     * @return mixed
     */
    public function render(BaseElement $formElement, $branch, $mode='default', $content = null,  array $options = [])
    {
        if (($newBranch = $formElement->getOption('branch')) != null) {
            $realBranch = $newBranch;
        } else {
            $realBranch = $branch;
        }
        $chain = $this->getHelperChain($formElement, $realBranch);
        $helperPM = $this->helperPM;

        /** @var array $helperConfig */
        foreach ($chain as $helperConfig) {
            $helperName = $helperConfig['name'];
            $options = (array_key_exists('options', $helperConfig)) ? $helperConfig['options'] : [];
            /** @var \Callable $helper */
            $helper = $helperPM->get($helperName);
            $content = $helper($formElement, $branch, $mode, $content, $options);
        }

        return $content;
    }

    /**
     * get helper chain for element in branch
     * @param BaseElement $formElement
     * @param $branchName
     * @return mixed
     * @throws \Exception
     */
    protected function getHelperChain(BaseElement $formElement, $branchName)
    {
        $branch = $this->getBranch($branchName);
        $name = get_class($formElement);
        if (array_key_exists($name, $branch)) {
            return $branch[$name];
        }

        $parentList = class_parents($name);
        foreach($parentList as $parentName) {
            if (array_key_exists($parentName, $branch)) {
                return $branch[$parentName];
            }
        }
        throw new \Exception("Can't find helper chain for " . $name . ' in branch ' . $branchName);
    }

    /**
     * get branch from configuration
     * @param $key
     * @return mixed|null
     * @throws \Exception
     */
    protected function getBranch($key)
    {
        if (array_key_exists($key, $this->branchesConfig) == false) {
            throw new \Exception('Unknown branch ='.$key);
        }
        return $this->branchesConfig[$key];
    }
}