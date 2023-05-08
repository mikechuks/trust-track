<?php

namespace App\Controllers;
use App\Models\CategoryModel;

class CategoryAdmin extends BaseController
{
    public function __construct(){
        helper(['url', 'formchecker', 'form']);
    } 
    public function viewCategory()
    {
        $categoryModel = new CategoryModel();
   
        $data['category_records'] = $categoryModel->where('personal_id', $this->session->get("user-id"))->findAll(); 

        return view('dashboard/category-admin/view-category-admin', $data);
    }
    public function addCategoryAdmin()
    {
        $data = [];

        if ($this->request->getPost('add-category')){
        //validation
        $validation = $this->validate([
            "c-name" => [
                "rules" => "required",
                "errors" => [
                    "required" => "*name type is required"
                ]
                ]
        ]);
        if (!$validation) {

              $data += [
            "validation" => $this->validator
        ];

            return view('dashboard/category-admin/add-category-admin', $data);
        }
        else{
            $categoryModel = new CategoryModel();
            $dbdata = [
                'category_name' => $this->request->getVar("c-name"),
                'personal_id' => $this->session->get("user-id")
            ];
        $query = $categoryModel->save($dbdata);

        if($query === true){

        return redirect()->to(base_url("view-category-admin"));
      }
      else{
        $this->session->setFlashdata('errormessage', 'Error occured!');
         $data += ['dberrors' => $categoryModel->errors()];
         return view('dashboard/category-admin/add-category-admin', $data);      
      }
        }
    }else{
        return view('dashboard/category-admin/add-category-admin');
    }
}

        public function editCategoryAdmin($id)
        {
            $categoryModel = new CategoryModel();
            $data['cat_records'] = $categoryModel->find($id);
            

            return view('dashboard/category-admin/update-category-admin', $data);
        }

    public function updateCategoryAdmin()
    {
        $data = [];

        if ($this->request->getPost('update-cat')){
            //validation
            $validation = $this->validate([
                "c-name" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "*name type is required"
                    ]
                    ]
            ]);
     
            $data += [
                "validation" => $this->validator
            ];
     
            if (!$validation) {
                return redirect()->to(base_url('update-category-admin/'.$this->request->getVar('cat-id')))->withInput()->with('validation',$this->validator); 
            }
            else{
                $categoryModel = new CategoryModel();
                $id = intval($this->request->getVar('cat-id'));
        $data = [
                'category_name' => $this->request->getVar('c-name'),
        ];

           $query = $categoryModel->update($id, $data);

           if($query === true){

            return redirect()->to(base_url("view-category-admin"));
          }
          else{
            $this->session->setFlashdata('errormessage', 'Error occured!');
            return redirect()->to(base_url('update-category-admin/'.$this->request->getVar('cat-id')))->withInput()->with(['errors' => $query->errors()]);
            
          }
        }
    }else{
        return view('dashboard/category-admin/update-category-admin');
    }
}
}