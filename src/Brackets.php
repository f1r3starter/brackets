<?php

namespace brackets;

/**
 * Class Brackets
 *
 * @package Brackets
 * @author  Andrey Filenko <andrey.filenochko@gmail.com>
 * @license proprietary
 * @link    https://github.com/f1r3starter/brackets
 */
class Brackets
{

    private $str;
    private $openBracket = '(';
    private $closeBracket = ')';
    private $allowedSymbols = ["\n", "\t", "\r", "\s"];

    /**
     * Brackets constructor.
     *
     * @param  string $str
     * @return void
     */
    public function __construct(string $str)
    {
        $this->str = $str;
    }

    /**
     * String for checking setter
     *
     * @param  string $str
     * @return void
     */
    public function setStr(string $str): void
    {
        $this->str = $str;
    }

    /**
     * String for checking getter
     *
     * @return string
     */
    public function getStr(): string
    {
        return $this->str;
    }

    /**
     * Open bracket setter
     *
     * @param  string $bracket
     * @return void
     */
    public function setOpenBracket(string $bracket): void
    {
        $this->openBracket = $bracket;
    }

    /**
     * Open bracket getter
     *
     * @return string
     */
    public function getOpenBracket(): string
    {
        return $this->openBracket;
    }

    /**
     * Close bracket setter
     *
     * @param  string $bracket
     * @return void
     */
    public function setCloseBracket(string $bracket): void
    {
        $this->closeBracket = $bracket;
    }

    /**
     * Close bracket getter
     *
     * @return string
     */
    public function getCloseBracket(): string
    {
        return $this->closeBracket;
    }

    /**
     * Allowed symbols setter
     *
     * @param  array $allowedSymbols
     * @return void
     */
    public function setAllowedSymbols(array $allowedSymbols): void
    {
        $this->allowedSymbols = $allowedSymbols;
    }

    /**
     * Allowed symbols getter
     *
     * @return array
     */
    public function getAllowedSymbols(): array
    {
        return $this->allowedSymbols;
    }

    /**
     * Checking if input string has correct closing brackets
     *
     * @return bool
     */
    public function isCorrect(): bool
    {
        if (!$this->symbolCheck()) {
            throw new \InvalidArgumentException(
                'Invalid symbols used in string'
            );
        }
        return $this->check();
    }

    /**
     * Checking if string does not contain unallowed symbols
     *
     * @return bool
     */
    protected function symbolCheck(): bool
    {
        $allowedSymbols = implode('', $this->allowedSymbols);
        return !preg_replace(
            "/[\{$this->openBracket}\{$this->closeBracket}{$allowedSymbols}]/",
            '',
            $this->str
        );
    }

    /**
     * Replacing everything except brackets
     *
     * @return null|string|string[]
     */
    protected function replace()
    {
        return preg_replace(
            "/[^\{$this->openBracket}\{$this->closeBracket}]/",
            '',
            $this->str
        );
    }

    /**
     * Transforming string to array
     *
     * @return array
     */
    protected function transform(): array
    {
        return str_split($this->replace());
    }

    /**
     * Checking if brackets closed correctly
     *
     * @return bool
     */
    protected function check(): bool
    {
        $brackets = $this->transform();
        $result = [];
        foreach ($brackets as $bracket) {
            if ($bracket === $this->openBracket) {
                $result[] = $bracket;
            } elseif (array_pop($result) !== $this->openBracket) {
                return false;
            }
        }
        return empty($result);
    }
}
