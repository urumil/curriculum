<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    //コントラクタ
    public function __construct()
    {
        //
        return $this->subject('パスワード再設定');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    //メールを送るメソッド
    public function build()
    {
        //メールを送る
        return $this->view('mail.PasswordResetEmail')
                    ->text('mail.PasswordResetEmail');
    }
}
