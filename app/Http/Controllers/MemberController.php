<?php

namespace App\Http\Controllers;

use App\Exports\MembersExport;
use App\Http\Requests\MemberStoreRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Member;
use Maatwebsite\Excel\Facades\Excel;

/**
 *
 */
class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $members = Member::join('schools', 'members.school_id', '=', 'schools.id');
        $members = $members->select('members.name as name',
                            'members.email',
                            'schools.name as school',
                            'schools.country as country'
                    );
        if (!is_null($search)) {
            $members = $members->where('schools.country', 'LIKE', "%{$search}%");
        }
        $members = $members->orderBy('members.id', 'desc')->paginate(12);
        return view('members.index', compact('members'));
    }

    public function create()
    {
        $schools = School::all();
        return view('members.add', compact('schools'));
    }

    public function store(MemberStoreRequest $request)
    {
        $input = $request->all();
        Member::create($input);
        return redirect('/members')->with("success", "New member added successfully");
    }

    public function downloadCsv()
    {
        $now = Carbon::now()->format('d_m_Y');
        $csv = "members_".$now.".csv";
        return Excel::download(new MembersExport(), $csv, \Maatwebsite\Excel\Excel::CSV);
    }

    public function chart()
    {
        $schools = School::pluck('name');
        $members = Member::groupBy('school_id')
            ->selectRaw('count(*) as total')
            ->pluck('total');
        $labels = $schools;
        $data = $members;
        return view('members.chart', compact('labels', 'data'));
    }
}

