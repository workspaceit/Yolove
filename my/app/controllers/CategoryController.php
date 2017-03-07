<?php

class CategoryController extends YoloveController {

    public function showCategory($id){
        $official_softname = app('official_softname');
        $helper = new CategoryHelper();
        $category = $helper->getCategoryById($id);
        $this->siteTitle = "Please select - " . $category->category_name_cn . ' ' . $official_softname . ' - Shop your clothes online Discovery'; 
        return View::make('user.category.category_products', array('response' => $this->_response,'id'=>$id,'category'=>$category,'siteTitle' => $this->siteTitle));
    }


}

?>
