<?php

namespace App\Jobs;

use App\Enums\ResultStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendResultJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $alternatives;

    protected $rest;

    protected $timeout = 7200;

    protected $limit;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($rest, $alternatives, $limit)
    {
        $this->alternatives = collect($alternatives)->keyBy('code')->toArray();
        $this->rest = $rest;
        $this->limit = $limit;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $alternatives = $this->alternatives;
        $rest = $this->rest;
        $i = 1;
        foreach ($rest as $code => $item) {
            $alternative = $alternatives[$code];
            $status = $i <= $this->limit ? ResultStatus::Passed : ResultStatus::Failed;
            $subject = 'Pemberitahuan Nomor Urut Calon Legistlatif Partai NasDem';
            $data = ['alternative' => $alternative, 'status' => $status];

            Mail::send('mail.selection_result', $data, function ($message) use ($alternative, $subject) {
                $message->to($alternative['profile']['email'], $alternative['name'])->subject($subject);
            });

            $i++;
        }
    }
}
