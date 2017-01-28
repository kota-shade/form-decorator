<?php
namespace FormDecorator;

use FormDecorator\View\Helper as HelperNS;
use Zend\Form\Element as ElementNS;
use Zend\Form\View\Helper as ZendElementHelperNS;
use Zend\View\Helper as ViewHelperNS;
use Zend\Form as ZFormNS;

return [
    'view_helpers' => [
        'aliases' => [
            'formBranchRender' => HelperNS\FormElementBranch::class,
            'formElementView' => HelperNS\FormElementView::class
        ],
        'factories' => [
            HelperNS\FormElementBranch::class => function ($serviceManager) {
                $configKey = 'FormElementDecorators';
                $parentServiceLocator = $serviceManager->getServiceLocator();
                $config = $parentServiceLocator->get('config');

                if (array_key_exists($configKey, $config) == false) {
                    throw new \InvalidArgumentException('missing config section '. $configKey);
                }
                return new HelperNS\FormElementBranch($serviceManager, $config[$configKey]);
            },
            HelperNS\FormElementView::class => function ($serviceManager) {
                $configKey = 'FormElementDecorators';
                $parentServiceLocator = $serviceManager->getServiceLocator();
                $config = $parentServiceLocator->get('config');

                if (array_key_exists($configKey, $config) == false) {
                    throw new \InvalidArgumentException('missing config section '. $configKey);
                }
                return new HelperNS\FormElementView($serviceManager, $config[$configKey]);
            },
        ],
        'shared' => [
        ]
    ],
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
                    [ 'name' => ZendElementHelperNS\FormInput::class ],
                ],
                ElementNS\Select::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/select'] ],
                ],
                ElementNS\Radio::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/radio'] ],
                ]
            ],
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
                ]
            ],
            'table' => [
                ZFormNS\Form::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/list'] ],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/table/table'] ],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/form'] ],
                ],
                ElementNS\Collection::class => [
                    ['name' => HelperNS\FormElementView::class, 'options' => [
                            'template' => '/FormElementDecorators/default/list',
                            'branch' => 'table_tr'
                    ]],
                    //[ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/table/row-fieldset']],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/table/row-collection']],
                    //[ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/collection'] ],
                ],
                ZFormNS\Fieldset::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/list']],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/table/row-fieldset']],
                ],
                ElementNS\Text::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/table/row'] ],
                ],
                ElementNS\Select::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/table/row'] ],
                ],
                ElementNS\Radio::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/table/row'] ],
                ]
            ],
            'table_tr' => [
                ZFormNS\Fieldset::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/list']],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [
                        'template' => '/FormElementDecorators/table/tag', 'tag' => 'tr'
                    ]],
                ],
                ElementNS\Text::class => [
                    [ 'name' => ZendElementHelperNS\FormInput::class ],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [
                        'template' => '/FormElementDecorators/table/tag', 'tag' => 'td',
                        'style' => 'border:1px solid #000;',
                    ]],
                ],
                ElementNS\Select::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/select'] ],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [
                        'template' => '/FormElementDecorators/table/tag', 'tag' => 'td',
                        'style' => 'border:1px solid #000;',
                    ]],
                ],
                ElementNS\Radio::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/radio'] ],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [
                        'template' => '/FormElementDecorators/table/tag', 'tag' => 'td',
                        'style' => 'border:1px solid #000;',
                    ]],
                ]
            ]
        ]
    ],
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
];