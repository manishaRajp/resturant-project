<?php

namespace App\Console\Commands;

use App\Mail\SendMailable;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class Countregisteredrestaurant extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'countregistered:restaurant';
    

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email og registered Resturant';

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
     * @return int
     */
    public function handle()
    {
        $totalrest = DB::table('resturants')
        ->whereRaw('Date(created_at) = CURDATE()')
        ->count();
        Mail::to(Config::get('app.MAIL_FROM'))->send(new SendMailable($totalrest));
    }
}
