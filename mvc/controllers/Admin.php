<?php

class Admin extends Controller{

    // Must have SayHi()
    function Daskboard(){
        $listProduct = $this->model('Product')->GetProducts();
        $listUser = $this->model('User')->GetUserTotal();
        $Bill = $this->model('Bill');
        $soLuongHangTonKho = $Bill->Get_SoLuongTonKho();
        $soLuongHangDangXuLy = $Bill->Get_SoLuongBillDangXuLy();
       
        // Call Views
        $this->view("admin", [
            "Page"=>"admin-home",
            "ListProduct"=>$listProduct,
            "ListUser"=>$listUser,
            "soLuongHangTonKho"=>$soLuongHangTonKho,
            "soLuongHangDangXuLy"=>$soLuongHangDangXuLy,
        ]);
    }
    function CheckoutDone($id)
    {
        $Bill = $this->model('Bill');
        if($Bill->Done($id))
        {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
            exit();
        }
        else
            echo "Error";

    }
    function Product(){
        $listProduct = $this->model('Product');
        $listCategory = $this->model('Category');
        
        $listProduct = $listProduct->GetProducts();
        $listCategory = $listCategory->GetCategories();
       
        // Call Views
        $this->view("admin", [
            "Page"=> 'admin-product',
            "ListProduct"=>$listProduct,
            "ListCategory"=>$listCategory,
            "ListColor"=>$this->model('Color')->GetColors(),
 
        ]);
    }
    function Category(){
        $listProduct = $this->model('Product');
        $listCategory = $this->model('Category');
        $listProduct = $listProduct->GetProducts();
        $listCategory = $listCategory->GetCategories();
        // Call Views
        $this->view("admin", [
            "Page"=> 'admin-category',
            "ListCategory"=>$listCategory,
        ]);
    }
    function Bill($id = 0)
    {
        $Bill = $this->model('Bill');
        $listProduct = $this->model('Product');
        $listCategory = $this->model('Category');
        $listProduct = $listProduct->GetProducts();
        $listCategory = $listCategory->GetCategories();
        // Call Views
        $this->view("admin", [
            "Page"=> 'admin-quan-li-don-hang',
            "ListCategory"=>$listCategory,
            "Bill_List"=>$Bill->GetAll($id),
        ]);
    }
    function Test()
    {
        $this->model('Product')->SaveProductCategories();
    }

}
?>