<?php
/**
 * Magmodules.eu - http://www.magmodules.eu
 *
 * NOTICE OF LICENSE
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to info@magmodules.eu so we can send you a copy immediately.
 *
 * @category      Magmodules
 * @package       Magmodules_Sooqr
 * @author        Magmodules <info@magmodules.eu>
 * @copyright     Copyright (c) 2018 (http://www.magmodules.eu)
 * @license       http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Magmodules_Sooqr_Block_Adminhtml_Widget_Info_Info
    extends Mage_Adminhtml_Block_Abstract implements Varien_Data_Form_Element_Renderer_Interface
{

    public function render(Varien_Data_Form_Element_Abstract $element)
    {
        $magentoVersion = Mage::getVersion();
        $moduleVersion = Mage::getConfig()->getNode()->modules->Magmodules_Sooqr->version;
        $logoLink = '//www.magmodules.eu/logo/sooqr/' . $moduleVersion . '/' . $magentoVersion . '/logo.png';

        $html = '<div style="background:url(\'' . $logoLink . '\') no-repeat scroll 15px center #EAF0EE;border:1px solid #CCCCCC;margin-bottom:10px;padding:10px 5px 5px 200px;">
          <h4>About Magmodules.eu</h4>
          <p>We are a Magento only E-commerce Agency located in the Netherlands.<br>
          <br />
          <table width="500px" border="0">
           <tr>
            <td width="58%">More Extensions from Magmodules:</td>
            <td width="42%">
             <a href="https://marketplace.magento.com/partner/Magmodules" target="_blank">
              Magento Marketplace
             </a>
             </td>
            </tr>
            <tr>
             <td>For Help:</td>
             <td><a href="https://www.magmodules.eu/support.html?ext=sooqr">Visit our Support Page</a></td>
            </tr>
            <tr>
             <td height="30">Visit Our Website:</td>
             <td><a href="http://www.magmodules.eu" target="_blank">www.magmodules.eu</a></td>
            </tr>' . $this->getSooqrRows() . '
            </table><br>
          <p class="icon-head head-sales-order"><strong>Read everything about the extension configuration in our <a href="https://www.magmodules.eu/help/sooqr" target="_blank">Knowledgebase</a></strong>.</p>    
          <p class="icon-head head-compilation">Perform a <strong><a href="#selftest">Selftest</a></strong> to check your setup through the selftest button on the Advanced tab of this configuration page.</p>   
          </div>';

        return $html;
    }

    /**
     * @return string
     */
    public function getSooqrRows()
    {
        $html = '';
        $accountId = Mage::getStoreConfig('sooqr_connect/general/account_id');
        $apiKey = Mage::getStoreConfig('sooqr_connect/general/api_key');
        $baseUrl = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB);

        if (empty($accountId) && empty($apiKey)) {
            $html .= '<tr>
             <td>Registration on Sooqr (and free trial):</td>
             <td><a href="https://my.sooqr.com/magtrial?base=' . $baseUrl . '" target="_blank">Register here</a></td>
            </tr>';
        } else {
            $html .= '<tr>
             <td>Sooqr Conversion Suite</td>
             <td><a href="https://my.sooqr.com/user/login" target="_blank">Login here</a></td>
            </tr>';
        }

        return $html;
    }

}