<?php

/**
 * Button Element Class
 * @author Gilbor Camporazo Jr.
 */

namespace Gibocode\LaravelUI\Elements\Buttons;

class Button
{
    protected $data = [];
    protected $functions = [];

    protected $startTag = '<button>';
    protected $endTag = '</button>';
    protected $text = 'Button';

    public function setData($data)
    {
        if (is_array($data) && count($data) > 0)
        {
            foreach ($data as $name => $value)
            {
                $this->setProperty($name, $value);
            }
        }
    }

    public function setProperty($name, $value)
    {
        $this->data[$name] = $value;
        $this->functions[] = 'get' . ucfirst(strtolower($name));
    }

    public function __call($func, $arguments)
    {
        if (in_array($func, $this->functions))
        {
            $name = strtolower($func);
            $name = str_replace('get', '', $name);

            return $this->data[$name];
        }
    }

    public function getHtmlElement()
    {
        $html = $this->getStartTag() . $this->getText() . $this->getEndTag();
        return $html;
    }

    public function addProperty($name, $value)
    {
        $this->updateStartTag($name, $value);
        return $this->getHtmlElement();
    }

    public function updateStartTag($name, $value)
    {
        $startTag = $this->getStartTag();
        $startTag = str_replace(">", " {$name}={$value}>", $startTag);
        $this->setStartTag($startTag);
    }

    private function setStartTag($tag)
    {
        $this->startTag = $tag;
    }

    private function getStartTag()
    {
        return $this->startTag;
    }

    private function getEndTag()
    {
        return $this->endTag;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getText()
    {
        return $this->text;
    }
}
