<?php

declare(strict_types=1);

namespace ByteOath\Core;

class View
{
    private string $templateDir;
    private array  $globalVars = [];

    public function __construct(string $templateDir)
    {
        $this->templateDir = rtrim($templateDir, '/');
    }

    /** Share variables with every template */
    public function share(array $vars): void
    {
        $this->globalVars = array_merge($this->globalVars, $vars);
    }

    /**
     * Render a page template wrapped in a layout.
     *
     * @param string $template  e.g. 'pages/home'
     * @param array  $vars      page-specific variables
     * @param string $layout    layout file under templates/layouts/
     */
    public function render(string $template, array $vars = [], string $layout = 'base'): void
    {
        $vars = array_merge($this->globalVars, $vars);

        // Capture page content
        $content = $this->capture($template, $vars);

        // Inject into layout
        $vars['content'] = $content;
        echo $this->capture("layouts/{$layout}", $vars);
    }

    /** Render a partial/component (no layout) */
    public function partial(string $template, array $vars = []): string
    {
        return $this->capture($template, array_merge($this->globalVars, $vars));
    }

    /** Output a partial directly */
    public function include(string $template, array $vars = []): void
    {
        echo $this->partial($template, $vars);
    }

    private function capture(string $template, array $vars): string
    {
        $file = $this->templateDir . '/' . $template . '.php';
        if (!file_exists($file)) {
            throw new \RuntimeException("Template not found: {$file}");
        }
        extract($vars, EXTR_SKIP);
        $view = $this; // always available in every template
        ob_start();
        require $file;
        return ob_get_clean();
    }
}

