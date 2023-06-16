<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
class documentAction extends Notification
{
    use Queueable;
    private $user_id;
    private $feeding;
    private $operation;
    private $name;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user_id,$operation,$name)
    {
        $this->user_id = $user_id;
        $this->operation = $operation;
        $this->name = $name;
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
       if($this->operation == 'pending'){
          $title =  $user->full_name.' a modifier la demande de '.$this->name.' à le status en attent ';
          $picture = 'pending.png';
       }else{
          $title =  $user->full_name.' '.$this->operation.' la demande de '.$this->name;
          if($this->operation == 'in progress' || $this->operation == 'accept' ){
            $picture = 'agreement.png';
          }else{
            $picture = 'declin.png';
          }
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
