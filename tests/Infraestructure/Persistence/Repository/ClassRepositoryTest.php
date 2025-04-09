<?php

namespace Tests\Infrastructure\Persistence\Repository;

use PHPUnit\Framework\TestCase;
use App\Infrastructure\Persistence\Repository\ClassRepository;
use App\Infrastructure\Persistence\Database;
use App\Domain\Entity\ClassEntity;
use PDO;

class ClassRepositoryTest extends TestCase
{
    private static Database $db;
    private ClassRepository $repository;

    public static function setUpBeforeClass(): void
    {
        // Initiate Database Instance
        self::$db = Database::getInstance();

        // Create temporary table
        self::$db->exec('
            CREATE TABLE classes (
                id_class INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL,
                score INTEGER NOT NULL,
                base_score INTEGER NOT NULL
            );
        ');

        // Insert test data
        self::$db->exec("
            INSERT INTO classes (name, score, base_score) VALUES
            ('hello', 3, 5),
            ('helium', 4, 5),
            ('help', 5, 5),
            ('world', 2, 5);
        ");
    }

    protected function setUp(): void
    {
        // Instance the repository with the real Repository and send it the test instance of db
        $this->repository = new ClassRepository(self::$db);
    }

    public function testFindByNameReturnsMatchingEntities()
    {
        // Ejecutamos el método real
        $result = $this->repository->findByName('hel');

        // Verificamos que nos devuelve 3 resultados
        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertCount(3, $result);

        // Check asserts each entity
        foreach ($result as $entity) {
            $this->assertInstanceOf(ClassEntity::class, $entity);
            $this->assertStringStartsWith('hel', $entity->getName());
        }
    }

    public function testFindByNameReturnsEmptyArrayIfNoMatch()
    {
        $result = $this->repository->findByName('xyz');
        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }
}
