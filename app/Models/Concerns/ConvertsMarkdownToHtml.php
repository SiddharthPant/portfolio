<?php

namespace App\Models\Concerns;

use Closure;

/**
 * @method static saving(Closure $param)
 * @method fill($all)
 */
trait ConvertsMarkdownToHtml
{
    protected static function bootConvertsMarkdownToHtml(): void
    {
        static::saving(function (self $model) {
            $markdownData = collect(self::getMarkdownToHtmlMap())
                ->flip()
                ->map(fn ($bodyColumn) => str($model->$bodyColumn)->markdown([
                    'html_input' => 'strip',
                    'allow_unsafe_links' => false,
                    'max_nesting_level' => 5,
                ]));

            return $model->fill($markdownData->all());
        });
    }

    protected static function getMarkdownToHtmlMap(): array
    {
        return [
            'body' => 'html',
        ];
    }
}
