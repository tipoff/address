<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Theme\IndexThemes;
use Tipoff\EscapeRoom\Models\EscaperoomTheme;
use App\Transformers\ThemeTransformer;

class ThemesController extends Controller
{
    /**
     * @var App\Transformers\ThemeTransformer
     */
    protected $transformer;

    public function __construct(ThemeTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Http\Requests\Theme\IndexThemes $request
     * @return \Illuminate\Http\Response
     */
    public function index(IndexThemes $request)
    {
        $themes = EscaperoomTheme::filter($request->filter)
            ->paginate(
                $request->getPageSize()
            );

        return fractal($themes, $this->transformer)
            ->respond();
    }
}
