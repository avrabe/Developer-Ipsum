<?php

/**
 * The main Ipsum class
 *
 * @author     Derek Smart <derek@grindaga.com>
 */
class Ipsum
{
    /**
     * requested count of items
     *
     * @var int
     */
    protected $count;

    /**
     * requests length of items
     *
     * @var int
     */
    protected $length;

    /**
     * Instance of Assembler class
     *
     * @var Assembler
     */
    protected $assembler;

    /**
     * Constructor of Ipsum Class
     *
     * @param int $count
     * @param int $length
     */
    public function __construct(Assembler $assembler, int $count, int $length)
    {
        $this->count = $count;
        $this->length = $length;
        $this->assembler = $assembler;

        $this->checkCount();
        $this->checkLength();
    }

    /**
     * Ensure that count is valid
     *
     * @throws Exception
     * @return void
     */
    private function checkCount() : void
    {
        if($this->count < 1){
            throw new InvalidArgumentException('Count must be 1 or greater.');
        }
    }

    /**
     * Encure that length is valid
     *
     * @throws Exception
     * @return void
     */
    private function checkLength() : void
    {
        if($this->length < 1){
            throw new InvalidArgumentException('Length must be 1 or greater.');
        }
    }

    /**
     * call proper Assembler method for count
     *
     * @param  string $method
     *
     * @return string
     */
    private function getMethodByCount(string $method) : string
    {
        $return = '';
        for ($i=0; $i < $this->length; $i++) {
            $return .= $this->assembler->$method() . ' ';
        }
        return $return;
    }

    /**
     * get requested Length of formatted Ipsum Type.
     *
     * @param  string $method
     *
     * @return string
     */
    protected function getMethodByLength(string $method) : string
    {
        $return = '';
        for ($i=0; $i < $this->count; $i++) {
            $return .= $this->getMethodByCount($method) . PHP_EOL;
        }
        return $return;
    }
}
