<?php

namespace App\Http\Controllers;

use App\Services\PageService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Метод контроллера получения нужного шаблона для страницы
     * 
     * @param string $page
     * @access public
     * @return mixed
     */
    public function switch_page($page, PageService $service, Request $request)
    {
        return $service->page_view($page, $request);
    }
}
