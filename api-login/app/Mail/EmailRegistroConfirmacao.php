<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailRegistroConfirmacao extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $link = url("/api/auth/ativar/{$this->user->id}/{$this->user->token}");

        return $this->view('emails.registroConfirmacao')
            ->with([
                'nome' => $this->user->name,
                'email' => $this->user->email,
                'link' => $link,
                'dataHora' => now()->setTimezone('America/Sao_Paulo')->forma('d/m/Y H:i:s'),
            ]);
    }
}
