<?php

class JR_RequireLogin_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function isLoginRequired($store = null)
    {
        return Mage::getStoreConfigFlag('customer/startup/require_login', $store);
    }

    public function getWhitelist($store = null)
    {
        return Mage::getStoreConfig('customer/startup/require_login_whitelist', $store);
    }
}