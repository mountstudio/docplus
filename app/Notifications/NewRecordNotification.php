<?php

namespace App\Notifications;

use App\Schedule;
use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;

class NewRecordNotification extends Notification
{
    use Queueable;

    private $record;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($record)
    {
        $this->record = $record;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        if ($this->record->schedule_id) {
            if ($this->record->user_id) {
                $message = 'К Вам записался пользователь: ' . User::find($this->record->user_id)->fullName
                    . ' с номером телефона: ' . $this->record->phone_number .
                    '<br>На дату и время: '
                    . Carbon::make($this->record->schedule->date_of_record)->format('d/m/Y') . ' '
                    . Carbon::make($this->record->schedule->time_of_record)->format('H:i');
            } else {
                $message = 'К Вам записался пациент: ' . $this->record->name . ' с номером телефона: '
                    . $this->record->phone_number .
                    '<br>На дату и время: '
                    . Carbon::make($this->record->schedule->date_of_record)->format('d/m/Y') . ' '
                    . Carbon::make($this->record->schedule->time_of_record)->format('H:i');
            }
        } else {
            if ($this->record->user_id) {
                $message = 'К Вам записался пользователь: ' . User::find($this->record->user_id)->fullName
                    . ' с номером телефона: ' . $this->record->phone_number;
            } else {
                $message = 'К Вам записался пациент: ' . $this->record->name . ' с номером телефона: '
                    . $this->record->phone_number;
            }
        }

        return [
            'message' => $message,
        ];
    }
}
