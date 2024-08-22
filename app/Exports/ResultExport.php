<?php

namespace App\Exports;

use App\Enums\Gender;
use App\Models\Criteria;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ResultExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithColumnWidths
{
    use Exportable;

    public $result;

    public $alternatives;

    public function __construct(array $result, Collection|array $alternatives)
    {
        $this->result = $result;
        $this->alternatives = collect($alternatives)->keyBy('code')->toArray();
    }

    public function headings(): array
    {

        $title[] = 'Hasil Seleksi Penentuan Nomor Urut Calon Legislatif DPD NasDem Enrekang';
        $heading = ['#'];
        $headingCriterias = [];
        $headingAlternative = [];

        $headingAlternative = [
            'Kode',
            'Nama',
            'No. KK',
            'NIK',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Alamat',
            'No. HP',
            'Email',
        ];

        $criterias = Criteria::orderBy('id')->get();

        foreach ($criterias as $criteria) {
            $headingCriterias[] = $criteria->name;
        }

        return [
            $title,
            [],
            [],
            array_merge($heading, $headingAlternative, $headingCriterias),
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = [];
        $rank = 1;
        $alternatives = $this->alternatives;
        foreach ($this->result as $code => $res) {
            $alt = [];
            $subData = [];

            $alt = [
                $rank,
                $code,
                $alternatives[$code]['name'],
                "`{$alternatives[$code]['profile']['no_kk']}",
                "`{$alternatives[$code]['profile']['nik']}",
                Gender::getDescription($alternatives[$code]['profile']['gender']),
                $alternatives[$code]['profile']['place_of_birth'],
                $alternatives[$code]['profile']['date_of_birth'],
                $alternatives[$code]['profile']['address']['full_address'],
                $alternatives[$code]['profile']['phone_number'],
                $alternatives[$code]['profile']['email'],
            ];

            foreach ($alternatives[$code]['subcriteria'] as $sub) {
                $subData[] = $sub['name'];
            }

            $data[] = array_merge($alt, $subData);

            $rank++;
        }

        return collect($data);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => '20px']],
            4 => ['font' => ['bold' => true], 'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THICK,
                    'color' => ['argb' => '000000'],
                ],
            ]],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
        ];
    }
}
