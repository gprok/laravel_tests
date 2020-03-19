<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Member;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EventController extends Controller
{
    public function assign_event_form()
    {
        $data['events'] = Event::all();
        $data['members'] = Member::all();

        return View('event.register', $data);
    }

    public function do_assign_event(Request $request)
    {
        try {
            $event = Event::find($request->event);
            $event->members()->attach($request->member);
        } catch(\Illuminate\Database\QueryException $ex){
            echo "Member already registerd";
        }

        return Redirect('event/register');
    }

    public function member($id) {
        $data['member'] = Member::find($id);

        return View('event.member', $data);
    }

    public function event($id) {
        $event = Event::find($id);
        echo "<h1>" . $event->title . "</h1>";
        echo "<ol>";
        foreach ($event->members as $member) {
            echo "<li>" . $member->name . "</li>";
        }
        echo "</ol>";
    }

    public function cancel($event_id, $member_id) {
        try {
            $event = Event::find($event_id);
            $event->members()->detach($member_id);
        } catch(\Illuminate\Database\QueryException $ex){
            echo "Member not registerd";
        }

        return Redirect('event/member/' . $member_id);
    }

}
