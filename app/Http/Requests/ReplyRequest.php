<?php

namespace App\Http\Requests;

class ReplyRequest extends Request
{
    public function rules()
    {
        switch($this->method())
        {
            // CREATE
            case 'POST':
            {
                return [
                    // CREATE ROLES
                    'content' => 'required|min:2',
                ];
            }
            case 'DELETE':
            default:
            {
                return [];
            };
        }
    }

    public function messages()
    {
        return [
            'content.required' => '回复内容不能为空',
            'content.min' => '回复内容至少二个字符',
        ];
    }
}
