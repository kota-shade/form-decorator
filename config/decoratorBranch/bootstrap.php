<?php
/**
 * Created by PhpStorm.
 * User: kota
 * Date: 29.10.17
 * Time: 13:12
 */
use Zend\Form as ZFormNS;
use FormDecorator\View\Helper as HelperNS;
use Zend\Form\Element as ElementNS;
use FormDecorator\Form\Element as FDElementNS;

return [
    'FormElementDecorators' => [
        'decoratorBranch' => [
            'bootstrap' => [
                ZFormNS\Form::class => [
                    'list' => [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/list'] ],
                    'form-wrap' =>[ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap/form-wrap'] ],
                ],
                ElementNS\Collection::class => [
                    ['name' => HelperNS\FormElementView::class, 'options' => [
                        'template' => '/FormElementDecorators/default/list',
                        'branch' => 'bootstrap_row'
                    ]],
                ],
                ZFormNS\Fieldset::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/list']],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap/fieldset']],
                ],
                ElementNS\Text::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap/row'] ],
                ],
                ElementNS\Select::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap/row'] ],
                ],
                ElementNS\Radio::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap/row'] ],
                ],
                ElementNS\Password::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap/row'] ],
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
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap/row'] ],
                    //[ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/table/row-date'] ],
                ],
                ElementNS\DateTime::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap/row'] ],
                    //[ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/table/row-date'] ],
                ],
                ElementNS\Image::class => [
                    ['name' => HelperNS\FormElementView::class, 'options' => ['template' => '/FormElementDecorators/bootstrap/row']],
                ],
                FDElementNS\ExternalSelect::class => [
                    ['name' => HelperNS\FormElementView::class, 'options' => [
                        'template' => '/FormElementDecorators/bootstrap/row',
                        'branch' => 'bootstrap_default'
                    ]],
                ],
                FDElementNS\ExternalSelectMulti::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap/externalSelectMulti'] ],
                ],
            ],
        ],
    ],
];