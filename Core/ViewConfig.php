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


namespace WeaItSolutions\Oxid\AssetsManagement\Core;


class ViewConfig extends ViewConfig_parent
{
    /**
     * Returns external cdn url if is one defined.
     *
     * @param $sModule
     * @param string $sFile
     * @return mixed
     */
    public function getModuleUrl($sModule, $sFile = '')
    {
        if (!$this->isAdmin() && $this->getConfig()->getConfigParam('wea_assets_mgnt_cdn')) {
            $sUrl = str_replace(
                rtrim($this->getConfig()->getConfigParam('sShopDir'), '/'),
                rtrim($this->getConfig()->getConfigParam('wea_assets_mgnt_cdn'), '/'),
                $this->getModulePath($sModule, $sFile)
            );
        } else {
            $sUrl = parent::getModuleUrl($sModule, $sFile);
        }

        return $sUrl;

    }

    /**
     * @param null $sFile
     * @return mixed
     */
    public function getResourceUrl($sFile = null)
    {
        if (!$sFile && !$this->isAdmin() && $this->getViewConfigParam('basetpldir') === null) {
            if ($sCdnUri = $this->getConfig()->getConfigParam('wea_assets_mgnt_cdn')) {
                $sValue = $this->getConfig()->getResourceUrl('', $this->isAdmin());

                if ($this->getConfig()->getConfigParam('blNativeImages')) {
                    $sCurrentUrl = $this->getConfig()->getSslShopUrl();
                } else {
                    $sCurrentUrl = $this->getConfig()->getConfigParam('sSSLShopURL');
                }

                $sValue = str_replace($sCurrentUrl, $sCdnUri, $sValue);
                $this->setViewConfigParam('basetpldir', $sValue);
            }
        }

        return parent::getResourceUrl($sFile);

    }
}