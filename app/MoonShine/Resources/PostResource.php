<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\CustomPost;

use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class PostResource extends Resource
{
	public static string $model = CustomPost::class;

	public static string $title = 'Articles';

	public function fields(): array
	{
		return [
		    ID::make()->sortable(),
        ];
	}
 
    protected bool $createInModal = true; 
 
    protected bool $editInModal = true; 
    protected string $routeAfterSave = 'index';
    public static bool $simplePaginate = true;
    protected string $itemsView = 'moonshine::crud.shared.table'; 
    public function itemsView(): string
    {
        return $this->itemsView;
    } 
    public static string $subTitle = 'Article Management'; // Text under section heading 
 
    public static array $with = ['category']; // Eager load 
 
    public static bool $withPolicy = false; // Authorization 
 
    public static string $orderField = 'id'; // Default sort field 
 
    public static string $orderType = 'DESC'; // Default sort type 
 
    public static int $itemsPerPage = 25;
    

	public function rules(Model $item): array
	{
	    return [];
    }

    public function search(): array
    {
        return ['id'];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
