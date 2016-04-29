<?php

class Codedge_Catalog_Block_Category_View extends Mage_Catalog_Block_Category_View
{
    /**
     * Check if category display mode is "Subcategories only"
     *
     * @return bool
     */
    public function isSubcategoryMode()
    {
        return $this->getCurrentCategory()->getDisplayMode()==Codedge_Catalog_Model_Catalog_Category::DM_SUBCATEGORY;
    }

    /**
     * @return string
     */
    public function getSubcategoryHtml()
    {
        return $this->getChildHtml('category.subcategories');
    }
}