<?php
/**
 * This file is part of WEA IT-Solutions wea_assets_management module.
 *
 * WEA IT-Solutions wea_assets_management module is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * WEA IT-Solutions wea_assets_management module is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with WEA IT-Solutions wea_assets_management module.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link http://www.wea-it.com
 * @copyright (C) WEA IT-Solutions 2018
 */

// Metadata version.
$sMetadataVersion = '2.0';

$aModule = array(
    'id' => 'wea_assets_management',
    'title' => 'WEA IT-Solutions: Assets Management',
    'description' => array(
        'de' => file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '/translations/de/description.html'),
        'en' => file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '/translations/en/description.html'),
    ),
    'thumbnail' => 'wea-it-solutions.png',
    'version' => '1.0',
    'author' => 'WEA IT-Solutions',
    'url' => 'http://www.wea-it.com/',
    'email' => 'info@wea-it.com',
    'extend' => array(
        \OxidEsales\Eshop\Core\ViewConfig::class => \WeaItSolutions\Oxid\AssetsManagement\Core\ViewConfig::class,
        \OxidEsales\Eshop\Core\Config::class => \WeaItSolutions\Oxid\AssetsManagement\Core\Config::class
    ),
    'controllers' => array(),
    // Events.
    'events' => array(),
    'templates' => array(),
    'blocks' => array(),
    // Module settings.
    'settings' => array(
        array(
            'group' => 'wea_assets_mgnt_general',
            'name' => 'wea_assets_mgnt_cdn',
            'type' => 'str',
        ),
    ),
);