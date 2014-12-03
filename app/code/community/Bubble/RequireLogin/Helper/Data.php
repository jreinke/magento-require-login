<?php
/**
 * @category    Bubble
 * @package     Bubble_RequireLogin
 * @version     1.0.0
 * @copyright   Copyright (c) 2014 BubbleShop (https://www.bubbleshop.net)
 */
class Bubble_RequireLogin_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function isLoginRequired($store = null)
    {
        return Mage::getStoreConfigFlag('bubble_requirelogin/startup/require_login', $store);
    }

    public function getWhitelist($store = null)
    {
        return Mage::getStoreConfig('bubble_requirelogin/startup/require_login_whitelist', $store);
    }
}