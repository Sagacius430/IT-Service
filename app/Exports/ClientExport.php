<?php

namespace App\Exports;

use App\{Client, Address};
use Maatwebsite\Excel\Concerns\FromCollection;
use Carbon\Carbon;

class ClientExport implements FromCollection
{
    protected $dateStart;
    protected $dateEnd;

    public function __construct($dateStart, $dateEnd){
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        $clients = Client::select('name', 'fone' ); //all();
        // $clients->address()->all();
        // $dateFrom = Carbon::create('1982-06-09T00:00:00.000Z');
        // $dateTo = Carbon::now()->toDateTimeString();

        if($this->dateStart != ''){

            $clients = $clients->where('created_at', '>=', $this->dateStart);

        }
        // else{

        //     $clients = $clients->where('created_at','>=', $this->$dateFrom);

        // }

        if($this->dateEnd != ''){

            $clients = $clients->where('created_at', '<=', $this->dateEnd);

        }
        // else{

        //      $clients = $clients->where('created_at','>=', $this->$dateTo);

        // }

        return $clients->get();
    }

    

    // public function query() 
    // {
    //     $this->dateFrom = $this->dateFrom . ' 00:00:00.000';
    //     $this->dateTo   = $this->dateTo . ' 23:59:59.999';

    //     $query = "
    //     SELECT * FROM `clients`

    //         WHERE `created_at` 
            
    //         BETWEEN '2020-12-17' AND '2020-12-22' C";

    //     return DB::select($query);
    // }
}
