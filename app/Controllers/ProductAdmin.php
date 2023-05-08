<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class ProductAdmin extends BaseController
{
     public function __construct(){
        helper(['url', 'formchecker', 'form','']);
    } 
    public function viewProduct()
    {
        $productModel = new ProductModel();
   
        $data['pro_records'] = $productModel->findAll(); 

        return view('dashboard/product-admin/view-product-admin', $data);
    }
    public function addProductAdmin()
    {
        $data = [];
        $categoryModel = new CategoryModel();
        $data['category_product_records'] = $categoryModel->findAll();  

        if ($this->request->getPost('add-product')){
    
        //validation
        $validation = $this->validate([
            "p-name" => [
                "rules" => "required",
                "errors" => [
                    "required" => "*name type is required"
                ]
                ],
            "amount" => [
                "rules" => "required",
                "errors" => [
                    "required" => "*State type is required",
                ]
                ],
            "quantity" => [
                "rules" => "required",
                "errors" => [
                    "required" => "*City type is required",
                ]
                ],
            "details" => [
                "rules" => "required",
                "errors" => [
                    "required" => "*State type is required"
                ]
                ],
            "category-id" => [
                "rules" => "required",
                "errors" => [
                    "required" => "*Zip Code type is required",
                ]
                ],
            "pro-image" => [
                "rules" => "uploaded[pro-image]|max_size[pro-image,1024]",
                "errors" => [
                    "uploaded" => "*Image is empty",
                    "max_size" => "*image should not be more than 1mb",
                ]
                ],
        ]);

      
        if (!$validation) {

              $data += [
            "validation" => $this->validator
        ];

            return view('dashboard/product-admin/add-product-admin', $data);
        }
        else{
            $productModel = new ProductModel();
            $query = "";
            if($this->request->getFileMultiple("pro-image")){
                $proImg = $this->request->getFileMultiple("pro-image");
                foreach($proImg as $proImgs){
                    if($proImgs->isValid() && !$proImgs->hasMoved()){
                        $newName = $proImgs->getRandomName();
                        $proImgs->move(WRITEPATH.'uploads', $newName);
                        $mulFiles = file_get_contents(WRITEPATH.'uploads/'. $newName);
                        $dbdata = [
                            'product_name' => $this->request->getVar("p-name"),
                            'category_id' => $this->request->getVar('category-id'),
                            'product_amount' => $this->request->getVar('amount'),
                            'quantity' => $this->request->getVar("quantity"),
                            'details' => $this->request->getVar("details"),
                            'personal_id' => $this->session->get("user-id"),
                            'image' => $mulFiles
                        ];
                        $query = $productModel->save($dbdata);
                    }
                }
            }
        if($query === true){

        return redirect()->to(base_url("view-product-admin"));
      }
      else{
     $this->session->setFlashdata('errormessage', 'Error occured!');
         $data += ['dberrors' => $productModel->errors()];
         return view('dashboard/product-admin/add-product-admin', $data);      
      }
        }
    }else{
        return view('dashboard/product-admin/add-product-admin', $data);
    }

}

public function editProductadmin($id)
{
    $productModel = new ProductModel();
    $data['pro_records'] = $productModel->find($id);

    $categoryModel = new CategoryModel();
    $data['category_product_records'] = $categoryModel->findAll();  

    return view('dashboard/product-admin/update-product-admin', $data);
}

    public function updateProductAdmin()
    {
        $data = [];

        if ($this->request->getPost('update-pro')){
            //validation
            $validation = $this->validate([
                "p-name" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "*name type is required"
                    ]
                    ],
                "amount" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "*State type is required",
                    ]
                    ],
                "quantity" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "*City type is required",
                    ]
                    ],
                "details" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "*State type is required"
                    ]
                    ],
                "category-id" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "*Zip Code type is required",
                    ]
                    ],
                    "pro-image" => [
                        "rules" => "uploaded[pro-image]|max_size[pro-image,1024]",
                        "errors" => [
                            "uploaded" => "*Image is empty",
                            "max_size" => "*image should not be more than 1mb",
                        ]
                        ],
            ]);
     
            $data += [
                "validation" => $this->validator
            ];
     
            if (!$validation) {
                return redirect()->to(base_url('update-product-admin/'.$this->request->getVar('pro-id')))->withInput()->with('validation',$this->validator); 
            }
            else{
                $productModel = new ProductModel();
                $id = intval($this->request->getVar('pro-id'));
        $data = [
            'product_name' => $this->request->getVar("p-name"),
            'category_id' => $this->request->getVar('category-id'),
            'product_amount' => $this->request->getVar('amount'),
            'quantity' => $this->request->getVar("quantity"),
            'details' => $this->request->getVar("details"),
        ];

           $query = $productModel->update($id, $data);

           if($query === true){

            return redirect()->to(base_url("view-product-admin"));
          }
          else{
            $this->session->setFlashdata('errormessage', 'Error occured!');
            return redirect()->to(base_url('update-product-admin/'.$this->request->getVar('pro-id')))->withInput()->with(['errors' => $query->errors()]);
            
          }
        }
    }else{
        return view('dashboard/product-admin/update-product-admin');
    }
}
}