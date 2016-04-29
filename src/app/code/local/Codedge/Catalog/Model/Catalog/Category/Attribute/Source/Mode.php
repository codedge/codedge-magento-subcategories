<?php

class Codedge_Catalog_Model_Catalog_Category_Attribute_Source_Mode
    extends Mage_Catalog_Model_Category_Attribute_Source_Mode
{
    /**
     * Set a new display mode for categories
     */
    public function getAllOptions()
    {
        $options = parent::getAllOptions();

        $options[] = array(
                'value' => Codedge_Catalog_Model_Catalog_Category::DM_SUBCATEGORY,
                'label' => Mage::helper('codedge_catalog')->__('Subcategories only'),
        );

        $this->_options = $options;

        return $this->_options;
    }
}