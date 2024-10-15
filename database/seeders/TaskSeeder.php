<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create(['dni' => '75485214', 'title' => 'Tarea 1', 'description' => 'Descripción de la tarea 1', 'due_date' => '2024-10-15', 'status' => 'pending']);
        Task::create(['dni' => '75485215', 'title' => 'Tarea 2', 'description' => 'Descripción de la tarea 2', 'due_date' => '2024-10-16', 'status' => 'in_progress']);
        Task::create(['dni' => '75485216', 'title' => 'Tarea 3', 'description' => 'Descripción de la tarea 3', 'due_date' => '2024-10-17', 'status' => 'completed']);
        Task::create(['dni' => '75485217', 'title' => 'Tarea 3', 'description' => 'Descripción de la tarea 3', 'due_date' => '2024-10-14', 'status' => 'completed']);
    }
}
