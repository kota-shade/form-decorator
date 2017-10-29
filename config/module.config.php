<?php
namespace FormDecorator;

use FormDecorator\View\Helper as HelperNS;
use FormDecorator\Form\Element as FDElementNS;
use FormDecorator\Filter as FilterNS;
use Zend\Form\Element as ElementNS;
use Zend\Form\View\Helper as ZendElementHelperNS;
use Zend\View\Helper as ViewHelperNS;
use Zend\Form as ZFormNS;

$assets = include(__DIR__ . '/assetic.config.php');

return array_merge(
    $assets,
    [
    'view_helpers' => [
        'aliases' => [
            'formBranchRender' => HelperNS\FormElementBranch::class,
            'formElementView' => HelperNS\FormElementView::class,
            'collectionButtonsSpec' => HelperNS\CollectionButtonsSpec::class,
        ],
        'factories' => [
            HelperNS\FormElementBranch::class => HelperNS\FormElementBranchFactory::class,
            HelperNS\FormElementView::class => HelperNS\FormElementViewFactory::class,
            HelperNS\JqGrid\Params::class => HelperNS\JqGrid\ParamsFactory::class,
            HelperNS\JqGrid\ColModel::class => HelperNS\JqGrid\ColModelFactory::class,
            HelperNS\JqGrid\SubGrid::class => HelperNS\JqGrid\SubGridFactory::class,
        ],
        'invokables' => [
            HelperNS\JqGrid\ColModel\Text::class => HelperNS\JqGrid\ColModel\Text::class,
            HelperNS\JqGrid\ColModel\TextArea::class => HelperNS\JqGrid\ColModel\TextArea::class,
            HelperNS\JqGrid\ColModel\Select::class => HelperNS\JqGrid\ColModel\Select::class,
            HelperNS\JqGrid\ColModel\Hidden::class => HelperNS\JqGrid\ColModel\Hidden::class,
            HelperNS\JqGrid\ColModel\Checkbox::class => HelperNS\JqGrid\ColModel\Checkbox::class,
            HelperNS\JqGrid\ColModel\Date::class => HelperNS\JqGrid\ColModel\Date::class,
            HelperNS\JqGrid\ColModel\DateTime::class => HelperNS\JqGrid\ColModel\DateTime::class,
            HelperNS\CollectionButtonsSpec::class => HelperNS\CollectionButtonsSpec::class,
        ],
        'shared' => [
        ]
    ],
    'filters' => [
            'invokables' => [
                FilterNS\StringToArray::class => FilterNS\StringToArray::class,
                FilterNS\ArrayValueJsonDecode::class => FilterNS\ArrayValueJsonDecode::class,
            ],
        ],
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
]);