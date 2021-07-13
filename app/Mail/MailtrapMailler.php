<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailtrapMailler extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('norelply@ibbul.com', 'IBBUL CMS')
            ->subject('IBBUL STUDENT COMPLAINTS SYSTEM')
            ->markdown('mail.response')            
            ->with([
                'url' =>config('app.url', '#'),
                'ufname' => session('ufname'),
                'complaints_ID' => session('complaints_ID'),
                'title' => session('title'),
                'required' => session('required'),
                'link' => '/inboxes/'
            ]);
        return $this->view('view.name');
    }
}
