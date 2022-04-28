<?php

namespace App\Providers;

use App\Providers\TodoHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StoreActivityTodoHistory
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\TodoHistory  $event
     * @return void
     */
    public function handle(TodoHistory $event)
    {
        $current_timestamp = Carbon::now()->toDateTimeString();
        $todoinfo = $event->todo;
        $create = $todoinfo->created_at;
        $update = $todoinfo->updated_at;

        $saveHistory = DB::table('todo_history')->insert(
            [
                'activity' => $update == $create ? 'Create' : 'Update',
                'user_id' => $todoinfo->user_id,
                'title' => $todoinfo->title,
                'description' => $todoinfo->description,
                'date' => $todoinfo->date,
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp]
        );
        return $saveHistory;
    }
}
