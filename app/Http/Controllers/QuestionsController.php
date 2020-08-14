<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Auth;
use App\Tag;
use RealRashid\SweetAlert\Facades\Alert;


class QuestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'indexAll']);
    }

    public function indexAll()
    {
        $question = Question::all();
        return view('layouts.items.allQuestions', compact('question'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $question = $user->questions;
        return view('layouts.items.index', compact('question'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'tags' => 'required'
        ]);

        $tags_arr = explode(',', $request['tags']);

        $tag_ids = [];
        foreach($tags_arr as $tag_name){
            $tag = Tag::firstOrCreate(['tag_name' => $tag_name]);
            $tag_ids[] = $tag->id;
        }

        $user = Auth::user();
        $question = $user->questions()->create([
            
            'title' => $request['title'],
            'body' => $request['body']
        ]);

        $question->tags()->sync($tag_ids);
        
        Alert::success('Berhasil', 'Berhasil Menambahkan Pertanyaan');
        return redirect('/questions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);

        return view('layouts.items.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $tags = $question->tags()->where('questions_id', $id)->get();
        $tag_ids = [];
        foreach($tags as $tag){
            $tag_ids[] = $tag->tag_name;
        }
        $tags_arr = implode(",", $tag_ids);
        
        return view('layouts.items.edit', compact('question', 'tags_arr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'tags' => 'required'
        ]);
        
        $tags_arr = explode(',', $request['tags']);

        $tag_ids = [];
        foreach($tags_arr as $tag_name){
            $tag = Tag::firstOrCreate(['tag_name' => $tag_name]);
            $tag_ids[] = $tag->id;
        }

        $update = Question::where('id', $id)->update([
            'title' => $request['title'],
            'body' => $request['body']
        ]);

        $question = Question::find($id);
        $question->tags()->sync($tag_ids);

        return redirect('/questions')->with('success', 'Berhasil Memperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::destroy($id);
        return redirect('/questions')->with('success', 'Berhasil Menghapus!');
    }
}
