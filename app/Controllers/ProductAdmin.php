<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\DeleteProductModel;

class ProductAdmin extends BaseController
{
     public function __construct(){
        helper(['url', 'formchecker', 'form','file']);
    } 
    public function viewProduct()
    {
        $productModel = new ProductModel();
   
        $data['pro_records'] = $productModel->where('count', 1)->findAll(); 

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
                $count = 1;
                $rand = random_int(1, 1000000000);
                foreach($proImg as $proImgs){
                    if($proImgs->isValid() && !$proImgs->hasMoved()){
                        $newName = $proImgs->getRandomName();
                        $proImgs->move('uploads/', $newName);
                        $dbdata = [
                            'product_name' => $this->request->getVar("p-name"),
                            'category_id' => $this->request->getVar('category-id'),
                            'product_amount' => $this->request->getVar('amount'),
                            'quantity' => $this->request->getVar("quantity"),
                            'details' => $this->request->getVar("details"),
                            'personal_id' => $this->session->get("user-id"),
                            'count' => $count,
                            'rand_pro' => $rand,
                            'image' => $newName
                        ];
                        $query = $productModel->save($dbdata);
                        $count++;
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

public function deleteProductadmin($id)
{
    $productModel = new ProductModel();
    $data['delete_product_records'] = $productModel->where('rand_pro', $id)->findAll();

    return view('dashboard/product-admin/delete-product-admin', $data);
}

public function finalDeleteadmin()
{
    $deleteproductModel = new DeleteProductModel();
    $imgdel = $deleteproductModel->where('rand_pro',$this->request->getVar('rand-con-id'))->findAll();
    foreach($imgdel as $completedel){
        $filepath = './uploads/'.$completedel['image'];
            if(file_exists($filepath)){
                unlink($filepath);
            }
    }
    $data = [
        'rand_pro' => intval($this->request->getVar('rand-con-id'))
    ];
    $query = $deleteproductModel->delete($data);
    if($query === true){

     return redirect()->to(base_url("view-product-admin"));
   }
   else{
      return view('dashboard/product-admin/delete-product-admin', ['errors' => $query->errors()]);  
   };
   
}

}