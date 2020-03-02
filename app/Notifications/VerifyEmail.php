<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;

class VerifyEmail extends VerifyEmailBase
{
//    use Queueable;

    // change as you want
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable);
        }
        return (new MailMessage)
            ->subject(Lang::get('Potvrďte svoju emailovú adrasu'))
            ->line(Lang::get('Prosím kliknite na tlačítko nižšie pre potvrdenie adresy.'))
            ->action(
                Lang::get('Potvrdiť adresu'),
                $this->verificationUrl($notifiable)
            )
            ->line(Lang::get('Pokiaľ ste mail už aktivovali žiadna akcia nie je nutná'));
    }
}
