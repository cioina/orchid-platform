<?php

declare(strict_types=1);

namespace Orchid\Screen\Fields;

use Orchid\Screen\Field;

/**
 * Class Matrix.
 *
 * @method Matrix columns(array $columns)
 * @method Matrix keyValue(bool $keyValue)
 * @method Matrix title(string $value = null)
 * @method Matrix help(string $value = null)
 */
class Matrix extends Field
{
    /**
     * @var string
     */
    protected $view = 'platform::fields.matrix';

    /**
     * Default attributes value.
     *
     * @var array
     */
    protected $attributes = [
        'maxRows'  => 0,
        'keyValue' => false,
        'fields'   => [],
        'columns'  => [
            'key',
            'value',
        ],
    ];

    /**
     * @param string|null $name
     *
     * @return self
     */
    public static function make(string $name = null): self
    {
        return (new static())->name($name)
            ->addBeforeRender(function () {
                if ($this->get('value') === null) {
                    $this->set('value', []);
                }
            })
            ->addBeforeRender(function () {
                $fields = $this->get('fields');

                foreach ($this->get('columns') as $key => $column) {
                    if (! isset($fields[$key])) {
                        $fields[$key] = TextArea::make();
                    }

                    if (! isset($fields[$column])) {
                        $fields[$column] = TextArea::make();
                    }
                }

                $this->set('fields', $fields);
            });
    }

    /**
     * @param int $count
     *
     * @return Field|Matrix
     */
    public function maxRows(int $count)
    {
        return $this->set('maxRows', $count);
    }

    /**
     * @param Field[] $fields
     *
     * @return $this
     */
    public function fields(array $fields = []): self
    {
        return $this->set('fields', $fields);
    }
}
