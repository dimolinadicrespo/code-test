<?php


namespace App\lib\Mailer;


class FileTransport extends  Transport
{
    protected $fileName;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @param $to
     * @param $subject
     * @param $message
     * @return bool | array
     * @throws Exception
     */
    public function send($to, $subject, $message, $sender)
    {
        $fileContent = [
            "New Email:",
            "To: {$to}",
            "Subject: {$subject}",
            "Body: {$message}",
        ];

        file_put_contents($this->fileName, implode("\n", $fileContent), FILE_APPEND);
    }

    /**
     * @param $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }
}
