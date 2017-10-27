<?php
/**
 * Created by PhpStorm.
 * User: kota
 * Date: 01.02.17
 * Time: 4:40
 */

namespace FormDecorator\View\Helper\JqGrid\ColModel;

use Zend\Json\Expr;

class SelectOptions extends Expr
{
    private $opt = [];
    private $delimiter;
    private $separator;

    public function __construct($opt = array(), $delimiter = '||', $separator = '::') {
        $this->opt = $opt;
        $this->delimiter = $delimiter;
        $this->separator = $separator;
    }

    public function __toString() {
        $ret = $this->getValue();
        return '"' . $ret . '"';
    }

    public function getValue()
    {
        $res = [];
        foreach($this->opt as $k => &$v) {
            if (is_array($v)) {
                $res[] = sprintf("%s%s%s", $v['value'], $this->separator, $v['label']);
            } else {
                $res[] = sprintf("%s%s%s", $k, $this->separator, $v);
            }
        }
        $ret = implode($this->delimiter, $res);
        return $ret;
    }

}