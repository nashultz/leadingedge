<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ConvertCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'convert:excel';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Converts Excel Spreadsheet to MySQL';

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
	public function fire()
	{
		$excel_dir = "/Users/romanlopez/Documents/";

		$table = PHPExcel_IOFactory::load($excel_dir . 'NewConstruction603.ods');

		$worksheet = $table->setActiveSheetIndexByName('Sheet1');

		foreach($worksheet->getRowIterator() as $rowIndex=>$row)
		{
			if ($rowIndex > 1)
			{
				$nName = $worksheet->getCellByColumnAndRow(0, $rowIndex);
				$nName = str_replace('@', 'at', $nName);

				$nCity = $worksheet->getCellByColumnAndRow(1, $rowIndex);
				$nISD = $worksheet->getCellByColumnAndRow(5, $rowIndex);
				$nDistrict = $worksheet->getCellByColumnAndRow(6, $rowIndex);

				$bName = $worksheet->getCellByColumnAndRow(2, $rowIndex);
				$bPrice = $worksheet->getCellByColumnAndRow(3, $rowIndex);
				$bSizes = $worksheet->getCellByColumnAndRow(4, $rowIndex);
				$bWebsite = $worksheet->getCellByColumnAndRow(7, $rowIndex);
				$bAgent = $worksheet->getCellByColumnAndRow(8, $rowIndex);
				$bPhone = $worksheet->getCellByColumnAndRow(9, $rowIndex);

				$builder = new Builder();

				$builder->name = $bName;
				$builder->slug = Str::slug($bName);

				$bPrices = explode('-', $bPrice);
				$builder->min_price = (int) ($bPrices[0] . '000');
				$builder->max_price = (int) ($bPrices[1] . '000');

				if ($bSizes == 'custom')
				{
					$builder->min_size = 0;
					$builder->max_size = 0;
				}
				else 
				{
					$bSizes = explode('-', $bSizes);
					$builder->min_size = (int) $bSizes[0];
					$builder->max_size = (int) $bSizes[1];
				}

				$builder->website = $bWebsite;
				$builder->agent = $bAgent;
				$builder->phone = $bPhone;

				$neighborhood = Neighborhood::where('slug', Str::slug($nName, '-'))->first();
				if (!$neighborhood)
				{
					$this->info('Creating New Neighborhood: ' . $nName);

					$neighborhood = Neighborhood::create(array(
						'name'=>$nName,
						'slug'=>Str::slug($nName, '-'),
						'city'=>$nCity,
						'isd'=>$nISD,
						'district'=>$nDistrict
					));
				}
				else
				{
					$this->info('Neighborhood Found: ' . $neighborhood->name);
				}

				$this->info('Attaching Builder: ' . $builder->name . ' to Neighborhood: ' . $neighborhood->name);

				$neighborhood->builders()->save($builder);
			}
		}

		$this->info('Completed');		
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}

}
