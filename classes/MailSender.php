<?php

class Barcode extends ObjectModel
{
    public $id;
    public $number;
    public $id_product;
    public $id_product_attribute;
    public $id_order;
    public $date;

   
    /**
     * Generate new barcode object and throw it in db
     * Note: Do not set id_product and id_order in same time
     * 
     * @static
     * @access public
     * @param int $id_product
     * @param int $id_order
     * @param string $number Barcode number (if not defined, generate it)
     * @return \self
     */
    static public function generate($number = null, $id_product = null, $id_product_attribute = null, $id_order = null)
    {
        if (isset($id_product))
            $type_digit = 1;
        else $type_digit = 2;
        
        if(isset($id_product) && !isset($id_product_attribute))
            $id_product_attribute = 0;
        
        $barcode = new self();
        $barcode->number = empty($number) ? self::generateNumber($type_digit) : $number;
        $barcode->id_product = $id_product;
        $barcode->id_product_attribute = $id_product_attribute;
        $barcode->id_order = $id_order;
        $barcode->saveBarcode();
        
        //TODO: Generate picture associated to number and decline to different size
        foreach (self::$SIZES as $name => $size)
        {
            //TODO: Generate and save picture here
        }
        
        return $barcode;
    }
}


