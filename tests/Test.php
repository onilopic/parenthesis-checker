<?php


use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function testLongString()
    {
        $pChecker = new Onilopic\ParenthesisChecker\ParenthesisChecker("\t\n\r,,,()");
        $this->assertSame(true, $pChecker->match());

        $pChecker = new Onilopic\ParenthesisChecker\ParenthesisChecker('(()())((()(((,,, ))()))(())');
        $this->assertSame(false, $pChecker->match());

        $pChecker = new Onilopic\ParenthesisChecker\ParenthesisChecker('((,)( ))(((   )((())( )))())');
        $this->assertSame(true, $pChecker->match());

        $pChecker = new Onilopic\ParenthesisChecker\ParenthesisChecker('(()())((()((()()))(())');
        $this->assertSame(false, $pChecker->match());

        $pChecker = new Onilopic\ParenthesisChecker\ParenthesisChecker('(()())(((((())()))(())');
        $this->assertSame(false, $pChecker->match());

        $pChecker = new Onilopic\ParenthesisChecker\ParenthesisChecker(')(()())(((((())()))(())');
        $this->assertSame(false, $pChecker->match());
    }

    public function testShortString()
    {
        $pChecker = new Onilopic\ParenthesisChecker\ParenthesisChecker('()');
        $this->assertSame(true, $pChecker->match());
    }

    public function testWrongString()
    {
        $pChecker = new Onilopic\ParenthesisChecker\ParenthesisChecker('(');
        $this->assertSame(false, $pChecker->match());

        $pChecker = new Onilopic\ParenthesisChecker\ParenthesisChecker(')');
        $this->assertSame(false, $pChecker->match());
    }

    public function testException()
    {
        try {
            $pChecker = new Onilopic\ParenthesisChecker\ParenthesisChecker('(3');
            $pChecker->match();
            $this->fail("Expected exception InvalidArgumentException not thrown");
        } catch (InvalidArgumentException $e) {
            $this->assertEquals("Do not valid string!", $e->getMessage());
        }
    }

    public function testCounterMatchLongString()
    {
        $pChecker = new Onilopic\ParenthesisChecker\ParenthesisChecker('(()())((()(((,,, ))()))(())');
        $this->assertSame(false, $pChecker->matchCounter());

        $pChecker = new Onilopic\ParenthesisChecker\ParenthesisChecker('((,)( ))(((   )((())( )))())');
        $this->assertSame(true, $pChecker->matchCounter());

        $pChecker = new Onilopic\ParenthesisChecker\ParenthesisChecker('(()())((()((()()))(())');
        $this->assertSame(false, $pChecker->matchCounter());

        $pChecker = new Onilopic\ParenthesisChecker\ParenthesisChecker('(()())(((((())()))(())');
        $this->assertSame(false, $pChecker->matchCounter());

        $pChecker = new Onilopic\ParenthesisChecker\ParenthesisChecker(')(()())(((((())()))(())');
        $this->assertSame(false, $pChecker->matchCounter());
    }

    public function testCheckLongString()
    {
        $pChecker = new Onilopic\ParenthesisChecker\ParenthesisChecker('(()())((()((())()))(())');
        $this->assertSame(false, $pChecker->check());

        $pChecker = new Onilopic\ParenthesisChecker\ParenthesisChecker('((,)( ))(((   )((())( )))())');
        $this->assertSame(true, $pChecker->check());

        $pChecker = new Onilopic\ParenthesisChecker\ParenthesisChecker('(()())((()((()()))(())');
        $this->assertSame(false, $pChecker->check());

        $pChecker = new Onilopic\ParenthesisChecker\ParenthesisChecker('(()())(((((())()))(())');
        $this->assertSame(false, $pChecker->check());

        $pChecker = new Onilopic\ParenthesisChecker\ParenthesisChecker(')(()())(((((())()))(())');
        $this->assertSame(false, $pChecker->check());
    }
}
