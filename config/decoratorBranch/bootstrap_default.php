<?php
/**
 * Created by PhpStorm.
 * User: kota
 * Date: 29.10.17
 * Time: 13:14
 */
use Zend\Form as ZFormNS;
use FormDecorator\View\Helper as HelperNS;
use Zend\Form\Element as ElementNS;
use FormDecorator\Form\Element as FDElementNS;

return [
    'FormElementDecorators' => [
        'decoratorBranch' => [
            'bootstrap_default' => [
                FDElementNS\ExternalSelect::class => [
                    ['name' => HelperNS\FormElementView::class, 'options' => ['template' => '/FormElementDecorators/bootstrap_default/externalSelect']],
                ],
            ],
        ],
    ],
];