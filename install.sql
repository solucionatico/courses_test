-- DATABASE STRUCTURE
DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes` (
    `id_class` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `score` TINYINT(1) NOT NULL DEFAULT 5,
    `base_score` TINYINT(1) NOT NULL DEFAULT 5,
    PRIMARY KEY (`id_class`)
);

DROP TABLE IF EXISTS `exam_type`;
CREATE TABLE `exam_type` (
    `id_exam_type` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_exam_type`)
);

DROP TABLE IF EXISTS `exam`;
CREATE TABLE `exam` (
    `id_exam` INT NOT NULL AUTO_INCREMENT,
    `id_exam_type` INT NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id_exam`)
);

-- CLEAR DATA

TRUNCATE TABLE `classes`;
TRUNCATE TABLE `exam_type`;
TRUNCATE TABLE `exam`;

-- DATA

INSERT INTO `classes` (`name`, `score`, `base_score`) VALUES
    ('Vocabulario sobre Trabajo en Inglés', 5, 5),
    ('Conversaciones de Trabajo en Inglés', 5, 5),
    ('Gramática Básica del Inglés', 3, 5),
    ('Pronunciación en Inglés para Principiantes', 5, 5),
    ('Inglés para Viajeros', 4, 5),
    ('Redacción en Inglés', 3, 5),
    ('Comprensión Auditiva en Inglés', 5, 5);

INSERT INTO `exam_type` (`id_exam_type`, `name`) VALUES
    (1, 'Selección'),
    (2, 'Pregunta y respuesta'),
    (3, 'Completación');

INSERT INTO `exam` (`id_exam_type`, `name`) VALUES
    (1, 'Trabajos y ocupaciones en Inglés'),
    (3, 'Gramática básica del inglés'),
    (2, 'Comprensión de lectura en inglés'),
    (3, 'Vocabulario sobre alimentos y bebidas'),
    (1, 'Tiempos verbales en inglés'),
    (3, 'Comprensión auditiva en conversaciones cotidianas'),
    (2, 'Examen de escritura en inglés formal e informal');
