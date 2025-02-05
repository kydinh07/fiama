<?php

class ProductModel  extends Model
{

    public function TableFill()
    {
    }
    public function FieldFill()
    {
    }

    public function GetAllProduct()
    {
        $data = $this->db->Query("SELECT * FROM fiama.product")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function GetProductById($idProduct)
    {
        
        $data = $this->db->Query("SELECT * FROM fiama.product WHERE Id = $idProduct")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function GetProCategory($id)
    {
        $data = $this->db->Query("SELECT * FROM fiama.sub_category WHERE Id = $id")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function GetProductByCategory($categoryId)
    {
        if($categoryId == 0){
            $data = $this->db->Query("SELECT * FROM fiama.sub_category_product left join fiama.product on fiama.product.Id = fiama.sub_category_product.ProductId WHERE fiama.product.Status = 1 ")->fetchAll(PDO::FETCH_ASSOC);

        }else {

            $data = $this->db->Query("SELECT * FROM fiama.sub_category_product left join fiama.product on fiama.product.Id = fiama.sub_category_product.ProductId WHERE fiama.sub_category_product.SubCategoryId = $categoryId")->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
    public function GetListCategory()
    {
        $data = $this->db->Query("SELECT * FROM fiama.sub_category LIMIT 10")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function GetIdProduct($strPath)
    {
        $data = $this->db->Query("SELECT Id FROM fiama.product WHERE Path = '$strPath'")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function GetCategoryFromStringPathDetail($strPath)
    {
        $idProduct = $this->db->Query("SELECT Id FROM fiama.product WHERE Path = '$strPath'")->fetchAll(PDO::FETCH_ASSOC)[0]['Id'];
        $data = $this->db->Query("SELECT * FROM fiama.sub_category_product LEFT JOIN fiama.sub_category on sub_category.Id = sub_category_product.SubCategoryId  WHERE sub_category_product.ProductId = $idProduct")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function GetProduct($strPath)
    {
        $data = $this->db->Query("SELECT * FROM fiama.product WHERE Path = '$strPath'")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function GetRelatedProduct()
    {
        $data = $this->db->Query("SELECT * FROM fiama.product LIMIT 10 ")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function GetSubCategoryProductById($prodId)
    {
        $data = $this->db->Query("SELECT * FROM fiama.sub_category_product WHERE ProductId = $prodId")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function GetSubImgsProduct($prodId)
    {
        $data = $this->db->Query("SELECT * FROM fiama.sub_imgs_product WHERE product_id = $prodId ORDER BY thumb ASC")->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($data) || !$data)
        {
            return $data;
        }
        return [];
    }

    function SaveProduct($postData, $thumb_array = null)
    {
        //Save first image to server
        $absoluteProductImgPath = REAL_PATH . '/public/assets/clients/img/product/';
        if (isset($thumb_array[0])) {
            $firstImagePath = '/public/assets/clients/img/product/' . $thumb_array[0]['name'];
            if (!file_exists(REAL_PATH . "/public/assets/img/products/")) {
                mkdir(REAL_PATH . "/public/assets/img/products/", 0777, true);
            }
            if (move_uploaded_file($thumb_array[0]['tmp_name'], $absoluteProductImgPath . $thumb_array[0]['name'])) {
            } else {
                $_SESSION['error'] = "Upload Image Failed!";
                return false;
            }
        }


        $_SESSION['error'] = "";
        $arrProduct = [
            "Title" => $postData['Title'],
            "Price" => $postData['Price'],
            "SalePrice" => $postData['SalePrice'],
            "ShortDescription" => $postData['ShortDescription'],
            "Img" => isset($thumb_array[0]) ? $firstImagePath : "",
            // "Path" => $postData['Path'] ? $postData['Path'] : "",
            "Hot" => $postData['Hot'] ? $postData['Hot'] : "",
            // "Discount" => $postData['Discount'] ? $postData['Discount'] : 0,
            "SKU" => $postData['SKU'] ? $postData['SKU'] : "SKU TEST",
            "status" => 1
        ];

        //unset key Img if $thumb_array[0] = null
        if (!isset($thumb_array[0]))
        {
            unset($arrProduct['Img']);
        }

        if (isset($postData['productId']))    //edit
        {
            $isProdExist = $this->GetProductById($postData['productId']);
            if (!empty($isProdExist)) {
                //save product
                $data = $this->db->Update("fiama.product", $arrProduct, "Id=" . $postData['productId']);
                if ($data) {
                    //delete old sub cate product
                    $result = $this->DeleteOldSubCate($postData['productId']);
                    if (!$result) {
                        $_SESSION['error'] = "Delete old subCates error!";
                        return false;
                    }
                    //Save new thumbs
                    if ($thumb_array != null) {
                        $result = $this->SaveThumbs($thumb_array, $postData['productId'], $absoluteProductImgPath);
                        if (!$result) {
                            $_SESSION['error'] = "Save thumbs error!" . $_SESSION['error'];
                            return false;
                        }
                    }

                    //Save new sub cate prod
                    if (isset($postData['subCate']) && count($postData['subCate']) > 0) {
                        $result = $this->SaveSubCateProd($postData['productId'], $postData['subCate']);
                        if (!$result) {
                            $_SESSION['error'] = "Save sub cate prod error!";
                            return false;
                        }
                    }

                    return true;
                } else {
                    $_SESSION['error'] = "Save error!";
                    return false;
                }
            } else {
                $_SESSION['error'] = "This Product doesn't exist!";
                return false;
            }
        } else {    //create
            //create product
            $prodId = $this->db->InsertButReturnProdId("fiama.product", $arrProduct);
            if ($prodId) {
                //save thumbs
                if ($thumb_array != null) {
                    $result = $this->SaveThumbs($thumb_array, $prodId, $absoluteProductImgPath);
                    if (!$result) {
                        $_SESSION['error'] = "Save thumbs error!" . $_SESSION['error'];
                        return false;
                    }
                }
                //save sub cate prod
                if (isset($postData['subCate']) && count($postData['subCate']) > 0) {
                    $result = $this->SaveSubCateProd($prodId, $postData['subCate']);
                    if (!$result) {
                        $_SESSION['error'] = "Save sub cate prod error!";
                        return false;
                    }
                }

                return true;
            } else {
                $_SESSION['error'] = "Can not get latest product id!";
                return false;
            }
        }
    }

    function SaveSubCateProd($prodId, $subcates)
    {
        //save subcate
        $subcates_count = count($subcates);
        $query = "INSERT INTO fiama.sub_category_product (SubCategoryId, ProductId) VALUES ";
        for ($i = 0; $i < $subcates_count; $i++) {
            $query = $query . "(" . $subcates[$i] . ", " . $prodId . "), ";
        }


        $query = trim($query);
        $query = rtrim($query, ",");
        // var_dump($query);
        // die;
        $result = $this->db->Query($query);
        if (!empty($result)) {
            return true;
        } else {
            return false;
        }
    }

    function SaveThumbs($imgs, $prodId, $absoluteProductImgPath)
    {
        //$imgs = thumb_array
        
        $img_count = count($imgs);
        for ($i = 1; $i < $img_count; $i++) {
            if ($imgs[$i] != null) {
                $tempPath = "/public/assets/clients/img/product/" . $imgs[$i]['name'];
                $isThumbExist = $this->check_thumb_exist($prodId, $i);
                
                if ($isThumbExist)  //if exist then update
                {
                    $arr = [
                        "path" => $tempPath
                    ];

                    $data = $this->db->Update("fiama.sub_imgs_product", $arr, "product_id=" . $prodId . " and thumb = " . $i);

                    if (!$data) {
                        $_SESSION['error'] = "Upload Image " . $imgs[$i]['name'] . " Failed!";
                        return false;
                    } else {
                        //save to server
                        if (move_uploaded_file($imgs[$i]['tmp_name'], $absoluteProductImgPath . $imgs[$i]['name'])) {
                        } else {
                            $_SESSION['error'] = "Upload Image Failed!";
                            return false;
                        }
                    }
                } else {    // else if not exist then insert
                    $arr = [
                        "path" => $tempPath,
                        "product_id" => $prodId,
                        "thumb" => $i
                    ];
                    $data = $this->db->Insert("fiama.sub_imgs_product", $arr);
                    if (!$data) {
                        $_SESSION['error'] = "Upload Image " . $imgs[$i]['name'] . " Failed!";
                        return false;
                    } else { //save img to server
                        if (move_uploaded_file($imgs[$i]['tmp_name'], $absoluteProductImgPath . $imgs[$i]['name'])) {
                        } else {
                            $_SESSION['error'] = "Upload Image Failed!";
                            return false;
                        }
                    }
                }
            }
        }

        return true;
    }

    function check_thumb_exist($prodId, $thumb_number)
    {
        $query = "select * from fiama.sub_imgs_product where product_id = " . $prodId . " and thumb = " . $thumb_number;
        
        $data = $this->db->Query($query)->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($data);
        //             die;
        if (!empty($data)) { // exist
            return true;
        }
        return false; // not exist
    }

    function DeleteOldSubCate($prodId)
    {
        $result = $this->db->Delete("sub_category_product", "ProductId = " . $prodId);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function DeleteProductById($prodId)
    {
        $isSold = $this->isSoldOrNot($prodId);

        if (!$isSold)
        {
            $result = $this->db->Delete("product", "Id = " . $prodId);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } else { //hide
            $arrProduct = [
                "status" => 0
            ];
            $data = $this->db->Update("fiama.product", $arrProduct, "Id=" . $prodId);
            if ($data) {
                return true;
            } else {
                return false;
            }
        }
    }

    function isSoldOrNot($prodId)
    {
        $result = $this->db->Query("SELECT * FROM fiama.order_detail WHERE product_id = " . $prodId)->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            return true;
        } else {
            return false;
        }
    }


    public function GetSearchProduct($keyword){
        $data = $this->db->Query("SELECT * FROM fiama.product WHERE Title like N'%$keyword%' AND Status = 1")->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
