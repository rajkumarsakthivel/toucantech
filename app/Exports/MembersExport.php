<?php

namespace App\Exports;

use App\Models\Member;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

/**
 *
 */
class MembersExport implements FromCollection, WithHeadings
{
    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        $records = Member::join('schools', 'members.school_id', '=', 'schools.id')
            ->select('members.name', 'members.email', 'schools.name as school_name')
            ->get();
        $result = array();
        foreach ($records as $record) {
            $result[] = array(
                'name'   => $record->name,
                'email'  => $record->email,
                'school' => $record->school_name
            );
        }

        return collect($result);
    }

    /**
     * @return string[]
     */
    public function headings(): array
    {
        return [
            'name',
            'email',
            'school'
        ];
    }
}
