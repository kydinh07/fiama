<?php

class ShoppingCartModel  extends Model {

    public function TableFill()
    {
    }
    public function FieldFill()
    {
    }

    public function GetCartCountByUsername($username)
    {
        
        if (!isset($username) || $username == "")
        {
            return 0;
        }
        $user = $this->db->Query("SELECT * FROM fiama.customer WHERE UserName='" . $username . "'")->fetch(PDO::FETCH_ASSOC);
        
        if (!$user)
        {
            return 0;
        }
        $data = $this->db->Query("SELECT * FROM fiama.shopping_cart WHERE Customer_Id='" . $user['Id'] . "'")->fetchAll(PDO::FETCH_ASSOC);
        
        return count($data);
    }

    public function GetOneShoppingCart($customer_id, $product_id)
    {
        $data = $this->db->Query("SELECT * FROM fiama.shopping_cart WHERE Customer_Id='" . $customer_id . "' AND product_id = " . $product_id)->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function AddToCart($productId, $username)
    {
        $user = $this->db->Query("SELECT * FROM fiama.customer WHERE UserName='" . $username . "'")->fetchAll(PDO::FETCH_ASSOC);

        $arr = [
            "Customer_Id" => $user[0]['Id'],
            "product_id" => $productId,
            "amount" => 1,
            "status" => 1
        ];

        $this->db->Insert("fiama.shopping_cart", $arr);
        $product = $this->db->Query("SELECT * FROM fiama.product WHERE Id=" . $productId)->fetch(PDO::FETCH_ASSOC);
        return $product;
    }

    public function checkShoppingCart($prodId, $username)
    {
        $user = $this->db->Query("SELECT * FROM fiama.customer WHERE UserName='" . $username . "'")->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($user))
        {
            $data = $this->db->Query("SELECT * FROM fiama.shopping_cart WHERE Customer_Id = " . $user[0]['Id'] . " AND product_id = " . $prodId)->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($data))
            {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    public function getProductCartByUsername($username)
    {
        if (!isset($username) || $username == "") return null;
        $user = $this->db->Query("SELECT * FROM fiama.customer WHERE UserName = '" . $username . "'")->fetch(PDO::FETCH_ASSOC);
        if (!$user) return null;
        $scs = $this->db->Query("SELECT * FROM fiama.shopping_cart WHERE Customer_Id = " . $user['Id'])->fetchAll(PDO::FETCH_ASSOC);
        $products = [];
        foreach ($scs as $sc) {
            $product = $this->db->Query("SELECT * FROM fiama.product WHERE Id = " . $sc['product_id'])->fetch(PDO::FETCH_ASSOC);
            $product['cart_amount'] = $sc['amount'];
            $product['customerId'] = $user['Id'];
            if ($product) {
                $products[] = $product;
            }
        }
        return $products;
    }

    public function getProductCartByCustomerId($id)
    {
        if (!isset($id) || $id == "") return null;
        $scs = $this->db->Query("SELECT * FROM fiama.shopping_cart WHERE Customer_Id = " . $id)->fetchAll(PDO::FETCH_ASSOC);
        $products = [];
        foreach ($scs as $sc) {
            $product = $this->db->Query("SELECT * FROM fiama.product WHERE Id = " . $sc['product_id'])->fetch(PDO::FETCH_ASSOC);
            $product['cart_amount'] = $sc['amount'];
            $product['customerId'] = $id;
            if ($product) {
                $products[] = $product;
            }
        }
        return $products;
    }

    public function DeleteProductFromCart($customerId, $prodId)
    {
        $result = $this->db->Delete("shopping_cart", "Customer_Id = " . $customerId . " AND product_id = " . $prodId);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function DeleteCartByCustomerId($customerId)
    {
        $result = $this->db->Delete("shopping_cart", "Customer_Id = " . $customerId);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function decreaseShoppingCart($customer_id, $product_id)
    {
        $cart = $this->GetOneShoppingCart($customer_id, $product_id);
        $arr = [
            "amount" => $cart['amount'] - 1
        ];

        $data = $this->db->Update("fiama.shopping_cart", $arr, "Customer_Id=" . $customer_id . " AND product_id = " . $product_id);
        return $data;
    }

    public function increaseShoppingCart($customer_id, $product_id)
    {
        $cart = $this->GetOneShoppingCart($customer_id, $product_id);
        $arr = [
            "amount" => $cart['amount'] + 1
        ];

        $data = $this->db->Update("fiama.shopping_cart", $arr, "Customer_Id=" . $customer_id . " AND product_id = " . $product_id);
        return $data;
    }
}