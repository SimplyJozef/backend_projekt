<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StageInfo;
use Illuminate\Http\Request;

class StageInfoController extends Controller
{
    public function updateStageInfo(Request $request, int $id)
    {
        $stageInfo = StageInfo::find($id);

        if (!$stageInfo) {
            return redirect()->route('adminrozhranie')->with('error', 'Stage Info not found');
        }

        $cas_od = $request->input('cas_od');
        $cas_do = $request->input('cas_do');
        $nazov = $request->input('nazov');
        $popis = $request->input('popis');
        $speaker = $request->input('speaker');
        $firma = $request->input('firma');
        $max_capacity = $request->input('max_capacity');

       // if (empty($cas_od) || empty($cas_do) || empty($nazov) || empty($popis) || empty($speaker) || empty($firma) || empty($max_capacity)) {
       #     return redirect()->route('adminrozhranie')->with('error', 'Incomplete data');
      #  }

        $stageInfo->cas_od = $cas_od;
        $stageInfo->cas_do = $cas_do;
        $stageInfo->nazov = $nazov;
        $stageInfo->popis = $popis;
        $stageInfo->speaker = $speaker;
        $stageInfo->firma = $firma;
        $stageInfo->max_capacity = $max_capacity;
        $stageInfo->save();

        return redirect()->route('adminrozhranie')->with('success', 'Stage Info updated successfully');
    }
}
