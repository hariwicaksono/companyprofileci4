<?php namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class UserPassword extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\UserModel';

    public function update($id = null)
    {
        if ($this->model->find($id)) {

            $input = $this->request->getRawInput();
            $data = [
                'password' => md5($input['password'])
            ];

            if ($this->model->update($id, $data) > 0) {

                $response = [
                    'status' => '200',
                    'data' => 'Success Update data'
                ];
                return $this->respond($response, 200);
            } else {
                $response = [
                    'status' => '404',
                    'data' => 'Failed Update Data'
                ];
                return $this->respond($response, 404);
            }
            
        }

        //$response = [
            //'status' => '0',
            //'data' => 'Failed Update Data'
        //];
        //return $this->respond($response, 404);
    }
    
}