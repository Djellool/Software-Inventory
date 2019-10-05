<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class HistoriesExport extends DefaultValueBinder implements WithEvents,WithCustomValueBinder,FromCollection,WithHeadings,WithMapping,ShouldAutoSize,WithCustomStartCell,WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $historiesExportRepository;
    protected $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        $app = DB::table('applications')
            ->join('users as U' , 'U.id' , '=','applications.user_id')
            ->join('structures as S' , 'S.id' , '=','applications.struct_id')
            ->join('structures as R' , 'R.id' , '=','applications.structutilisatrice_id')
            ->select('applications.*','U.username','S.nom As STR','R.nom As StRutil')
            ->where('applications.id','=',$this->id)
            ->orderBy('DDM', 'asc')
            ->get();
        return $app;
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        // TODO: Implement columnFormats() method.
        return [

        ];
    }

    /**
     * @return string
     */
    public function startCell(): string
    {
        // TODO: Implement startCell() method.
        return 'B2';
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        // TODO: Implement registerEvents() method.
        return [
            AfterSheet::class => function(AfterSheet $event)
            {
                $event->sheet->getStyle('B2:V2')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FFA500');
            },
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // TODO: Implement headings() method.
        return [
            'id',
            'Nom',
            "Numero de version",
            "Developpement",
            "Editeur",
            "Date de mise en place",
            "Derniere date de mise a jour",
            "Nom du serveur",
            "Adresse Ip",
            "OS",
            "Version OS",
            "Base de donne",
            "Version DB",
            "Architecture",
            "Type de l'application",
            "Admin Sys",
            "Admin BD",
            "Responsable",
            "Admin metrier",
            "structure",
            "Structure d'utilisation",
        ];
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($app): array
    {
        $interne = "Externe";
        if($app->interne)
        {
            $interne = "Interne";
        }
        // TODO: Implement map() method.
        return [
            $app->id,
            $app->nom,
            $app->Nver,
            $interne,
            $app->editeur,
            $app->DMP,
            $app->DDM,
            $app->nomserveur,
            $app->adressIP,
            $app->OS,
            $app->verOS,
            $app->DB,
            $app->verDB,
            $app->Architecture,
            $app->typeapp,
            $app->adsys,
            $app->adbd,
            $app->username,
            $app->admetier,
            $app->STR,
            $app->StRutil,
        ];
    }
}
