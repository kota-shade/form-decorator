<?php
/**
 * Created by PhpStorm.
 * User: kota
 * Date: 02.07.17
 * Time: 12:05
 */

namespace FormDecorator\Form\Element;

use Zend\Form\Element\Collection;

class CollectionTable extends Collection
{
    protected $attributes = [
        'type' => 'collection-table'
    ];
} 