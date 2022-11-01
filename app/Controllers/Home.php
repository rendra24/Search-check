<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index($location = null)
    {
        $model = Model('Data');
        $data['options'] = $model->groupBy('location')->findAll();
            if($post = $this->request->getGet()){
                $explode = explode('","', $post['location']);
                foreach ($explode as $key => $value){
                    $value = trim($value, '"[{');
                    $value = trim($value, '}]"');
                    $explode[$key] = $value;
                }
                $model = Model('Data');
                $data_mobil = $model->whereIn('location', $explode)->find();
                $data = [
                    'mobil' => $data_mobil->paginate(10),
                    'pager' => $model->pager,
                ];

                $data['mobil'] = $data_mobil->paginate(10, 'mobil');
                $data['pager'] = $model->pager;
                
            }else{
                
                $data['mobil'] = $model->paginate(10, 'mobil');
                $data['pager'] = $model->pager;
            }
        return view('welcome_message',$data);
    }

}