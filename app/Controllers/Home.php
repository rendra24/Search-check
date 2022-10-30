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
                $data['mobil'] = $model->whereIn('location', $explode)->find();
                
            }else{
                $data['mobil'] = $model->findAll();
            }
        return view('welcome_message',$data);
    }

}