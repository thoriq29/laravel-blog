<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use DB;

class ContentsController extends Controller
{
    public function insertform() {
        $edit = false;
        return view('contents.form', compact('edit'));
    }

    public function editForm($id) {
        $data = Content::where('id',$id)-> first();
        $edit = true;
        return view('contents.form',compact('data', 'edit'));
    }

    public function insert(Request $request) {
        $date = date('Y-m-d');
        $title = $request->input('title');
        $excerpt = $request->input('excerpt');
        $content = $request->input('content');
        $query = DB::insert('insert into contents (`title`, `excerpt`, `content`, `user_id`, `created_at`, `updated_at`) values(?,?,?,?,?,?)',
                   [$title, $excerpt, $content, NULL, $date, $date]);
        if ($query) {
            $request->session()->flash('alert-success', 'Content was successful added!');
            return redirect('/contents');
        }
    }

    function index() {
        $data = Content::paginate(20);
        return view('contents.index', compact('data'));
    }

    function update(Request $request, $id) {
        $data = Content::where('id',$id)-> get();
        $title = $request->input('title');
        $excerpt = $request->input('excerpt');
        $content = $request->input('content');
        $updateddate = date('Y-m-d');
        $new_data = [
            'title'=>$title,
            'excerpt'=>$excerpt,
            'content'=>$content,
            'updated_at'=>$updateddate 
        ];
        $save = Content::where('id',$id)->update($new_data);
        if ($save) {
            return redirect('/contents');
        }
        return redirect('/contents/edit/'.$id);
    }

    public function destroy($id) {
        $data = Content::findOrFail($id);
        $data->delete();
        return redirect('/contents');
    }
}
