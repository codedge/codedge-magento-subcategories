<?php

class Codedge_Catalog_Model_Catalog_Category extends Mage_Catalog_Model_Category
{
    /**
     * New display mode for showing subcategories
     */
    const DM_SUBCATEGORY = 'SUBCATEGORY';

    /**
     * @param int $width
     * @param int $height
     * @param int $quality
     * @return bool|string
     */
    public function getResizedThumbnail($width=130, $height=130, $quality=100)
    {

        if (! $this->getThumbnail()) return false;

        $imageUrl = Mage::getBaseDir ( 'media' ) .DS .  "catalog" . DS . "category" . DS . $this->getThumbnail();
        if (! is_file ( $imageUrl )) return false;

        $imageResized = Mage::getBaseDir ( 'media' ) .DS . "catalog" . DS . "category" . DS . "cache" . DS . "cat_resized" . DS . $this->getThumbnail();

        if (! file_exists ( $imageResized ) && file_exists ( $imageUrl ) || file_exists($imageUrl) && filemtime($imageUrl) > filemtime($imageResized)) :

            $imageObj = new Varien_Image($imageUrl);
            $imageObj->constrainOnly ( true );
            $imageObj->keepAspectRatio ( true );
            $imageObj->keepFrame( false );
            $imageObj->keepTransparency( true );
            $imageObj->quality( $quality );
            $imageObj->resize( $width, $height );
            $imageObj->save( $imageResized );
        endif;

        if(file_exists($imageResized)){
            return Mage::getBaseUrl( 'media' ) . "catalog" . DS . "category" . DS . "cache" . DS . "cat_resized" . DS . $this->getThumbnail();
        }else{
            return $this->getThumbnail();
        }
    }
}