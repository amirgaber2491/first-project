<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
//use App\Mail\NotifyMail;

class NotifyMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Notify Email With Users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $emails = User::pluck('email')->toArray();
        foreach ($emails as $email):
            $data = ['title'=>'Progarming', 'body'=> 'php'];
            Mail::to($emails)->send(new \App\Mail\NotifyMail($data));

        endforeach;

    }
}
