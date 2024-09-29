<?php

namespace App\Orchid\Resources;

use Illuminate\Support\Number;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\TD;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class CommentResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Comment::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Select::make('post_id')
                ->title('Post')
                ->fromModel(Post::class, 'title')
                ->required(),

            Select::make('user_id')
                ->title('User')
                ->fromModel(User::class, 'name')
                ->required(),

            Quill::make('text')
                ->title('Comment Text')
                ->rows(4)
                ->required(),

            Select::make ('likes_count')
                ->title ('Likes')
                ->options (array_combine
                    (range (1, 10),
                    range (1, 10)
                )),

            Select::make ('dislikes_count')
                ->title ('Dislikes')
                ->options (array_combine
                    (range (1, 10),
                    range (1, 10)
                )),

//            Number::make('likes_count')
//                ->title('Likes')
//                ->min(0)
//                ->default(0),
//
//            Number::make('dislikes_count')
//                ->title('Dislikes')
//                ->min(0)
//                ->default(0),
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
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [];
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
}
