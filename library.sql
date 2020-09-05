CREATE DATABASE library;
USE library;

-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-09-2020 a las 13:50:17
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `library`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books`
--

CREATE TABLE `books` (
  `id` int(255) NOT NULL,
  `name` varchar(150) NOT NULL,
  `author` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `year` varchar(100) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `description`, `year`, `imagen`) VALUES
(15, 'Don Quijote de la Mancha', 'Miguel de Cervantes', 'Desde hace 400 años, hay un caballero andante en la literatura mundial que, de hecho, no lo es: Don Quijote de la Mancha, el Caballero de la Triste Figura, que vive aventuras donde no las hay. Toma a molinos de viento por gigantes, rebaños de ovejas por ejércitos enemigos, toneles de vino también por gigantes, posadas por fortalezas y a una sencilla campesina por su distinguida señora. Don Quijote es víctima de su pasión literaria, de su exagerada afición por leer novelas de caballería. Todos los niños conocen al menos uno de sus numerosos episodios; enfrentarse a molinos de viento, por ejemplo, existe hoy en día como expresión. Pero, ¿qué hace a esta novela, supuestamente cómica y de más de 1000 páginas, estar considerada no sólo como la obra maestra de la literatura española, sino también haber sido confirmada como mejor novela del mundo por el instituto Nobel en 2002? Son sus distintos niveles de narración, relacionados entre ellos de forma magistral y de entre cuyos renglones se desprende cierta sabiduría, junto a una acertada parodia y el monumental inventario de temas y de personajes lo que convierten a la obra de Cervantes en novela universal en el mejor de los sentidos. Don Quijote fascina a toda persona dotada de fantasía, que se evade con libros o películas, si bien la obra muestra al mismo tiempo lo cómico que puede llegar a ser esta forma de huir del mundo.', '1605', 'donquijote.jpg'),
(17, 'El Origen', 'Dan Brown', 'Robert Langdon, profesor de simbología e iconografía religiosa de la universidad de Harvard, acude al Museo Guggenheim Bilbao para asistir a un trascendental anuncio que «cambiará la faz de la ciencia para siempre». El anfitrión de la velada es Edmond Kirsch, un joven multimillonario cuyos visionarios inventos tecnológicos y audaces predicciones lo han convertido en una figura de renombre mundial. Kirsch, uno de los alumnos más brillantes de Langdon años atrás, se dispone a revelar un extraordinario descubrimiento que dará respuesta a las dos preguntas que han obsesionado a la humanidad desde el principio de los tiempos.', '2017', 'origen.jpg'),
(18, 'Harry Pooter y el Caliz de Fuego', 'J.K. Rowlin', 'A lo largo de las tres novelas anteriores de la serie de Harry Potter , el personaje principal, Harry Potter , ha luchado con las dificultades de crecer y el desafío adicional de ser un mago famoso. Cuando Harry era un bebé, Lord Voldemort , el mago oscuro más poderoso de la historia, mató a los padres de Harry, pero fue derrotado misteriosamente después de intentar sin éxito matarlo, aunque su intento dejó una cicatriz en forma de rayo en la frente de Harry. Esto da como resultado la fama inmediata de Harry y ser puesto al cuidado de su tía y tío Muggle (no mágicos) abusivos , Petunia y Vernon Dursley , quienes tienen un hijo llamado Dudley .\r\n\r\nEn el undécimo cumpleaños de Harry, se entera de que es un mago de Rubeus Hagrid, guardián de llaves y terrenos en el Colegio Hogwarts de Magia y Hechicería, y se inscribe en Hogwarts . Se hace amigo de Ron Weasley y Hermione Granger y se enfrenta a Lord Voldemort, que está tratando de recuperar el poder. En el primer año de Harry , tiene que proteger la Piedra Filosofal de Voldemort y uno de sus fieles seguidores en Hogwarts. Después de regresar a la escuela después de las vacaciones de verano, los estudiantes de Hogwarts son atacados por el legendario monstruo de la Cámara de los Secretos después de que se abre la Cámara. Harry termina los ataques matando a un basilisco.y frustrando otro intento de Lord Voldemort de recuperar toda su fuerza. Al año siguiente, Harry se entera de que ha sido atacado por el asesino en masa fugitivo Sirius Black . A pesar de las estrictas medidas de seguridad en Hogwarts, Harry se encuentra con Black al final de su tercer año y descubre que Black fue incriminado y que en realidad es el padrino de Harry . También se entera de que fue el antiguo amigo de la escuela de su padre, Peter Pettigrew, quien traicionó a sus padres.', '2000', 'descarga.jpg'),
(25, '100 Años de Soledad', 'Gabriel Garcia Marquez', 'gfgdfgdfgdfgdfg', '123', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `books`
--
ALTER TABLE `books`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
