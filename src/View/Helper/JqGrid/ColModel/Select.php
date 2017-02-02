<?php
namespace FormDecorator\View\Helper\JqGrid\ColModel;

use Zend\View\Helper\AbstractHelper as BaseHelper;
use Zend\View\HelperPluginManager;
use Zend\Form\Element\Select as BaseElement;


class Select extends BaseHelper
{
    //private $emptyPair = ['__empty__' => ''];
    private $emptyPair = ['' => ''];
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
        /** @var BaseElement $formElement */
        $valueOptions =  $formElement->getValueOptions();

        $searchOptions = $this->getEmptyPair() + $valueOptions;
        /** @var \Zend\Form\Element $column */
        $name = $formElement->getName();
        if (($label = $formElement->getLabel()) == '') {
            $label = $name;
        }
        $res = [
            'name' => $name,
            'index' => $name,
            'label' => $label,
            'stype' => 'select',
            'edittype' => 'select',
            'formatter' => 'select',
            'searchoptions' => [
                'value' => new SelectOptions($searchOptions),
                'sopt' => ['eq','ne'],
            ],
            'editoptions' => [
                'value' => new SelectOptions($valueOptions)
            ],
        ];
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
