<?php

use Illuminate\Database\Seeder;

class RoleSeedPivot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            1 => [
                'permission' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 65, 76, 77, 83, 84, 85, 86, 87, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 34, 35, 36, 37, 38, 109, 110, 111, 112, 113, 114, 115, 120, 121, 122, 123, 124, 125, 126, 127, 128, 129, 130, 131, 132, 133, 134],
            ],
            3 => [
                'permission' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 24, 25, 26, 27, 28, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 83, 84, 85, 86, 87, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 19, 20, 21, 22, 23, 104, 105, 106, 107, 108, 34, 35, 36, 37, 38, 109, 110, 111, 112, 113, 114, 120, 121, 122, 123, 124, 125, 126, 127, 128, 129, 130, 131, 132, 133, 134, 115],
            ],
            4 => [
                'permission' => [1, 2, 3, 4, 5, 7, 8, 9, 10, 12, 13, 14, 15, 17, 24, 25, 26, 27, 28, 39, 40, 41, 42, 44, 45, 46, 47, 49, 50, 51, 52, 54, 57, 59, 60, 61, 62, 65, 76, 77, 83, 86, 93, 96, 98, 99, 100, 101, 102, 19, 22, 104, 107, 34, 35, 36, 37, 109, 110, 111, 112, 113, 114, 120, 121, 122, 123, 125, 126, 127, 128, 130, 131, 132, 133, 115],
            ],
            5 => [
                'permission' => [5, 17, 24, 25, 26, 27, 28, 39, 40, 41, 42, 44, 45, 46, 47, 49, 50, 51, 52, 54, 57, 59, 60, 61, 62, 65, 76, 77, 83, 86, 93, 96, 98, 99, 100, 101, 102, 19, 22, 104, 107, 34, 35, 36, 37, 109, 110, 111, 112, 113, 114, 120, 123, 125, 128, 130, 133, 115],
            ],
            6 => [
                'permission' => [5, 17, 39, 42, 44, 47, 49, 52, 54, 57, 59, 61, 62, 65, 76, 77, 83, 86, 93, 96, 98, 99, 100, 101, 102, 19, 22, 104, 107, 34, 35, 36, 37, 114, 120, 123, 125, 128, 130, 133, 115],
            ],
            7 => [
                'permission' => [5, 17, 39, 42, 44, 47, 49, 52, 54, 57, 59, 61, 62, 65, 76, 77, 83, 86, 93, 96, 98, 99, 100, 101, 102, 19, 22, 104, 107, 34, 35, 36, 37, 114, 120, 123, 125, 128, 130, 133, 115],
            ],
            8 => [
                'permission' => [39, 42, 44, 47, 49, 52, 54, 57, 59, 61, 62, 65, 76, 77, 83, 86, 93, 96, 98, 99, 100, 101, 102, 19, 22, 104, 107, 34, 35, 36, 37, 114, 120, 123, 125, 128, 130, 133, 115],
            ],

        ];

        foreach ($items as $id => $item) {
            $role = \App\Role::find($id);

            foreach ($item as $key => $ids) {
                $role->{$key}()->sync($ids);
            }
        }
    }
}
