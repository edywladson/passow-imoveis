<?php

namespace Source\Support;

use Source\Core\Session;


/**
 * Class Message
 * @package Source\Support
 */
class Message
{
    /** @var string */
    private $text;

    /** @var string */
    private $type;

    /** @var string */
    private $before;

    /** @var string */
    private $after;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }

    /**
     * @return string
     */
    public function getText(): ?string
    {
        return $this->before.$this->text.$this->after;
    }

    /**
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return $this
     */
    public function before(string $text): Message
    {
        $this->before = $text;

        return $this;
    }

    /**
     * @return $this
     */
    public function after(string $text): Message
    {
        $this->after = $text;

        return $this;
    }

    /**
     * info.
     *
     * @param mixed $message
     */
    public function info(string $message): Message
    {
        $this->type = "alert alert-info";
        $this->text = $this->filter($message);

        return $this;
    }

    /**
     * success.
     *
     * @param mixed $message
     */
    public function success(string $message): Message
    {
        $this->type = "alert alert-success";
        $this->text = $this->filter($message);

        return $this;
    }

    /**
     * warning.
     *
     * @param mixed $message
     */
    public function warning(string $message): Message
    {
        $this->type = "alert alert-warning";
        $this->text = $this->filter($message);

        return $this;
    }

    /**
     * error.
     *
     * @param mixed $message
     */
    public function error(string $message): Message
    {
        $this->type = "alert alert-danger";
        $this->text = $this->filter($message);

        return $this;
    }

    /**
     * render.
     */
    public function render(): string
    {
        return "<div class='message {$this->getType()}'>{$this->getText()}</div>";
    }

    /**
     * Set flash Session Key.
     */
    public function flash(): void
    {
        (new Session())->set('flash', $this);
    }

    /**
     * @param string $message
     * @return string
     */
    private function filter(string $message): string
    {
        return filter_var($message, FILTER_SANITIZE_STRIPPED);
    }
}
