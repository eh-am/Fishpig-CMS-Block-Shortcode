<?php
/*
All extended shortcode class are extended from the helper class - Fishpig_Wordpress_Helper_Shortcode_Abstract 

There are two abstract functions you must implement

public function getTag() 

this functions defines [tagname].



protected function _apply(&$content, Fishpig_Wordpress_Model_Post_Abstract $object)

this function is the tag renderer. 

*/
class Demac_FishpigExtension_Helper_Shortcode_GCB extends Fishpig_Wordpress_Helper_Shortcode_Abstract
{
    /**
     * 'contentblock' is the tagname for GCB in wordpress, so I follows for compatibility.
     */
    public function getTag()
    {
        return 'magento_cms_block ';
    }

    protected function _apply(&$content, Fishpig_Wordpress_Model_Post_Abstract $object)
    {
        if (($shortcodes = $this->_getShortcodes($content)) !== false) {

            // /* Add multisite support */
            // $dbhelper = Mage::helper('wordpress/database');
            // $multihelper = null;
            // $blogId = '';
            // if(Mage::getStoreConfigFlag('wordpress/mu/enabled')) {
            //     $multihelper = Mage::helper('wordpressmu');
            //     $blogId = $multihelper->getBlogId();
            // }
            // $tbname = Mage::helper('wordpress/database')->getTablePrefix().$blogId.self::GCB_TABLE;
            // /* End - Add multisit support */

            $ra = $dbhelper->getReadAdapter();

            foreach($shortcodes as $shortcode) {
                $id = $shortcode->getParams()->getId();

                var_dump($shortcode);
                return;
                
                $select = $ra->select();
                $select->from($tbname);
                
                if(is_numeric($id)) {
                    $select->where('id = ?', intval($id));
                } else {
                    $select->where('custom_id = ?', $id);
                }

                $rc = $ra->fetchAll($select);

                if(!empty($rc)) {
                    $content = str_replace($shortcode->getOpeningTag(), sprintf('<div class="gcd gcd-%s">%s</div>',$id,$rc[0]['value']), $content);
                }
            }
        }
    }
}