<?php


namespace App\Http\TelegramCommands;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Laravel\Facades\Telegram;

class StartCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "start";

    /**
     * @var string Command Description
     */
    protected $description = "Start Command to get you started";

    /**
     * @inheritdoc
     */
    public function handle()
    {
        $data = Telegram::getWebhookUpdates();
        $this->replyWithMessage(['text' => 'start']);
    }
}
