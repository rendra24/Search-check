<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index($location = null)
    {
        $model = Model('Data');
        $data['mobil'] = $model->findAll();
        return view('welcome_message',$data);
    }

    public function search()
    {   
        $post = $this->request->getPost();
        $explode = explode('","', $post['location']);
        foreach ($explode as $key => $value){
            $value = trim($value, '"[{');
            $value = trim($value, '}]"');
            $explode[$key] = $value;
        }
        $model = Model('Data');
        $data['mobil'] = $model->whereIn('location', $explode)->find();
        dd($data['mobil']);
    }
}
