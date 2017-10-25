<?php
namespace FormDecorator\View\Helper\JqGrid\ColModel;

use Zend\View\Helper\AbstractHelper as BaseHelper;
use Zend\View\HelperPluginManager;
use Zend\Form\Element\Select as BaseElement;


class Select extends BaseHelper
{
    //private $emptyPair = ['__empty__' => ''];
    private $emptyPair = ['' => ''];
    private $delimiter = '||';
    private $separator = '::';

    /**
     * @param BaseElement $formElement
     * @param string $branch
     * @param string $mode - режим показа (просмотр, редактирование и т.п.)
     * @param mixed $content
     * @param array $options
     * @return $this|string
     */
    public function __invoke(BaseElement $formElement, $branch, $mode='default', $content='', array $options = [])
    {
        return $this->render($formElement, $branch, $mode, $content, $options);
    }

    /**
     * @param BaseElement $formElement
     * @param string $branch
     * @param string $mode - режим показа (просмотр, редактирование и т.п.)
     * @param mixed $content
     * @param array $options
     * @return mixed
     */
    public function render(BaseElement $formElement, $branch, $mode='default', $content = '', array $options = [])
    {
        /** @var BaseElement $formElement */
        $valueOptions =  $formElement->getValueOptions();
        if (($delimiter = $formElement->getOption('delimiter')) == null) {
            $delimiter = $this->delimiter;
        }
        if (($separator = $formElement->getOption('separator')) == null) {
            $separator = $this->separator;
        }

        $searchOptions = $this->getEmptyPair() + $valueOptions;
        /** @var \Zend\Form\Element $column */
        $name = $formElement->getName();
        if (($label = $formElement->getLabel()) == '') {
            $label = $name;
        }
        $selectOptions = new SelectOptions($searchOptions, $delimiter, $separator);
        $res = [
            'name' => $name,
            'index' => $name,
            'label' => $label,
            'stype' => 'select',
            'edittype' => 'select',
            'formatter' => 'select',
            'searchoptions' => [
                'value' => $selectOptions,
                'sopt' => ['eq','ne'],
                'delimiter' => $delimiter,
                'separator' => $separator,
            ],
            'editoptions' => [
                'value' => $selectOptions,
                'delimiter' => $delimiter,
                'separator' => $separator,
            ],
        ];

        if (($opt = $formElement->getOption('jqGrid')) != null) {
            $res = array_replace_recursive($res, $opt);
        }
        return $res;
    }

    /**
     * @return array
     */
    public function getEmptyPair()
    {
        return $this->emptyPair;
    }

    /**
     * @param array $emptyPair
     * @return self
     */
    public function setEmptyPair(array $emptyPair)
    {
        $this->emptyPair = $emptyPair;
        return $this;
    }
}
