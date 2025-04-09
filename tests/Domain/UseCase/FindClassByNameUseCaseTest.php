<?php

namespace Tests\Domain\UseCase;

use PHPUnit\Framework\TestCase;
use App\Domain\UseCase\FindClassByNameUseCase;
use App\Domain\Repository\RepositoryInterface;
use App\Domain\Entity\ClassEntity;

class FindClassByNameUseCaseTest extends TestCase
{
    private $mockRepository;
    private $useCase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->mockRepository = $this->createMock(RepositoryInterface::class);
        $this->useCase = new FindClassByNameUseCase($this->mockRepository);
    }

    public function testExecuteWithShortNameReturnsEmptyArray()
    {
        $this->mockRepository->expects($this->never())
            ->method('findByName');

        $result = $this->useCase->execute('ab');
        $this->assertEquals([], $result);
        $this->assertEmpty($result);
    }

    public function testExecuteCallsRepositoryWithFirst3Letters()
    {
        $mockClassEntity = $this->createMock(ClassEntity::class);

        $this->mockRepository->expects($this->once())
            ->method('findByName')
            ->with('hel')
            ->willReturn([$mockClassEntity]);

        $result = $this->useCase->execute('hello');
        $this->assertEquals([$mockClassEntity], $result);
        $this->assertIsArray($result);
        $this->assertInstanceOf(ClassEntity::class, $result[0]);
        $this->assertNotEmpty($result);
    }
}
