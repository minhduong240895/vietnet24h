<?php

namespace App\Http\Controllers\THEME;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Comment;
use App\Models\MapNewsTag;
use App\Models\News;
use App\Models\Option;
use App\Models\Tag;
use App\Models\Topic;
use App\Repositories\CommentsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * @var Request
     */
    protected $request = null;

    /**
     * @var BaseRepository
     */
    protected $response = null;

    public function __construct(Request $request, ResponseFactory $response)
    {
        $this->request = $request;
        $this->response = $response;

        $categories = Category::limit(10)->get();

        //options
        $hotline = Option::where('slug', 'hotline')->first();
        $hotline = strip_tags($hotline->description);

        $footerAddress = Option::where('slug', 'footer-dia-chi')->first();
        $footerAddress = strip_tags($footerAddress->description);

        $footerHotline = Option::where('slug', 'footer-hotline')->first();
        $footerHotline = strip_tags($footerHotline->description);

        $footerEmail = Option::where('slug', 'footer-email')->first();
        $footerEmail = strip_tags($footerEmail->description);

        $footerADS = Option::where('slug', 'footer-lien-he-quang-cao')->first();
        $footerADS = strip_tags($footerADS->description);

        $linkFace = Option::where('slug', 'link-facebook')->first();
        $linkFace = strip_tags($linkFace->description);

        $linkYoutube = Option::where('slug', 'link-youtube')->first();
        $linkYoutube = strip_tags($linkYoutube->description);

        $linkGoogle = Option::where('slug', 'link-google-plus')->first();
        $linkGoogle = strip_tags($linkGoogle->description);

        $linkTwitter = Option::where('slug', 'link-twitter')->first();
        $linkTwitter = strip_tags($linkTwitter->description);

        $data = ['categories' => $categories, 'hotline' => $hotline, 'footerADS' => $footerADS
            , 'footerAddress' => $footerAddress, 'footerHotline' => $footerHotline, 'footerEmail' => $footerEmail,
            'linkFace' => $linkFace, 'linkYoutube' => $linkYoutube, 'linkGoogle' => $linkGoogle, 'linkTwitter' => $linkTwitter,
        ];
        return view::share('data', $data);
    }

    function index() {

        $hot_news = News::where('hot', '2')->orderBy('id', 'desc')->take(8)->get();
        if(count($hot_news) > 0){
            $first_hot_news = $hot_news[0];
            unset($hot_news[0]);
        }else{
            $first_hot_news = '';
        }
        $ads_1 = Banner::where('position', 'home-1')->first();
        $ads_2 = Banner::where('position', 'home-2')->first();
        $ads_3 = Banner::where('position', 'home-3')->first();
        $ads_4 = Banner::where('position', 'home-4')->first();

        $categories = Category::take(6)->get();
        return view('homes.index', ['hot_news' => $hot_news, 'first_hot_news' => $first_hot_news,
            'ads_1' => $ads_1, 'ads_2' => $ads_2, 'ads_3' => $ads_3, 'ads_4' => $ads_4, 'categories' => $categories
        ]);
    }
    function category($slug) {

        $ads_1 = Banner::where('position', 'category-1')->first();
        $ads_2 = Banner::where('position', 'category-2')->first();
        $ads_3 = Banner::where('position', 'category-3')->first();
        $currentCate = Category::where('slug', $slug)->first();
        $listtopics = Topic::where('category_id', $currentCate->id)->take(10)->get();
        $arrTopicID = [];
        foreach ($listtopics as $topic){
            $arrTopicID[] = $topic->id;
        }
        $listHotNews = News::whereIn('topic_id', $arrTopicID)->orderBy('id', 'desc')->where('hot', 2)->take(5)->get();
        $arrHotNewsID = [];

        foreach ($listHotNews as $news){
            $arrHotNewsID[] = $news->id;
        }
        if(count($listHotNews) > 0){
            $first_hot_news = $listHotNews[0];
            unset($listHotNews[0]);
        }else{
            $first_hot_news = '';
        }
        $listNews = News::whereIn('topic_id', $arrTopicID)->whereNotIn('id', $arrHotNewsID)->orderBy('id', 'desc')->paginate(5);
        return view('homes.category', ['currentCate' => $currentCate, 'listtopics' => $listtopics,
            'listHotNews' => $listHotNews, 'listNews' => $listNews, 'first_hot_news' => $first_hot_news, 'arrHotNewsID' => $arrHotNewsID,
            'ads_1' => $ads_1, 'ads_2' => $ads_2, 'ads_3' => $ads_3
        ]);
    }
    function topic($slug) {

        $ads_1 = Banner::where('position', 'category-1')->first();
        $ads_2 = Banner::where('position', 'category-2')->first();
        $ads_3 = Banner::where('position', 'category-3')->first();
        $currentTopic = Topic::where('slug', $slug)->first();
        $currentCate = $currentTopic->category;
        $listtopics = Topic::where('category_id', $currentCate->id)->take(10)->get();
        $arrTopicID = [];
        foreach ($listtopics as $topic){
            $arrTopicID[] = $topic->id;
        }
        $listHotNews = News::where('topic_id', $currentTopic->id)->orderBy('id', 'desc')->where('hot', 2)->take(5)->get();
        $arrHotNewsID = [];

        foreach ($listHotNews as $news){
            $arrHotNewsID[] = $news->id;
        }
        if(count($listHotNews) > 0){
            $first_hot_news = $listHotNews[0];
            unset($listHotNews[0]);
        }else{
            $first_hot_news = '';
        }
        $listNews = News::where('topic_id', $currentTopic->id)->whereNotIn('id', $arrHotNewsID)->orderBy('id', 'desc')->paginate(5);
        return view('homes.topic', ['currentCate' => $currentCate,'currentTopic' => $currentTopic, 'listtopics' => $listtopics,
            'listHotNews' => $listHotNews, 'listNews' => $listNews, 'first_hot_news' => $first_hot_news, 'arrHotNewsID' => $arrHotNewsID,
            'ads_1' => $ads_1, 'ads_2' => $ads_2, 'ads_3' => $ads_3
        ]);
    }
    function news($slug) {
        $ads_1 = Banner::where('position', 'detail-1')->first();

        $news = News::where('slug', $slug)->first();
        $currentTopic = $news->topic;
        $currentCate = $currentTopic->category;
        $listtopics = Topic::where('category_id', $currentCate->id)->take(10)->get();
        $hot_news = News::where('hot', '2')->orderBy('id', 'desc')->take(5)->get();
        $related_news = explode('|', $news->related_news);
        $related_news = News::whereIn('id', $related_news)->orderBy('id', 'desc')->take(3)->get();
        $sibling_news = explode('|', $news->sibling_news);
        $sibling_news = News::whereIn('id', $sibling_news)->orderBy('id', 'desc')->take(4)->get();
        $map = MapNewsTag::where('news_id', $news->id)->orderBy('created_at', 'desc')->get();
        $tags = [];
        foreach ($map as $m){
            $tags[] = $m->tag_id;
        }
        $comments = Comment::where([
            ['news_id', $news->id],
            ['status', 2],
        ])->orderBy('id', 'desc')->take(5)->get();
        $AllComments = Comment::where([
            ['news_id', $news->id],
            ['status', 2],
        ])->orderBy('id', 'desc')->get();
        $cout_cmt = count($AllComments);
        $tags = Tag::whereIn('id', $tags)->orderBy('id', 'desc')->take(6)->get();
        return view('homes.news', [
            'news' => $news, 'currentCate' => $currentCate,'currentTopic' => $currentTopic, 'listtopics' => $listtopics,
            'hot_news' => $hot_news, 'related_news' => $related_news, 'sibling_news' => $sibling_news, 'tags' => $tags,
            'comments' => $comments, 'cout_cmt' => $cout_cmt, 'ads_1' => $ads_1
        ]);
    }
    function saveComment(Request $request, CommentsRepository $repository ) {
        $data = $request->all();
        $dataSave = [
            'name' => $data['comment_name'],
            'email' => $data['comment_email'],
            'news_id' => $data['news_id'],
            'description' => $data['cmt_description'],
            'ip' => $request->ip(),
            'status' => 1,
        ];
        $repository->create($dataSave);
        $news = News::find($data['news_id']);
        return redirect()->route('tin-tuc.detail', ['slug' => $news->slug])->with('sent_cmt', '1');
    }
    function getMoreComment(Request $request) {
        $data = $request->all();
        $id = $data['newsID'];
        $currentItem = $data['currentItem'];
        $count = $currentItem + 5;
        $comments = Comment::where([
            ['news_id', $id],
            ['status', 2],
        ])->orderBy('id', 'desc')->take($count)->get();
        return $comments;
    }

}
