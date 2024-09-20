<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TreeViewModel;

class TreeViewController extends Controller
{
    public function index()
    {
        $treeData = TreeViewModel::with('children')->whereNull('parent_id')->get();
        return view('treeview.index', compact('treeData'));
    }

    public function update(Request $request)
    {
        $node = TreeViewModel::find($request->id);
        $node->is_checked = $request->is_checked;
        $node->save();

        if ($node->children) {
            foreach ($node->children as $child) {
                $child->is_checked = $request->is_checked;
                $child->save();

                foreach ($child->children as $subChild) {
                    $subChild->is_checked = $request->is_checked;
                    $subChild->save();

                    foreach ($subChild->children as $subSubChild) {
                        $subSubChild->is_checked = $request->is_checked;
                        $subSubChild->save();
                    }
                }
            }
        }

        return response()->json(['success' => true]);
    }
}
