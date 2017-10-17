<?php
/**
 * Created by PhpStorm.
 * User: kota
 * Date: 10.02.17
 * Time: 18:24
 */

return [
    'assetic_configuration' => [
        'modules' => [
            'form-decorator' => [
                'root_path' => __DIR__ . '/../assets',
                'collections' => [
                    'form_decorator_externalSelect_js' => ['assets'=>[
                        'js/externalSelect.js'
                    ]],
                    'form_decorator_dialogUI_js' => ['assets'=>[
                        'js/dialogUI.js',
                        'js/dialogUIAjax.js',
                    ]],
                    'form_decorator_dialogBootstrap_js' => ['assets'=>[
                        'js/dialogBootstrap.js',
                    ]],
                    'form_decorator_externalSelect_css' => [
                        'assets' => [
                            'css/externalSelect.css'
                        ]
                    ],
                    'form_decorator_formTokenField_js' => [
                        'assets' => [
                            'js/form_tokenfield.js',
                        ]
                    ],
                    'form_decorator_formCollection_js' => [
                        'assets' => [
                            'js/form_collection.js',
                        ]
                    ],
                    'form_decorator_inlineFieldset_css' => [
                        'assets' => [
                            'css/inlineFieldset.css'
                        ],
                    ],
                    'form_decorator_jqgrid_formatters_js' => [
                        'assets' => [
                            'js/jqgridButtonFormatter.js',
                        ]
                    ],
                    'form_decorator_jqgrid_common_js' => ['assets' => [
                        'js/common.js'
                    ]],
                    'form_decorator_jqgrid_common_css' => ['assets' => [
                        'css/common.css'
                    ]],
                ],
            ],
        ],
    ]
];

