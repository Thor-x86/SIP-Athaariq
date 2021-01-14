<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\News;

class EditorialController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $isCurator = Auth::user()->role->is_curator;
    $data = [];

    if($isCurator) {
      $entities = News::orderBy('created_at', 'DESC')->get()->all();
      foreach($entities as $entity) {
        array_push($data, [
          'id' => $entity->id,
          'name' => $entity->name,
          'title' => $entity->title,
          'publisher' => $entity->user->name,
          'when' => $entity->created_at
        ]);
      }
    } else {
      $entities = User::getLogged()->news()->orderBy('created_at', 'DESC')->get()->all();
      foreach($entities as $entity) {
        array_push($data, [
          'id' => $entity->id,
          'name' => $entity->name,
          'title' => $entity->title,
          'publisher' => $entity->user->name,
          'when' => $entity->created_at
        ]);
      }
    }

    return Inertia::render(
      'Editorial/Index',
      compact(['isCurator', 'data'])
    );
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return Inertia::render('Editorial/Edit');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $title = $request->input('title');
    $content = $request->input('content');

    $entity = new News();
    $entity->title = $title;
    $entity->content = $content;
    $entity->user_id = Auth::id();
    $entity->save();

    return Inertia::location('/editorial');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $entity = News::find($id);

    $isCurator = Auth::user()->role->is_curator;
    $title = $entity->title;
    $publisher = $entity->user->name;
    $when = $entity->created_at;
    $content = $entity->content;

    return Inertia::render(
      'Editorial/Show',
      compact(['id', 'isCurator', 'title', 'publisher', 'when', 'content'])
    );
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $entity = News::find($id);

    $isCurator = Auth::user()->role->is_curator;
    $title = $entity->title;
    $publisher = $entity->user->name;
    $when = $entity->created_at;
    $content = $entity->content;

    return Inertia::render(
      'Editorial/Edit',
      compact(['id', 'isCurator', 'title', 'publisher', 'when', 'content'])
    );
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
    $title = $request->input('title');
    $content = $request->input('content');

    $entity = News::find($id);
    $entity->title = $title;
    $entity->content = $content;
    $entity->update();

    return Inertia::location('/editorial' . '/' . $id);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $entity = News::find($id);
    $entity->delete();

    return Inertia::location('/editorial');
  }
}
