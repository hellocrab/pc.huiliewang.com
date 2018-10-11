<?php
class CategoryAction extends Action {
	


    public function edu(){
        $category = M('category');
        $category_list = $category->select();
        $category_list = getSubCategory(0, $category_list, '');

        foreach($category_list as $key=>$value){
            $product = M('product');
            $count = $product->where('category_id = %d', $value['category_id'])->count();
            $category_list[$key]['count'] = $count;
            $category_list[$key]['list'] = $product->where('category_id = %d', $value['category_id'])->select();
        }
        $this->alert=parseAlert();
        $this->assign('category_list', $category_list);
        $this->display();
    }

    public function industry(){
        $category = M('category');
        $category_list = $category->select();
        $category_list = getSubCategory(0, $category_list, '');

        foreach($category_list as $key=>$value){
            $product = M('product');
            $count = $product->where('category_id = %d', $value['category_id'])->count();
            $category_list[$key]['count'] = $count;
            $category_list[$key]['list'] = $product->where('category_id = %d', $value['category_id'])->select();
        }
        $this->alert=parseAlert();
        $this->assign('category_list', $category_list);
        $this->display();
    }

    public function job(){
        $category = M('category');
        $category_list = $category->select();
        $category_list = getSubCategory(0, $category_list, '');

        foreach($category_list as $key=>$value){
            $product = M('product');
            $count = $product->where('category_id = %d', $value['category_id'])->count();
            $category_list[$key]['count'] = $count;
            $category_list[$key]['list'] = $product->where('category_id = %d', $value['category_id'])->select();
        }
        $this->alert=parseAlert();
        $this->assign('category_list', $category_list);
        $this->display();
    }
}