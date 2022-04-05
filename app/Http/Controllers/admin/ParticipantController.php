<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ParticipantModel;
use DB;

class ParticipantController extends Controller
{

  public function index()
  {

    return view('admin/participant.index');
  }

  public function getParticipants(Request $request)
  {

    $draw = $request->get('draw');
    $start = $request->get("start");
    $rowsPerPage = $request->get("length");
    $aColumnIndex = $request->get('order');
    $aColumnNames = $request->get('columns');
    $aOrders = $request->get('order');
    $aSearchs = $request->get('search');
    $columnIndex = $aColumnIndex[0]['column'];
    $columnName = $aColumnNames[$columnIndex]['data'];
    $columnSortOrder = $aOrders[0]['dir'];
    $searchValue = $aSearchs['value'];

    $totalRecords = ParticipantModel::count();
    $totalRecordsFiltered = $this->getTotalRecordsFiltered($totalRecords, $searchValue);

    $aParticipants = $this->getPaginatedParticipants($searchValue, $columnName, $columnSortOrder, $start, $rowsPerPage);
    $aParticipantsData = $this->getPaginatedParticipantsData($aParticipants);

    $response = array(
      "draw" => intval($draw),
      "iTotalRecords" => $totalRecords,
      "iTotalDisplayRecords" => $totalRecordsFiltered,
      "aaData" => $aParticipantsData
    );

    echo json_encode($response);

    exit;
  }

  private function getTotalRecordsFiltered($totalRecords, $searchValue)
  {

    $totalRecordsFiltered = $totalRecords;

    if (!empty($searchValue)) {
      $totalRecordsFiltered = $this->getTotalRecordsByFilter($searchValue);
    }

    return $totalRecordsFiltered;
  }

  private function getPaginatedParticipants($searchValue, $columnName, $columnSortOrder, $start, $rowsPerPage)
  {

    if (empty($searchValue)) {
      $aParticipants = $this->getPaginatedParticipantsNoFilter($columnName, $columnSortOrder, $start, $rowsPerPage);
    } else {
      $aParticipants = $this->getPaginatedParticipantsFilter($searchValue, $columnName, $columnSortOrder, $start, $rowsPerPage);
    }

    return $aParticipants;
  }

  private function getPaginatedParticipantsNoFilter($columnName, $columnSortOrder, $start, $rowsPerPage)
  {

    $aParticipants = DB::transaction(function () use ($columnName, $columnSortOrder, $start, $rowsPerPage) {

      DB::raw('SET SESSION TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;');

      $aParticipants = DB::table('participant as p')
        ->whereNull('p.deleted_at')
        ->select('p.*')
        ->orderBy($columnName, $columnSortOrder)
        ->skip($start)
        ->take($rowsPerPage)
        ->get();

      DB::raw('SET SESSION TRANSACTION ISOLATION LEVEL REPEATABLE READ;');

      return $aParticipants;
    });

    return $aParticipants;
  }

  private function getPaginatedParticipantsFilter($searchValue, $columnName, $columnSortOrder, $start, $rowsPerPage)
  {

    $aParticipants = DB::transaction(function () use ($searchValue, $columnName, $columnSortOrder, $start, $rowsPerPage) {

      DB::raw('SET SESSION TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;');

      $aParticipants = DB::table('participant as p')
        ->whereNull('p.deleted_at')
        ->where(function ($query) use ($searchValue) {
          $query->where('p.name', 'like', '%' . $searchValue . '%')
            ->orWhere('p.last_name', 'like', '%' . $searchValue . '%')
            ->orWhere('p.dni', 'like', '%' . $searchValue . '%')
            ->orWhere('p.phone', 'like', '%' . $searchValue . '%')
            ->orWhere('p.team', 'like', '%' . $searchValue . '%');
        })
        ->select('p.*')
        ->orderBy($columnName, $columnSortOrder)
        ->skip($start)
        ->take($rowsPerPage)
        ->get();

      DB::raw('SET SESSION TRANSACTION ISOLATION LEVEL REPEATABLE READ;');

      return $aParticipants;
    });

    return $aParticipants;
  }

  private function getTotalRecordsByFilter($searchValue)
  {

    $totalRecordsFilter = DB::transaction(function () use ($searchValue) {

      DB::raw('SET SESSION TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;');

      $totalRecordsFilter = DB::table('participant as p')
        ->whereNull('p.deleted_at')
        ->where(function ($query) use ($searchValue) {
          $query->where('p.name', 'like', '%' . $searchValue . '%')
            ->orWhere('p.last_name', 'like', '%' . $searchValue . '%')
            ->orWhere('p.dni', 'like', '%' . $searchValue . '%')
            ->orWhere('p.phone', 'like', '%' . $searchValue . '%')
            ->orWhere('p.team', 'like', '%' . $searchValue . '%');
        })
        ->count();

      DB::raw('SET SESSION TRANSACTION ISOLATION LEVEL REPEATABLE READ;');

      return $totalRecordsFilter;
    });

    return $totalRecordsFilter;
  }

  private function getPaginatedParticipantsData($aParticipants)
  {

    $aParticipantsData = array();

    foreach ($aParticipants as $oParticipant) {

      $aParticipantsData[] = array(
        "id" => $oParticipant->id,
        "name" => $oParticipant->name,
        "last_name" => $oParticipant->last_name,
        "dni" => $oParticipant->dni,
        "phone" => $oParticipant->phone,
        "team" => $oParticipant->team,
        "created_at" => date('d-m-Y H:i:s', strtotime($oParticipant->created_at))
      );
    }

    return $aParticipantsData;
  }

  public function export(Request $request)
  {

    $fileName = 'participants.csv';

    $headers = array(
      "Content-type" => "text/csv",
      "Content-Disposition" => "attachment; filename=$fileName",
      "Pragma" => "no-cache",
      "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
      "Expires" => "0"
    );

    $columns = array('Id', 'Name', 'Last Name', 'DNI', 'Phone', 'Team', 'Objective', 'Date');

    $callback = function () use ($columns) {

      $file = fopen('php://output', 'w');
      fputs($file, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF)));
      fputcsv($file, $columns);

      DB::transaction(function () use ($file) {

        DB::raw('SET SESSION TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;');

        $aParticipants = DB::table('participant as p')
          ->whereNull('p.deleted_at')
          ->select('p.*')
          ->orderBy('p.created_at', 'asc')
          ->chunk(50000, function ($aParticipants) use ($file) {
            foreach ($aParticipants as $oParticipant) {

              $row = array();

              $row['id'] = $oParticipant->id;
              $row['name'] = $oParticipant->name;
              $row['last_name'] = $oParticipant->last_name;
              $row['dni'] = $oParticipant->dni;
              $row['phone'] = $oParticipant->phone;
              $row['team'] = $oParticipant->team;
              $row['objective'] = $oParticipant->objective;
              $row['created_at'] = date('d-m-Y H:i:s', strtotime($oParticipant->created_at));

              fputcsv($file, $row);
            }
          });

        DB::raw('SET SESSION TRANSACTION ISOLATION LEVEL REPEATABLE READ;');
      });

      fclose($file);
    };

    return response()->stream($callback, 200, $headers);
  }
}
