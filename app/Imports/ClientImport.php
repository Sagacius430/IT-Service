<?php

namespace App\Imports;

use App\Client;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\withHeadingRow;

class ClientImport implements ToModel, withHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Client([
                            //tratamento para arquivos com cabacalho
            'name' => $row['nome'],
            'fone' => $row['telefone'],
        ]);
    }

}
