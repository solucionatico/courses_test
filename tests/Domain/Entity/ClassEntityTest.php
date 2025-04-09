<?php

namespace Tests\Domain\Entity;

use PHPUnit\Framework\TestCase;
use App\Domain\Entity\ClassEntity;

class ClassEntityTest extends TestCase
{
    private static ClassEntity $classEntity;

    public static function setUpBeforeClass(): void
    {
        self::$classEntity = new ClassEntity(1, 'hello', 3, 5);
    }

    public function testConstructorGetValues()
    {
        $this->assertEquals(1, self::$classEntity->getId());
        $this->assertEquals('hello', self::$classEntity->getName());
        $this->assertEquals(3, self::$classEntity->getScore());
        $this->assertEquals(5, self::$classEntity->getBaseScore());
    }

    public function testSetAndGetScore()
    {
        self::$classEntity->setScore(2);
        $score = self::$classEntity->getScore();
        $this->assertSame(2, $score);
        $this->assertGreaterThanOrEqual(1, $score);
        $this->assertLessThanOrEqual(5, $score);
    }

    public function testSetAndGetBaseScore()
    {
        self::$classEntity->setBaseScore(4);
        $baseScore = self::$classEntity->getBaseScore();
        $this->assertSame(4, $baseScore);
        $this->assertGreaterThanOrEqual(1, $baseScore);
        $this->assertLessThanOrEqual(5, $baseScore);
    }

    public function testSetAndGetId()
    {
        self::$classEntity->setId(10);
        $this->assertSame(10, self::$classEntity->getId());
    }

    public function testSetAndGetName()
    {
        self::$classEntity->setName('helium10');
        $this->assertSame('helium10', self::$classEntity->getName());
    }
}
