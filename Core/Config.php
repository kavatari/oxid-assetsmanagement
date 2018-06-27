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

class Config extends Config_parent
{
    /**
     * Returns cdn url if configured.
     *
     * @param null $ssl
     * @param null $admin
     * @param bool $nativeImg
     * @return mixed
     */
    public function getOutUrl($ssl = null, $admin = null, $nativeImg = false)
    {
        $sParentOutUrl = parent::getOutUrl($ssl, $admin, $nativeImg);
        $admin = is_null($admin) ? $this->isAdmin() : $admin;
        $ssl = is_null($ssl) ? $this->isSsl() : $ssl;
        $sCdnUrl = $this->getConfig()->getConfigParam('wea_assets_mgnt_cdn');
        if(!$admin && $sCdnUrl){
            $sShopUrl = $this->getConfigParam('sShopURL');
            if($ssl){
                $sShopUrl = $this->getConfigParam('sSSLShopURL');
            }

            return str_replace(rtrim($sShopUrl, '/'), rtrim($sCdnUrl, '/'), $sParentOutUrl);
        }

        return $sParentOutUrl;
    }
}