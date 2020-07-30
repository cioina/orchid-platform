<?php

declare(strict_types=1);

namespace Orchid\Screen\Fields;

use Orchid\Screen\Contracts\Groupable;
use Orchid\Screen\Field;

class Group extends Field implements Groupable
{
    /**
     * Default attributes value.
     *
     * @var array
     */
    protected $attributes = [
        'group' => [],
        'class' => 'col',
    ];

    /**
     * Required Attributes.
     *
     * @var array
     */
    protected $required = [];

    /**
     * @var string
     */
    protected $view = 'platform::fields.group';

    /**
     * @param array $group
     *
     * @return static
     */
    public static function make(array $group = [])
    {
        return (new static())->setGroup($group);
    }

    /**
     * @return Field[]
     */
    public function getGroup(): array
    {
        return $this->get('group', []);
    }

    /**
     * @param array $group
     *
     * @return $this
     */
    public function setGroup(array $group = []): Groupable
    {
        return $this->set('group', $group);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view($this->view, $this->attributes);
    }

    /**
     * Columns only take up as much space as needed.
     *
     * @return self
     */
    public function autoWidth(): self
    {
        return $this->set('class', 'col-auto');
    }

    /**
     * Columns occupy the entire width of the screen.
     *
     * @return self
     */
    public function fullWidth(): self
    {
        return $this->set('class', 'col');
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function form(string $name): self
    {
        $group = array_map(function ($field) use ($name) {
            return $field->form($name);
        }, $this->getGroup());

        return $this->setGroup($group);
    }
}
