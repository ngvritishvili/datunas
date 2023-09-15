<?php

namespace App\Imports;

use App\Models\Client;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ClientImport implements ToModel,
    WithChunkReading,
    WithStartRow,
    SkipsOnError,
    WithBatchInserts
{
    use Importable, SkipsErrors;

    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        try {
            $player = Client::updateOrCreate([
                'phone' => $row[3],
            ]);

            $player->update([
                'first_name' => $row[0] ?? '',
                'last_name' => $row[1] ?? '',
                'personal_id' => $row[2] ?? '',
            ]);

        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function startRow(): int
    {
        return 2;
    }
}
