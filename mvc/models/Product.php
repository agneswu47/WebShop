<?php
class Product extends DB{

    // public function SaveProductCategories() {
    //     $result = mysqli_query($this->con, 'SELECT * FROM `category`');
    //     if (!$result) {
    //         die ('Câu truy vấn bị sai');
    //     }
    //     $absolutePath = '/public/images/categories';
    //     $rootFolderImage = $_SERVER['DOCUMENT_ROOT'] . $absolutePath;
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         $product_folder = $rootFolderImage . '/';
    //         $product_folder_Absolute = $absolutePath . '/';
    //         if (!file_exists($product_folder)) {
    //             mkdir($product_folder, 0777, true);
    //         }

    //         // Decode main product image data
    //         $main_image_data = base64_decode(explode(',', $row['Icon'])[1]);

    //         // Generate unique file name for main image
    //         $main_image_name = 'category' . $row['ID_Category'].'.jpg';

    //         // Save main product image to folder
    //         file_put_contents($product_folder . $main_image_name, $main_image_data);

    //         // Update database with main image URL
    //         $main_image_url = $product_folder_Absolute . $main_image_name;
    //         mysqli_query($this->con, "UPDATE `category` SET `Icon` = '$main_image_url' WHERE `ID_Category` = " . $row['ID_Category']);

           
    //     }
    // }
    // public function SaveProductImages() {
    //     $result = mysqli_query($this->con, 'SELECT * FROM `product`');
    //     if (!$result) {
    //         die ('Câu truy vấn bị sai');
    //     }
    //     $absolutePath = '/public/images/products';
    //     $rootFolderImage = $_SERVER['DOCUMENT_ROOT'] . $absolutePath;
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         $product_folder = $rootFolderImage . '/product' . $row['ID_Product'] . '/';
    //         $product_folder_Absolute = $absolutePath . '/product' . $row['ID_Product'] . '/';
    //         if (!file_exists($product_folder)) {
    //             mkdir($product_folder, 0777, true);
    //         }

    //         // Decode main product image data
    //         $main_image_data = base64_decode(explode(',', $row['Avatar'])[1]);

    //         // Generate unique file name for main image
    //         $main_image_name = 'product' . $row['ID_Product'] . '_main.jpg';

    //         // Save main product image to folder
    //         file_put_contents($product_folder . $main_image_name, $main_image_data);

    //         // Update database with main image URL
    //         $main_image_url = $product_folder_Absolute . $main_image_name;
    //         mysqli_query($this->con, "UPDATE `product` SET `Avatar` = '$main_image_url' WHERE `ID_Product` = " . $row['ID_Product']);

    //         // Retrieve detail product images
    //         $detail_result = mysqli_query($this->con, 'SELECT * FROM `detail_product_image` WHERE `ID_Product` = ' . $row['ID_Product']);
    //         if (!$detail_result) {
    //             die ('Câu truy vấn bị sai');
    //         }
    //         while ($detail_row = mysqli_fetch_assoc($detail_result)) {
    //             // Decode detail product image data
    //             $detail_image_data = base64_decode(explode(',', $detail_row['Image'])[1]);

    //             // Generate unique file name for detail image
    //             $detail_image_name = 'product' . $row['ID_Product'] . '_detail' . $detail_row['ID_Detail_Image'] . '.jpg';

    //             // Save detail product image to folder
    //             file_put_contents($product_folder . $detail_image_name, $detail_image_data);

    //             // Update database with detail image URL
    //             $detail_image_url =  $product_folder_Absolute . $product_folder . $detail_image_name;
    //             mysqli_query($this->con, "UPDATE `detail_product_image` SET `Image` = '$detail_image_url' WHERE `ID_Detail_Image` = " . $detail_row['ID_Detail_Image']);
    //         }
    //     }
    // }
    public function GetProducts()
    {
        $result = mysqli_query($this->con, "SELECT p.Material, p.Size,p.ID_Product,p.ID_Category,p.Name_Product,p.Description,p.Price,p.Avatar,p.ID_Category,c.Name_Category,c.Icon,GROUP_CONCAT(cl.Name_Color SEPARATOR ', ') as Name_Color,GROUP_CONCAT(cl.ID_Color SEPARATOR ', ') AS ID_Color FROM `product` p JOIN category c ON c.ID_Category = p.ID_Category JOIN detail_product_color dpc ON dpc.ID_Product = p.ID_Product JOIN color cl ON cl.ID_Color = dpc.ID_Color GROUP BY p.ID_Product ORDER BY p.ID_Product DESC;");
        if (!$result)
        {
            die ('Câu truy vấn bị sai');
        }
        $return = array();
        while ($row = mysqli_fetch_assoc($result))
        {
            $return[] = $row;
        }
        mysqli_free_result($result);
        return $return;
    }
    public function GetProductOfID($ID)
    {
        $result = mysqli_query($this->con, "SELECT p.Material, p.Size, p.ID_Product,p.ID_Category,p.Name_Product,p.Description,p.Price,p.Avatar,p.ID_Category,c.Name_Category,c.Icon,GROUP_CONCAT(cl.Name_Color SEPARATOR ', ') as Name_Color,GROUP_CONCAT(cl.ID_Color SEPARATOR ', ') AS ID_Color FROM `product` p JOIN category c ON c.ID_Category = p.ID_Category JOIN detail_product_color dpc ON dpc.ID_Product = p.ID_Product JOIN color cl ON cl.ID_Color = dpc.ID_Color WHERE p.ID_Product = '$ID' GROUP BY p.ID_Product ORDER BY p.ID_Product DESC");
        if (!$result)
        {
            die ('Câu truy vấn bị sai');
        }
        
        return mysqli_fetch_array($result);
    }
    public function Search($searchQuery)
    {
        $result = mysqli_query($this->con, "SELECT * FROM `product` p JOIN category c ON c.ID_Category = p.ID_Category WHERE Name_Product Like '%$searchQuery%'");
        if (!$result)
        {
            die ('Câu truy vấn bị sai');
        }
        $return = array();
        while ($row = mysqli_fetch_assoc($result))
        {
            $return[] = $row;
        }
        mysqli_free_result($result);
        return $return;
    }
    public function SearchInTitle_Description($searchQuery)
    {
        $result = mysqli_query($this->con, "SELECT * FROM `product` WHERE Name_Product Like '%$searchQuery%' OR Description LIKE '%$searchQuery%' ");
        if (!$result)
        {
            die ('Câu truy vấn bị sai');
        }
        $return = array();
        while ($row = mysqli_fetch_assoc($result))
        {
            $return[] = $row;
        }
        mysqli_free_result($result);
        return $return;
    }
}
?>