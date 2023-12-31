<?php

namespace Chientd\Tagging\Console\Commands;

use Chientd\Tagging\Contracts\TaggingUtility;
use Chientd\Tagging\Model\TagGroup;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;


class GenerateTagGroup extends Command
{
    protected $name = 'tagging:create-group';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tagging:create-group {group_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a laravel tag group';


    protected $taggingUtility;



    public function __construct(TaggingUtility $taggingUtility)
    {
        parent::__construct();

        $this->taggingUtility = $taggingUtility;
    }



    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $group_name = $this->argument('group_name');

        $tag_group = new TagGroup();
        $tag_group->name = $group_name;
        $tag_group->slug = $this->taggingUtility->slug($group_name);

        $tag_group->save();


        $this->info('Created tag group: ' . $group_name);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['group_name', InputArgument::REQUIRED, 'Name of group'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            // ['group_name', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}