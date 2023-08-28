<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PdfEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $mymail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mymail)
    {
        $this->mymail = $mymail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
        return $this->from($this->mymail->fromemail,$this->mymail->sendername)
                    ->view('mails.'.$this->mymail->type)
                    ->subject($this->mymail->formsubject)
                    //->text('mails.demo_plain')
                    ->with(
                      [
                            'testVarOne' => '1',
                            'testVarTwo' => '2',
                      ])
                      ->attach(public_path().'/uploads/'.$this->mymail->type.'/'.$this->mymail->id.'.pdf', [
                              'as' => $this->mymail->type.'.pdf',
                              'mime' => 'application/pdf',
                      ]);

    }
}
