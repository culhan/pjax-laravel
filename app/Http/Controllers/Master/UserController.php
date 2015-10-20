<?php

namespace App\Http\Controllers\Master;

use App\User;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{   
    
    public function __construct(Request $request)
    {
        $this->model = new User();

        $this->url = '/master/users';

        $this->label = [
            'name' => 'Name',
            'email' => 'Email',
        ];

        $this->length = Session::has('length') ? Session::get('length') : 2;
        
        if($request->has('length'))
        {
            $this->length = $request->input('length');
            Session::put('length',$this->length);
        }

    }
    /**
     * Show all data.
     * paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
     * 
     * @return Response
     */
    public function getIndex(Request $request)
    {   
        $data = $this->model->paginate($this->length);

        $data->setPath($this->url);
        
        return view('pages.master.index', [
            'data' => $data,
            'label' => $this->label,
            'url' => $this->url,
            'length' => $this->length
        ]);
    }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function getShow($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }
}