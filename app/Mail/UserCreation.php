<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserCreation extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
        // dd($this->data);
    }



    public function build()
    {
        //     $data = json_decode($this-> data->toJson(), true);
        // dd(compact('data'));
        return $this->view('mails.UserCreation', ['data' => $this->data]);
    }
}
