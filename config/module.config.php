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
            HelperNS\FormElementBranch::class => HelperNS\FormElementBranchFactory::class,
            HelperNS\FormElementView::class => HelperNS\FormElementViewFactory::class,
            HelperNS\JqGrid\Params::class => HelperNS\JqGrid\ParamsFactory::class,
            HelperNS\JqGrid\ColModel::class => HelperNS\JqGrid\ColModelFactory::class
        ],
        'invokables' => [
            HelperNS\JqGrid\ColModel\Text::class => HelperNS\JqGrid\ColModel\Text::class,
            HelperNS\JqGrid\ColModel\Select::class => HelperNS\JqGrid\ColModel\Select::class,
            HelperNS\JqGrid\ColModel\Hidden::class => HelperNS\JqGrid\ColModel\Hidden::class,
            HelperNS\JqGrid\ColModel\Checkbox::class => HelperNS\JqGrid\ColModel\Checkbox::class,
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
            ],
            'bootstrap' => [
                ZFormNS\Form::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/list'] ],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/form'] ],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap/form-wrap'] ],
                ],
                ElementNS\Collection::class => [
                    ['name' => HelperNS\FormElementView::class, 'options' => [
                            'template' => '/FormElementDecorators/default/list',
                            'branch' => 'bootstrap_row'
                    ]],
                ],
                ZFormNS\Fieldset::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/list']],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/bootstrap/panel-fieldset']],
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
                ],
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
                ],
                ElementNS\Password::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/table/row'] ],
                ],
                ElementNS\Hidden::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/table/row-hidden'] ],
                ],
                ElementNS\Submit::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/submit']],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/table/row-colspan'] ],
                ],
                ElementNS\Button::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/button']],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/table/row-colspan'] ],
                ],
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
                ],
                ElementNS\Hidden::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/default/hidden'] ],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [
                        'template' => '/FormElementDecorators/table/tag', 'tag' => 'td',
                        'style' => 'display:none; border:1px solid #000;',
                    ]],
                ]
            ],
            'jqGrid' => [
                ZFormNS\Form::class => [
                    [ 'name' => HelperNS\JqGrid\ColModel::class ],
                    [ 'name' => HelperNS\JqGrid\Params::class ],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/jqgrid/grid-function'] ],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/jqgrid/grid'] ],
                ],
                ElementNS\Text::class => [
                    [ 'name' => HelperNS\JqGrid\ColModel\Text::class ],
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
            ],
            'jqGrid1' => [
                ZFormNS\Form::class => [
                    [ 'name' => HelperNS\JqGrid\Params::class ],
                    [ 'name' => HelperNS\JqGrid\ColModel::class ],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/jqgrid1/grid-function'] ],
                    //[ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/jqgrid/grid-function'] ],
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/jqgrid1/grid'] ],
                ],
                ZFormNS\Fieldset::class => [
                    [ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/jqgrid1/list-col-model'] ],
                ],
                ElementNS\Text::class => [
                    [ 'name' => HelperNS\JqGrid\ColModel\Text::class ],
                    //[ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/jqgrid/col-model-text'] ],
                ],
                ElementNS\Select::class => [
                    [ 'name' => HelperNS\JqGrid\ColModel\Text::class ],
                    //[ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/jqgrid/col-model-text'] ],
                ],
                ElementNS\Radio::class => [
                    [ 'name' => HelperNS\JqGrid\ColModel\Text::class ],
                    //[ 'name' => HelperNS\FormElementView::class, 'options' => [ 'template' => '/FormElementDecorators/jqgrid/col-model-text'] ],
                ],
            ],
        ]
    ],
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
];