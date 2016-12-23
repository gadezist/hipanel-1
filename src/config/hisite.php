<?php

/*
 * AHnames implementation of HiPanel
 *
 * @link      https://ahnames.com/
 * @package   hipanel
 * @license   proprietary
 * @copyright Copyright (c) 2015-2016, AHnames (https://ahnames.com/)
 */

return [
    'components' => [
        'themeManager' => [
            'assets' => [
                \ahnames\hipanel\assets\ProjectAsset::class,
                \ahnames\assets\ahnames\AhnamesAsset::class,
            ],
        ],
        'i18n' => [
            'translations' => [
                'ahnames:hipanel' => [
                    'class' => \yii\i18n\PhpMessageSource::class,
                    'basePath' => '@ahnames/hipanel/messages',
                ],
            ],
        ],
    ],
    'container' => [
        'definitions' => [
            \hiqdev\thememanager\menus\AbstractSidebarMenu::class => [
                'add' => [
                    'old-panel' => [
                        'menu' => \ahnames\hipanel\menus\OldPanelMenu::class,
                        'where' => 'last',
                    ],
                ],
            ],
        ],
    ],
];
