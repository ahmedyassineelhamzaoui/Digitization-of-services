<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
class documentResponse extends Notification
{
    use Queueable;
    private $user_id;
    private $operation;
    private $name;
    private $message;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user_id,$operation,$name,$message)
    {
        $this->user_id = $user_id;
        $this->operation = $operation;
        $this->name = $name;
        $this->message = $message;
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toDatabase($notifiable)
    {
          $user = User::find($this->user_id);
        
          if($this->operation == 'accepter' ){
            $title =  'Bonjour Monsieur '.$this->name.' votre demande a été accepté. consultez votre email pour voir plus de details.';
            $picture = 'agreement.png';
          }else{
            $title = 'Bonjour Monsieur '.$this->name.' votre demande a été refusée. consultez votre email pour voir plus de details';
            $picture = 'declin.png';
          }
       return [
        'accept' => 'yes',
        'user'   =>  '',
        'user_id' => $user->id,
        'link'  => 'demandes',
        'pages' => 'demandes',
        'title' => $title,
        'picture' => $picture,
       ];
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
    */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
