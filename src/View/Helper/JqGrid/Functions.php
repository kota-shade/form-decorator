<?php
namespace FormDecorator\View\Helper\JqGrid;

use Zend\Json\Expr;
use Zend\Form\FieldsetInterface as GridObject;
use Zend\Json\Json;

/**
 * It stores method item for grid
 * Class Method
 * @package JqGridBackend\Grid\View\Helper\Grid
 */
class Functions extends Expr
{
    /** @var GridObject */
    protected $gridObject;
    /** @var  string */
    protected $name;
    /** @var array  */
    protected $params = '';

    public function __construct($name)
    {
        $this->setName($name);
    }

    /**
     * Cast to string
     *
     * @return string holded javascript expression.
     */
    public function __toString()
    {
        return "function() {" . $this->getName() . "}";
    }


    //====================================
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param array $params
     * @return self
     */
    public function setParams($params)
    {
        $this->params = $params;
        return $this;
    }
}