<?php

namespace App\Console\Commands;

use App\Jobs\TestJob;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * 控制台命令 signature 的名称。
     *
     * @var string
     */
    protected $signature = 'test:jobs {--num=}';

    /**
     * 控制台命令说明。
     *
     * @var string
     */
    protected $description = 'job生成器';


    /**
     * 执行控制台命令。
     *
     * @return mixed
     */
    public function handle()
    {
        $num = $this->option('num');
        for($i = 0; $i <= $num; $i++) {
            $queueName = 'default';//这里可以按照业务取模之后启动多个队列
            $job = (new TestJob($i))->onQueue($queueName);
            dispatch($job);
        }
    }
}