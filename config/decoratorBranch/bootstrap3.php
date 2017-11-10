<?php
/**
 * Created by PhpStorm.
 * User: kota
 * Date: 29.10.17
 * Time: 20:55
 */
use Zend\Form as ZFormNS;
use FormDecorator\View\Helper as HelperNS;
use Zend\Form\Element as ElementNS;
use FormDecorator\Form\Element as FDElementNS;

return [
    'FormElementDecorators' => [
        'decoratorBranch' => [
            'bootstrap3' => [
                ZFormNS\Form::class => [
                    'list' => [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/list'] ],
                    'form-wrap' =>[ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap3/form-wrap'] ],
                ],
                ElementNS\Collection::class => [
                    ['name' => HelperNS\FormElementView::class, 'options' => [
                        'template' => '/FormElementDecorators/default/list',
                        'branch' => 'bootstrap_row'
                    ]],
                ],
                ZFormNS\Fieldset::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/list']],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap3/fieldset']],
                ],
                ElementNS\Text::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap3/row',
                        'label_class' => 'control-label col-sm-3 ',
                        'body_class' => 'col-sm-9',
                        ]
                    ],
                ],
                ElementNS\Textarea::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap3/row',
                        'label_class' => 'control-label col-sm-3 ',
                        'body_class' => 'col-sm-9',
                        ]
                    ],
                ],
                ElementNS\Select::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap3/row',
                        'label_class' => 'control-label col-sm-3 ',
                        'body_class' => 'col-sm-9',
                        ]
                    ],
                ],
                ElementNS\Radio::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap3/row_radio',
                        'label_class' => 'control-label col-sm-3 ',
                        'body_class' => 'col-sm-9',
                        ]
                    ],
                ],
                ElementNS\Password::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap3/row',
                        'label_class' => 'control-label col-sm-3 ',
                        'body_class' => 'col-sm-9',
                        ]
                    ],
                ],
                ElementNS\Hidden::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap/row-hidden'] ],
                ],
                ElementNS\Submit::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/submit']],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap/row-colspan'] ],
                ],
                ElementNS\Button::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/button']],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap/row-colspan'] ],
                ],
                ElementNS\Date::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap3/row',
                        'label_class' => 'control-label col-sm-3 ',
                        'body_class' => 'col-sm-9',
                        ]
                    ],
                ],
                ElementNS\DateTime::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap3/row',
                        'label_class' => 'control-label col-sm-3 ',
                        'body_class' => 'col-sm-9',
                        ]
                    ],
                ],
                ElementNS\Image::class => [
                    ['name' => HelperNS\FormElementView::class, 'options' => [
                        'template' => '/FormElementDecorators/bootstrap3/row',
                        'label_class' => 'control-label col-sm-3 ',
                        'body_class' => 'col-sm-9',
                    ]],
                ],
                FDElementNS\ExternalSelect::class => [
                    ['name' => HelperNS\FormElementView::class, 'options' => [
                        'template' => '/FormElementDecorators/bootstrap3/row',
                        'branch' => 'bootstrap_default',
                        'label_class' => 'control-label col-sm-3 ',
                        'body_class' => 'col-sm-9',
                    ]],
                ],
                FDElementNS\ExternalSelectMulti::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap/externalSelectMulti'] ],
                ],
                FDElementNS\InlineFieldset::class => [
                    //[ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/list']],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [
                        'template' => '/FormElementDecorators/bootstrap3/row',
                        'label_class' => 'control-label col-sm-3 ',
                        'body_class' => 'col-sm-9',
                    ]],
                ],
            ],
        ],
    ],
];