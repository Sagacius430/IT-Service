<?php

namespace App\Exports;

use App\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Carbon\Carbon;

class ClientExport implements FromCollection
{
    protected $dataStart;
    protected $dataEnd;

    public function __construct($dataStart, $dataEnd){
        $this->dateStart = $dataStart;
        $this->dataEnd = $dataEnd;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $clients = Client::select('name', 'fone', ); //all();
        $date1 = Carbon::createFromFormat('Y-m-d', '1982-06-09');
        $date2 = Carbon::now()->toDateTimeString();

        if($this->dateStart != ''){

            $clients = $clients->where('created_at', '>=', $this->dateStart);

        }else{

            $clients = $clients->where('created_at','>=', $this->$date1);

        }

        if($this->dateEnd != ''){

            $clients = $clients->where('created_at', '<=', $this->dateEnd);

        }else{

             $clients = $clients->where('created_at','>=', $this->$date2);

        }

        return $clients->get();
    }
}
