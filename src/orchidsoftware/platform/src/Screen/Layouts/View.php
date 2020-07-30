<?php

declare(strict_types=1);

namespace Orchid\Screen\Layouts;

use Orchid\Screen\Repository;

/**
 * Class View.
 */
abstract class View extends Base
{
    /**
     * @var array
     */
    private $data;

    /**
     * View constructor.
     *
     * @param string                                        $template
     * @param \Illuminate\Contracts\Support\Arrayable|array $data
     */
    public function __construct(string $template, $data = [])
    {
        $this->template = $template;
        $this->data = $data;
    }

    /**
     * @param Repository $repository
     *
     * @return mixed
     */
    public function build(Repository $repository)
    {
        if (! $this->checkPermission($this, $repository)) {
            return;
        }

        $data = array_merge($this->data, $repository->toArray());

        return view($this->template, $data);
    }
}
