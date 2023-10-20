<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Services\StatusCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CommentController extends Controller
{

    public function comment(Request $request)
    {

        $rules = [
            'user_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',

        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->_response_body($validator->messages(),
                StatusCode::HTTP_UNPROCESSABLE_ENTITY,
                'Validation Error');
        }
        $input = $request->except('_token');
        $comment = new Comment();
        $comment->fill($input);
        $comment->save();
        $view = View('partial.comment', ['comment' => $comment])->render();
        return $this->_response_body($view);


    }

    public function replay($id)
    {
        dd($id);

    }

    public function asd(Request $request)
    {
        $data = $request->except('_token');

        if (Auth::attempt($data)){
            return $this->_response_body($data,'400');
        }
        else{
            $incorrect = ['incorrect' => ["Incorrect email or password...?"]];
            return $this->_response_body($incorrect,'205');
        }


    }
}
