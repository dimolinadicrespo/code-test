<?php

namespace Tests\Unit\Lib\Mailer;

use App\lib\Mailer\FileTransport;
use App\lib\Mailer\Mailer;
use PHPUnit\Framework\TestCase;

class MailerTest extends TestCase
{

    /** @test */
    public function itStoreTheSendsEmailsInALogFile()
    {
        $filename = __DIR__ . '/../../../../storage/logs/mail.txt';
        @unlink($filename);

        $mailer = new Mailer(new FileTransport($filename));
        $mailer->send('pruebas@gmail.com', 'Resumen de ingresos', 'Los ingresos son X', 'diego@diego.es');

        $fileContent = file_get_contents($filename);

        $this->assertStringContainsString('New Email:', $fileContent);
        $this->assertStringContainsString('To: pruebas@gmail.com', $fileContent);
        $this->assertStringContainsString('Subject: Resumen de ingresos', $fileContent);
        $this->assertStringContainsString('Body: Los ingresos son X', $fileContent);
    }
}
