<?php

class CategoryHelper {

    public function getAllCategory() {
        $categories = Category::all();
        return $categories;
    }

    public function getCategoryById($id) {
        $category = Category::find($id);
        return $category;
    }

    public function createCategory() {
        
    }

    public function updateCategory() {
        
    }

    public function deleteCategory() {
        
    }

    public function reduceShare($id) {
        $category = Category::find($id);
        if ($category->total_share != 0) {
            $category->total_share = $category->total_share - 1;
            $category->save();
        }
    }

}

?>
