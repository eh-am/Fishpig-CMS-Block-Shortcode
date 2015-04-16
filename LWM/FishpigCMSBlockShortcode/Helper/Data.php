<?php

class LWM_FishpigCMSBlockShortcode_Helper_Data extends Fishpig_Wordpress_Helper_Shortcode_Abstract
{
    public function getTag()
    {
        return 'magento_cms_block';
    }

    
    protected function _apply(&$content,
                              Fishpig_Wordpress_Model_Post_Abstract $object)
    {
        if (($shortcodes = $this->_getShortcodes($content)) !== false) {
             foreach($shortcodes as $it => $shortcode) {
                $params = $shortcode->getParams();

                if (isset($params['id']) && strlen($params['id']) > 0){
                    $cms_block_id = $params['id'];
                } else { return; }
                            
                $cms_block = Mage::app()->getLayout()
                                        ->createBlock('cms/block')
                                        ->setBlockId($cms_block_id)
                                        ->toHtml();            

                $cms_block = htmlspecialchars_decode($cms_block);

                $content = str_replace($shortcode->getHtml(),
                                       $cms_block,
                                       $content);

            }
        }
    }

}