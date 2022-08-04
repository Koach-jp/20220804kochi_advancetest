<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

class ContactValidation extends Component
{
    public $lastName = null;
    public $firstName = null;
    public $gender = 1;
    public $email = null;
    public $postcode = null;
    public $address = null;
    public $buildingName = null;
    public $opinion = null;
    public $btnDisabler = false;


    protected $rules = [
        'lastName' => 'required',
        'firstName' => 'required',
        'gender' => 'required',
        'email' => 'required|email',
        'postcode' => 'required|size:8|regex:/^[0-9]{3}-[0-9]{4}$/',
        'address' => 'required',
        'opinion' => 'required|max:120',
    ];


    protected $messages = [
        'lastName.required' => '苗字は必須です',
        'firstName.required' => '名前は必須です',
        'email.required' => 'メールアドレスは必須です',
        'email.email' => 'メールアドレスの形式で入力してください',
        'postcode.required' => '郵便番号は必須です',
        'postcode.size' => '正しい郵便番号を入力してください',
        'postcode.regex' => '半角数字とハイフン(-)で郵便番号を入力してください',
        'address.required' => 'ご住所は必須です',
        'opinion.required' => 'ご意見は必須です',
        'opinion.max' => 'ご意見は120文字以内で入力してください',
    ];


    public function mount(Request $request) 
    {
        if ($request->session()->exists('inquiry')) {
            $inquiry = $request->session()->get('inquiry');
            $this->lastName = $inquiry['lastName'];
            $this->firstName = $inquiry['firstName'];
            $this->gender = $inquiry['gender'];
            $this->email = $inquiry['email'];
            $this->postcode = $inquiry['postcode'];
            $this->address = $inquiry['address'];
            $this->buildingName = $inquiry['buildingName'];
            $this->opinion = $inquiry['opinion'];
            $this->btnDisabler = true;
        }
    }


    public function updated($propertyName)
    {
        $this->postcode = mb_convert_kana($this->postcode, 'a');
        $this->btnDisabler =
        (!empty($this->lastName) && !empty($this->firstName) && !empty($this->email) && !empty($this->postcode) && !empty($this->address) && !empty($this->opinion));
        if (mb_strlen($this->postcode) == 7) {
            $this->postcode = substr_replace($this->postcode, '-', 3, 0);
        }
        $this->validateOnly($propertyName);
    }

}
