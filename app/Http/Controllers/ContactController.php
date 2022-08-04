<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function confirm(ContactRequest $request)
    {
        $request->session()->put('inquiry', $request->except('_token'));
        return view('confirm', ['inquiry' =>$request->session()->get('inquiry')]);
    }


    public function create(Request $request)
    {
        $inquiry = $request->session()->get('inquiry');
        $contact = [
            'fullname' => $inquiry['lastName'] . $inquiry['firstName'],
            'gender' => $inquiry['gender'],
            'email' => $inquiry['email'],
            'postcode' => mb_convert_kana($inquiry['postcode'], 'a'),
            //mb_convertはおそらく要らないが念のため。
            'address' => $inquiry['address'],
            'building_name' => $inquiry['buildingName'],
            'opinion' => $inquiry['opinion'],
        ];
        Contact::create($contact);
        return view('thank');
    }


    public function index(Request $request)
    {
        $contacts = Contact::paginate(10);
        $request->session()->forget('keep');
        return view('contact', ['contacts' => $contacts]);
    }


    public function show(Request $request)
    {
        $method = $request->method();
        if ($method == 'POST') {
            $name = $request->name;
            $email = $request->email;
            $gender = $request->gender;
            $start = $request->created_start;
            $end = $request->created_end;
            $request->session()->put('keep', $request->except('_token'));
        } else if ($method == 'GET') {
            $keep = $request->session()->get('keep');
            $name = $keep['name'];
            $email = $keep['email'];
            $gender = $keep['gender'];
            $start = $keep['created_start'];
            $end = $keep['created_end'];
        }

        $match = [
            ['fullname', 'LIKE', "%$name%"],
            ['email', 'LIKE', "%$email%"],
        ];
        if ($gender) {
            $match[] = ['gender', '=', $gender];
        }

        if ($start && $end) {
            $contacts = Contact::where($match)
                ->whereBetween('created_at', [$start, $end])->paginate(10);
        } else if ($start) {
            $match[] = ['created_at', '>=', $start];
            $contacts = Contact::where($match)->paginate(10);
        } else if ($end) {
            $match[] = ['created_at', '<=', $end];
            $contacts = Contact::where($match)->paginate(10);
        } else {
            $contacts = Contact::where($match)->paginate(10);
        }

        return view('contact', [
            'contacts' => $contacts,
            'keep' => $request->session()->get('keep'),
        ]);
    }


    public function delete(Contact $contact, Request $request)
    {
        Contact::where('id', $contact->id)->delete();
        if ($request->session()->exists('keep')) {
            return redirect()->route('getShow', ['page' => $request->page]);
        }
        return redirect()->route('index', ['page' => $request->page]);
    }
}
