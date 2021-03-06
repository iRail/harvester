<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ManualScrapeCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'harvest:scrape';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Run this execute a specified scraping job now.';

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
	 * @return void
	 */
	public function fire()
	{
		// message
		$data = array(
			'type' => $this->argument('type'),
			'id'   => $this->argument('id'),
			'date' => $this->argument('date'),
		);

		// fire
		$scraper = new Scraper();
		$scraper->execute($data);
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{

		return array(
			array('type', InputArgument::REQUIRED, 'The type: "trip" or "stop".'),
			array('id', InputArgument::REQUIRED, 'The id.'),
			array('date', InputArgument::REQUIRED, 'The date in "Ymd" format.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{

		return array();

		/*
		return array(
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);*/
	}

}