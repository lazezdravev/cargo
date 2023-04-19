<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Job;
use App\Models\JobApplicants;

class JobApplicant extends Mailable
{
    use Queueable, SerializesModels;

    protected $applicant;
    protected $job;
    public $subject;

    /**
     * Create a new message instance.
     */
    public function __construct(Job $job, JobApplicants $applicant, $subject)
    {

        $this->subject = $subject;
        $this->applicant = $applicant;
        $this->job = $job;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'vendor.mail.html.job',
            with: [
                'applicant'   => $this->applicant,
                'job'         => $this->job
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
