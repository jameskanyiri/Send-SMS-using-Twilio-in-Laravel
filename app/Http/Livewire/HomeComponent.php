<?php

namespace App\Http\Livewire;

use App\Models\UsersPhoneNumber;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Twilio\Rest\Client;

class HomeComponent extends Component
{
    public $states = [];
    public $values = [];
    public $message;
    public $receiver;
    public $receivers = [];



    public function storePhoneNumber()
    {
        $validatedData =  Validator::make($this->states, [
            'phone_number' => 'required|unique:users_phone_number|numeric',
        ])->validate();

        UsersPhoneNumber::create($validatedData);
        $this->sendMessage('User registration Successfull!!', $this->states['phone_number']);
    }

    public function sendMessage()
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            $this->receiver,
            [
                'from' => $twilio_number,
                'body' => $this->message
            ]
        );
        Session::flash('message', 'This is a message!');
    }

    public function sendCustomeMessage()
    {
        $receivers = array(
            "0" => "+254797357665",
            "1" => "+254708018811"
        );

        foreach ($receivers as $receiver) {
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_number = getenv("TWILIO_NUMBER");
            $client = new Client($account_sid, $auth_token);
            $client->messages->create(
                $receiver,
                [
                    'from' => $twilio_number,
                    'body' => $this->message
                ]
            );
        }
        Session::flash('message', 'This is a message!');
    }
    public function render()
    {
        $users = UsersPhoneNumber::all();
        return view('livewire.home-component', ['users' => $users]);
    }
}
