<?php
/**
 * Created by PhpStorm.
 * User: kota
 * Date: 29.10.17
 * Time: 13:20
 */
use Zend\Form as ZFormNS;
use FormDecorator\View\Helper as HelperNS;
use Zend\Form\Element as ElementNS;
use FormDecorator\Form\Element as FDElementNS;

return [
    'FormElementDecorators' => [
        'decoratorBranch' => [
            'minimal' => [
                ZFormNS\Form::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/minimal/form'] ],
                ],
                ElementNS\Text::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/minimal/text'] ],
                ],
                ElementNS\Select::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/minimal/select'] ],
                ],
                ElementNS\Radio::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/minimal/radio'] ],
                ],
            ],
        ],
    ],
];
