<?php
/**
 * Created by PhpStorm.
 * User: kota
 * Date: 29.10.17
 * Time: 13:27
 */
use Zend\Form as ZFormNS;
use FormDecorator\View\Helper as HelperNS;
use Zend\Form\Element as ElementNS;
use FormDecorator\Form\Element as FDElementNS;

return [
    'FormElementDecorators' => [
        'decoratorBranch' => [
            'jqGrid' => [
                \FormDecorator\Form\SubGridForm::class => [
                    [ 'name' => HelperNS\JqGrid\ColModel::class ],
                    [ 'name' => HelperNS\JqGrid\Params::class ],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/jqgrid/subgrid-function'] ],
                ],
                ZFormNS\Form::class => [
                    [ 'name' => HelperNS\JqGrid\ColModel::class ],
                    [ 'name' => HelperNS\JqGrid\Params::class ],
                    [ 'name' => HelperNS\JqGrid\SubGrid::class ],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/jqgrid/grid-function'] ],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/jqgrid/grid'] ],
                ],
                ElementNS\Text::class => [
                    [ 'name' => HelperNS\JqGrid\ColModel\Text::class ],
                ],
                ElementNS\Textarea::class => [
                    [ 'name' => HelperNS\JqGrid\ColModel\TextArea::class ],
                ],
                ElementNS\Select::class => [
                    [ 'name' => HelperNS\JqGrid\ColModel\Select::class ],
                ],
                ElementNS\Radio::class => [
                    [ 'name' => HelperNS\JqGrid\ColModel\Text::class ],
                ],
                ElementNS\Hidden::class => [
                    [ 'name' => HelperNS\JqGrid\ColModel\Hidden::class ],
                ],
                ElementNS\Checkbox::class => [
                    [ 'name' => HelperNS\JqGrid\ColModel\Checkbox::class ],
                ],
                ElementNS\Date::class => [
                    [ 'name' => HelperNS\JqGrid\ColModel\Date::class],
                ],
                ElementNS\DateTime::class => [
                    [ 'name' => HelperNS\JqGrid\ColModel\DateTime::class],
                ]
            ],
        ],
    ],
];
