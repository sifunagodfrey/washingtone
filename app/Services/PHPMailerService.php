<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Log;
// -------------------
// PHPMailer Service
// Reusable mailer for all outgoing emails
// -------------------

class PHPMailerService
{
    // -------------------
    // MAILER INSTANCE
    // -------------------
    protected PHPMailer $mailer;

    // -------------------
    // CONSTRUCTOR
    // Sets up SMTP from config
    // -------------------
    public function __construct()
    {
        $this->mailer = new PHPMailer(true);

        // -------------------
        // SMTP SETTINGS
        // -------------------
        $this->mailer->isSMTP();
        $this->mailer->Host       = config('phpmailer.host');
        $this->mailer->SMTPAuth   = true;
        $this->mailer->Username   = config('phpmailer.username');
        $this->mailer->Password   = config('phpmailer.password');
        $this->mailer->SMTPSecure = config('phpmailer.encryption') === 'ssl'
            ? PHPMailer::ENCRYPTION_SMTPS
            : PHPMailer::ENCRYPTION_STARTTLS;
        $this->mailer->Port       = config('phpmailer.port');
        $this->mailer->isHTML(true);
        $this->mailer->CharSet    = 'UTF-8';
    }

    // -------------------
    // SET SENDER
    // Pass 'noreply', 'support', or 'info'
    // -------------------
    public function from(string $type = 'noreply'): static
    {
        $from = config("phpmailer.from.{$type}");
        $this->mailer->setFrom($from['address'], $from['name']);
        return $this;
    }

    // -------------------
    // SET RECIPIENT
    // -------------------
    public function to(string $email, string $name = ''): static
    {
        $this->mailer->addAddress($email, $name);
        return $this;
    }

    // -------------------
    // SET REPLY TO
    // -------------------
    public function replyTo(string $email, string $name = ''): static
    {
        $this->mailer->addReplyTo($email, $name);
        return $this;
    }

    // -------------------
    // SET SUBJECT
    // -------------------
    public function subject(string $subject): static
    {
        $this->mailer->Subject = $subject;
        return $this;
    }

    // -------------------
    // SET BODY
    // -------------------
    public function body(string $html, string $plain = ''): static
    {
        $this->mailer->Body    = $html;
        $this->mailer->AltBody = $plain ?: strip_tags($html);
        return $this;
    }

    // -------------------
    // SEND
    // -------------------
    public function send(): bool
    {
        try {
            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            Log::error('PHPMailer Error: ' . $e->getMessage());
            return false;
        }
    }

    // -------------------
    // RESET FOR REUSE
    // -------------------
    public function reset(): static
    {
        $this->mailer->clearAddresses();
        $this->mailer->clearReplyTos();
        return $this;
    }
}