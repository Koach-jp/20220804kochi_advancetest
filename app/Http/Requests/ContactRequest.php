<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        if ($this->path() == 'contact/confirm') {
            return true;
        } else {
            return false;
        }
    }

//app\Http\Livewire\ContactValidation.php でリアルタイムバリデーションを掛け、かつsubmitボタンの制御をしているのでフォームリクエストでのバリデーションは不要。authorize()だけ残す。 
    
    public function rules()
    {
        return [
            //
        ];
    }
}
