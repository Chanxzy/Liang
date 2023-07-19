<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailCustomer extends Mailable
{
    use Queueable, SerializesModels;

    public $emailData;

    public function __construct(array $emailData)
    {
        $this->emailData = $emailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Thaks for Having Us')
            ->view('admin.email.emailcostumer', $this->emailData); // Assuming you have a welcome.blade.php file in the "emails" directory
    }
}

