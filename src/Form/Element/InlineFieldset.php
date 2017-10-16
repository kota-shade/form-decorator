<?php
/**
 * Created by PhpStorm.
 * User: kota
 * Date: 06.07.17
 * Time: 23:35
 */

namespace FormDecorator\Form\Element;

use Zend\Form\Fieldset;

class InlineFieldset extends Fieldset
{
    protected $attributes = [
        'type' => 'inline-fieldset'
    ];
}