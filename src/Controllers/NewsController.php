<?php
namespace Southcoastweb\News\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Southcoastweb\News\Models\News;
use Auth;

class NewsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $articles = News::get();
		return view("News::index", compact('articles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view("News::add");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $this->validate(request(), [
            'title' => 'required|min:6',
            'news'  => 'required'
        ]);

        $article = new News();
        $article->title = request('title');
        $article->news  = request('news');
        $article->user_id = Auth::id();
        $article->save();

        // Return successful response
        $message = array('type'     => 'success',
                         'message'  => 'Article was added.'
        );
        return redirect('news')->withMessage($message);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $id = decrypt($id);
        $article = News::find($id);
        return view("News::show", compact('article'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $id = decrypt($id);
        $article = News::find($id);
        return view("News::edit", compact('article'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$id = decrypt($id);
        $article = News::find($id);
        $article->title = request('title');
        $article->news  = request('news');
        // Return successful response
        $message = array('type'     => 'success',
                         'message'  => 'Article was updated.'
        );
        return redirect('news')->withMessage($message);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public static function widget($qty = 10)
    {
        $articles = News::orderBy('created_at', 'DESC')
                        ->take($qty)
                        ->get();

        return view("News::widget", compact('articles'));
    }

}
