<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TreeViewModel;

class TreeViewModelSeeder extends Seeder
{
    public function run()
    {
        // Create parents A, B, C, D
        $parentA = TreeViewModel::create(['name' => 'A']);
        $parentB = TreeViewModel::create(['name' => 'B']);
        $parentC = TreeViewModel::create(['name' => 'C']);
        $parentD = TreeViewModel::create(['name' => 'D']);

        // Each parent has 2 children named as per parent
        $childrenA = [
            TreeViewModel::create(['name' => 'A.1', 'parent_id' => $parentA->id]),
            TreeViewModel::create(['name' => 'A.2', 'parent_id' => $parentA->id])
        ];

        $childrenB = [
            TreeViewModel::create(['name' => 'B.1', 'parent_id' => $parentB->id]),
            TreeViewModel::create(['name' => 'B.2', 'parent_id' => $parentB->id])
        ];

        $childrenC = [
            TreeViewModel::create(['name' => 'C.1', 'parent_id' => $parentC->id]),
            TreeViewModel::create(['name' => 'C.2', 'parent_id' => $parentC->id])
        ];

        $childrenD = [
            TreeViewModel::create(['name' => 'D.1', 'parent_id' => $parentD->id]),
            TreeViewModel::create(['name' => 'D.2', 'parent_id' => $parentD->id])
        ];

        // Each child has 2 sub-children named as per child
        foreach ([$childrenA, $childrenB, $childrenC, $childrenD] as $children) {
            foreach ($children as $child) {
                $subChildren = [
                    TreeViewModel::create(['name' => $child->name . '.1', 'parent_id' => $child->id]),
                    TreeViewModel::create(['name' => $child->name . '.2', 'parent_id' => $child->id])
                ];

                // Each sub-child has 2 sub-sub-children named as per sub-child
                foreach ($subChildren as $subChild) {
                    TreeViewModel::create(['name' => $subChild->name . '.1', 'parent_id' => $subChild->id]);
                    TreeViewModel::create(['name' => $subChild->name . '.2', 'parent_id' => $subChild->id]);
                }
            }
        }
    }
}
