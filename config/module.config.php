<?php
namespace FormDecorator;

use FormDecorator\View\Helper as HelperNS;
use Zend\Form\Element as ElementNS;
use Zend\Form\View\Helper as ZendElementHelperNS;
use Zend\View\Helper as ViewHelperNS;

return [
    'view_helpers' => [
        'aliases' => [
            'formDecorator' => HelperNS\FormElementDecorator::class,
        ],
        'factories' => [
            HelperNS\FormElementDecorator::class => function ($serviceManager) {
                $configKey = 'FormElementDecorators';
                $parentServiceLocator = $serviceManager->getServiceLocator();
                $config = $parentServiceLocator->get('config');

                if (array_key_exists($configKey, $config) == false) {
                    throw new \InvalidArgumentException('missing config section '. $configKey);
                }
                return new HelperNS\FormElementDecorator($serviceManager, $config[$configKey]);
            },
        ],
        'shared' => [
        ]
    ],
    'FormElementDecorators' => [
        'decoratorBranch' => [
            'default' => [
                \Zend\Form\Form::class => [
                    '/FormElementDecorators/default/form',
                ],
                \Zend\Form\Fieldset::class => [
                    '/FormElementDecorators/default/fieldset',
                ],
                ElementNS\Text::class => [
                    '/FormElementDecorators/default/text',
                ],
                ElementNS\Select::class => [
                    '/FormElementDecorators/default/select',
                ],
                ElementNS\Radio::class => [
                    '/FormElementDecorators/default/radio',
                ]
            ],
            'minimal' => [
                \Zend\Form\Form::class => [
                    '/FormElementDecorators/minimal/form',
                ],
                ElementNS\Text::class => [
                    '/FormElementDecorators/minimal/text',
                ],
                ElementNS\Select::class => [
                    '/FormElementDecorators/minimal/select',
                ],
                ElementNS\Radio::class => [
                    '/FormElementDecorators/minimal/radio',
                ]
            ]
        ]
    ],
    'view_manager' => array(
//        'template_map' => array(
//            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
//            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
//            'error/404'               => __DIR__ . '/../view/error/404.phtml',
//            'error/index'             => __DIR__ . '/../view/error/index.phtml',
//        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
];