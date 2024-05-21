<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Command;

class InitializeApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:initialize-app';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize the application database and perform necessary migrations.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // create database
        DB::statement('CREATE DATABASE IF NOT EXISTS mwai_health_app_db');

        // perform migrations
        Artisan::call('migrate');
    }
}
