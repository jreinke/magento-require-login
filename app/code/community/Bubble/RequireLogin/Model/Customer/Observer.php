<?php
/**
 * @category    Bubble
 * @package     Bubble_RequireLogin
 * @version     1.0.0
 * @copyright   Copyright (c) 2014 BubbleShop (https://www.bubbleshop.net)
 */
class Bubble_RequireLogin_Model_Customer_Observer
{
    public function requireLogin($observer)
    {
        $helper = Mage::helper('bubble_requirelogin');
        $session = Mage::getSingleton('customer/session');

        if (!$session->isLoggedIn() && $helper->isLoginRequired()) {
            $controllerAction = $observer->getEvent()->getControllerAction();
            /* @var $controllerAction Mage_Core_Controller_Front_Action */
            $requestString = $controllerAction->getRequest()->getRequestString();

            if (!preg_match($helper->getWhitelist(), $requestString)) {
                // If logging in from the homepage, the only way back is using the Magento internal homepage path. Magento ignores a setBeforeAuthUrl with the site base URL
                if (Mage::helper('core/url')->getCurrentUrl() == Mage::getBaseUrl()) {
                    $session->setBeforeAuthUrl(Mage::getUrl('*/*/*', array('_current' => true)));
                } else {
                    $session->setBeforeAuthUrl(Mage::helper('core/url')->getCurrentUrl());
                }

                $controllerAction->getResponse()->setRedirect(Mage::getUrl('customer/account/login'));
                $controllerAction->getResponse()->sendResponse();
                exit;
            }
        }
    }
}