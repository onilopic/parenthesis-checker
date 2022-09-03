<?php

declare(strict_types=1);

namespace Onilopic\ParenthesisChecker;


use InvalidArgumentException;

class ParenthesisChecker
{
    const VALID_CHARS = ['(', ')', ',', ' ', '\n', '\t', '\r'];

    private array $string;

    public function __construct(string $string)
    {
        $this->string = mb_str_split($string);
    }

    public function check(): bool
    {
        $stack = [];
        foreach ($this->string as $char) {
            if (!in_array($char, static::VALID_CHARS)) {
                throw new InvalidArgumentException("Do not valid string!");
            }
            if ($char === '(') {
                $stack[] = ')';
            }
            if ($char === ')') {
                if (null === array_pop($stack)) {
                    return false;
                }
            }
        }
        return count($stack) === 0;
    }

    /**
     * @return bool
     * @throws InvalidArgumentException
     */
    public function match(): bool
    {
        $stack = [];
        foreach ($this->string as $char) {
            $val = match ($char) {
                '(' => array_push($stack, 1),
                ')' => array_pop($stack),
                ',', ' ', "\t", "\n", "\r" => '',
                default => throw new InvalidArgumentException("Do not valid string!"),
            };
            if (null === $val) {
                return false;
            }
        }
        return count($stack) === 0;
    }

    /**
     * @return bool
     * @throws InvalidArgumentException
     */
    public function matchCounter(): bool
    {
        $count = 0;
        foreach ($this->string as $char) {
            match ($char) {
                '(' => $count++,
                ')' => $count--,
                ',', ' ', '   ', '\n', '\r' => '',
                default => throw new InvalidArgumentException("Do not valid string!"),
            };
            if ($count < 0) {
                return false;
            }
        }
        return $count === 0;
    }
}