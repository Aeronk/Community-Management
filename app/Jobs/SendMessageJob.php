<?php

namespace App\Jobs;

use Log;
use MessageBird\Client;
use Illuminate\Bus\Queueable;
use MessageBird\Objects\Message;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use MessageBird\Exceptions\BalanceException;
use MessageBird\Exceptions\AuthenticateException;

class SendMessageJob implements ShouldQueue 
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected static $client = null;

    protected $message = '';

    protected $phone = '';


    protected $from = '';
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($message, $phone, $from)
    {
        $this->message = $message;
        $this->phone = $phone;
        $this->from = $from;

        if(static::$client === null) {
            static::$client = new Client(config('messagebird.ACCESS_KEY'));
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $message = $this->createMessage();

        try {
            if(static::$client->messages->create($message)) {
                Log::info('Message sent successfully');
            }
        } catch (AuthenticateException $e) {
            Log::critical("Exception of type: " . get_class($e) . " thrown in " . __CLASS__ . $e->getMessage());
        } catch (BalanceException $e) {
               Log::critical("Exception of type: " . get_class($e) . " thrown in " . __CLASS__ . $e->getMessage());
        } catch (Exception $e) {
               Log::critical("Exception of type: " . get_class($e) . " thrown in " . __CLASS__ . $e->getMessage());
        }
    }

    /**
     * 
     * @return [type] [description]
     */
    protected function createMessage()
    {
        $message = new Message();

        $message->originator = $this->from;;
        $message->recipients = array($this->phone);
        $message->body       = $this->message;

        return $message;
    }
}
