<?php
/**
 * Created by PhpStorm.
 * User: kota
 * Date: 29.10.17
 * Time: 13:09
 */
use Zend\Form as ZFormNS;
use FormDecorator\View\Helper as HelperNS;
use Zend\Form\Element as ElementNS;
use FormDecorator\Form\Element as FDElementNS;

return [
    'FormElementDecorators' => [
        'decoratorBranch' => [
            'default' => [
                ZFormNS\Form::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/list'] ],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/form'] ],
                ],
                ZFormNS\Fieldset::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/list-label'] ],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/fieldset'] ],
                ],
                ElementNS\Collection::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/list-label'] ],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/template'] ],
                    //[ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/collection'] ],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/fieldset'] ],
                ],
                ElementNS\Text::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/text'] ],
                ],
                ElementNS\Textarea::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/textarea'] ],
                ],
                ElementNS\Select::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/select'] ],
                ],
                ElementNS\Radio::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/radio'] ],
                ],
                ElementNS\Checkbox::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/checkbox'] ],
                ],
                ElementNS\Hidden::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/hidden'] ],
                ],
                ElementNS\Submit::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/submit'] ],
                ],
                ElementNS\Button::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/button'] ],
                ],
                ElementNS\Password::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/password'] ],
                ],
                ElementNS\Date::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/date'] ],
                ],
                ElementNS\DateTime::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/date'] ],
                ],
                ElementNS\Image::class => [
                    ['name' => HelperNS\FormElementView::class, 'options' => ['template' => '/FormElementDecorators/default/image']],
                ],
                FDElementNS\InlineFieldset::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [
                        'template' => '/FormElementDecorators/default/list-label'
                    ]],
                ],
            ],
        ]
    ]
];