<?php

namespace App\Orchid\Resources;

use Illuminate\Database\Eloquent\Model;
use Orchid\Crud\Resource;
use Orchid\Crud\ResourceRequest;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use App\Models\Post;

class PostResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Post::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Quill::make('title')->title ('Title')->rows (1),
            Quill::make('content')->title ('Content')->rows (4),
            Select::make ('mark')->options (array_combine (range (1, 10), range (1, 10)))
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id'),

            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('updated_at', 'Update date')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                }),

            TD::make ('text', 'text')
                ->render (function($post) {
                    return strip_tags ($post->text);
                }),

            TD::make ('updated_at',)
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            Sight::make('id', 'Id'),
            Sight::make('created_at', 'Created')
                ->render (function ($post) {
                    return $post->created_at->format('Y M d H:i');
                }),
            Sight::make('updated_at', 'Updated')
                ->render (function ($post) {
                    return $post->created_at->format('Y M d H:i');
                }),

            Sight::make('title', 'Title'),
            Sight::make('content', 'Content'),
            Sight::make('mark', 'Mark')
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }

    public function save (ResourceRequest $request, Model $model) : void {

        $model->user_id = auth()->user()->id;

        parent::save($request, $model);
    }
}
